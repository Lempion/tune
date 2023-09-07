<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\PackedProfile;
use App\Models\ProcessedProfile;
use App\Models\Questionnaire;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class QuestionnaireController extends Controller
{

    public function index()
    {
        $questionnaires = $this->getNextQuestionnaire(true);

        Cookie::queue(Cookie::make('current_questionnaire_id', $questionnaires[0]['user_id'] ?? '', 45000));
        Cookie::queue(Cookie::make('next_questionnaire_id', $questionnaires[1]['user_id'] ?? '', 45000));

        return response(view('main.home', ['questionnaire' => $questionnaires[0] ?? array(), 'nextQuestionnaire' => $questionnaires[1] ?? '']));
    }

    public function actionQuestionnaire(Request $request): JsonResponse
    {
        if (!$currentQuestionnaireUserId = $request->cookie('current_questionnaire_id')) {
            return response()->json(['errors' => ['fatal' => 'Unknown error, please refresh the page.']], 422);
        }

        $request->validate([
            'action' => ['in:like,message,dislike'],
            'message' => ['required_if:action,message', 'string', 'nullable', 'max:30'],
        ], [
            'action.in' => 'Unknown error, please refresh the page.'
        ]);

        $this->deleteCompletedQuestionnaire();

        switch ($request->action) {
            case 'like':
            case 'message':
                $matchMessage = ActionController::activeLike($currentQuestionnaireUserId, $request->message ?? '');
                break;
            case 'dislike':
                ActionController::activeDislike($currentQuestionnaireUserId);
                break;
        }

        $questionnaire = $this->getNextQuestionnaire();

        Cookie::queue(Cookie::make('current_questionnaire_id', Cookie::get('next_questionnaire_id') ?? '', 45000));
        Cookie::queue(Cookie::make('next_questionnaire_id', $questionnaire[0]['user_id'] ?? '', 45000));

        return response()->json(['message' => $matchMessage ?? false, 'questionnaire' => $questionnaire[0] ?? '']);
    }

//    private function activeLike($selectedUserId, $message = ''): bool
//    {
//        $matchUser = Like::where('user_id', $selectedUserId)->where('selected_user_id', auth()->user()->id)->first();
//
//        if (isset($matchUser)) {
//            $matchUser->match = 1;
//            $matchUser->save();
//        }
//
//        auth()->user()
//            ->likes()
//            ->create(['selected_user_id' => $selectedUserId, 'message' => $message, 'match' => isset($matchUser)])
//            ->save();
//
//        return (isset($matchUser));
//    }
//
//    private function activeDislike($selectedUserId): void
//    {
//        Like::where('user_id', $selectedUserId)->where('selected_user_id', auth()->id())->delete();
//    }

    private function getNextQuestionnaire($indexView = false): array
    {
        if (auth()->user()->questionnaires()->count() < 2) {
            $this->createQuestionnaires();
        }

        $questionnaires = auth()->user()->questionnaires()->skip($indexView ? 0 : 1)->limit($indexView ? 2 : 1)->get()->toArray();

        if (!empty($questionnaires)) {
            foreach ($questionnaires as $key => $questionnaire) {
                $questionnaires[$key] = array_merge($questionnaire, json_decode($questionnaire['questionnaire_json'], true));
                $questionnaires[$key]['date_birth'] = Carbon::parse($questionnaires[$key]['date_birth'])->age;
                unset($questionnaires[$key]['questionnaire_json']);
            }
        }

        return $questionnaires;
    }

    private function getLastQuestionnaire(): mixed
    {


        if (!$questionnaire = auth()->user()->questionnaires()->first()) {
            if (!$questionnaire = $this->createQuestionnaires()) {
                return array();
            }
        }

        return collect(json_decode($questionnaire->questionnaire_json));
    }

    private function deleteCompletedQuestionnaire()
    {
        Questionnaire::where('user_id', auth()->user()->id)
            ->where('questionnaire_json', 'like', '%"user_id":' . request()->cookie('current_questionnaire_id') . '%')
            ->delete();
    }

    private function createQuestionnaires(): void
    {
        $processedQuestionnaire = auth()->user()
            ->processedQuestionnaires()
            ->select('processed_questionnaire_id')
            ->get()
            ->pluck('processed_questionnaire_id')
            ->toArray();

        // Сделать логику чтобы подбирались люди по интересам и т.д, короче логику
        $packedProfiles = PackedProfile::inRandomOrder()
            ->whereNotIn('user_id', $processedQuestionnaire)
            ->limit(10)
            ->get();

        $newProcessedQuestionnaire = $packedProfiles->pluck('user_id');

        if ($newProcessedQuestionnaire->isEmpty()) {
            return;
        }

        $insertArr = array();

        $newProcessedQuestionnaire->each(function ($item, $key) use (&$insertArr) {
            $insertArr[] = ['user_id' => auth()->user()->id, 'processed_questionnaire_id' => $item];
        });

        ProcessedProfile::upsert($insertArr, []);

        $readyQuestionnaires = array();

        foreach ($packedProfiles as $packedProfile) {
            $readyQuestionnaires[] = ['user_id' => auth()->user()->id, 'questionnaire_json' => $packedProfile->profile_json];
        }

        Questionnaire::upsert($readyQuestionnaires, []);
    }
}
