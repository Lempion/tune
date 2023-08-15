<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\PackedProfile;
use App\Models\ProcessedProfile;
use App\Models\Questionnaire;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuestionnairesController extends Controller
{

    public function index()
    {
        if (!empty($questionnaire = $this->getLastQuestionnaire())){
            $questionnaire_user_id = $questionnaire->pull('user_id');

            $questionnaire['date_birth'] = Carbon::parse($questionnaire['date_birth'])->age;
        }

        return response(view('main.home', compact('questionnaire')))
            ->cookie('current_questionnaire', $questionnaire_user_id ?? null, '3600');
    }

    public function actionQuestionnaire(Request $request)
    {
        if (!$currentQuestionnaireUserId = $request->cookie('current_questionnaire')) {
            return response()->json(['errors' => ['fatal' => 'Unknown error, please refresh the page.']], 422);
        }

        $request->validate([
            'action' => ['in:like,message,dislike'],
            'message' => ['required_if:action,message', 'string', 'nullable', 'max:30'],
        ], [
            'action.in' => 'Unknown error, please refresh the page.!'
        ]);

        $this->deleteCompletedQuestionnaire();

        switch ($request->action) {
            case 'like':
            case 'message':
                $matchMessage = $this->activeLike($currentQuestionnaireUserId, $request->message ?? '');
                break;
            case 'dislike':
                $this->activeDislike();
                break;
        }

        if (empty($questionnaire = $this->getLastQuestionnaire())){
            return response()->json(['questionnaire' => 'none', 'message' => $matchMessage ?? false]);
        }

        $questionnaire_user_id = $questionnaire->pull('user_id');

        $questionnaire['date_birth'] = Carbon::parse($questionnaire['date_birth'])->age;

        return response()
            ->json(['questionnaire' => $questionnaire, 'message' => $matchMessage ?? false])
            ->cookie('current_questionnaire', $questionnaire_user_id, '3600');
    }

    private function activeLike($selectedUserId, $message = '')
    {
        $matchUser = Like::where('user_id', $selectedUserId)->where('selected_user_id', auth()->user()->id)->first();

        if (isset($matchUser)) {
            $matchUser->match = 1;
            $matchUser->save();
        }

        auth()->user()
            ->likes()
            ->create(['selected_user_id' => $selectedUserId, 'message' => $message, 'match' => isset($matchUser)])
            ->save();

        return (isset($matchUser));
    }

    private function activeDislike()
    {

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
            ->where('questionnaire_json', 'like', '%"user_id":' . request()->cookie('current_questionnaire') . '%')
            ->delete();
    }

    private function createQuestionnaires(): mixed
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
            return false;
        }

        $insertArr = [];

        $newProcessedQuestionnaire->each(function ($item, $key) use (&$insertArr) {
            $insertArr[] = ['user_id' => auth()->user()->id, 'processed_questionnaire_id' => $item];
        });

        ProcessedProfile::upsert($insertArr, []);

        $readyQuestionnaires = array();

        foreach ($packedProfiles as $packedProfile) {
            $readyQuestionnaires[] = ['user_id' => auth()->user()->id, 'questionnaire_json' => $packedProfile->profile_json];
        }

        Questionnaire::upsert($readyQuestionnaires, []);
        return auth()->user()->questionnaires()->first();
    }
}
