<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\PackedProfile;
use App\Models\Questionnaire;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cookie;

class QuestionnairesController extends Controller
{

    public function index()
    {
        $questionnaire = $this->getLastQuestionnaire();

        $questionnaire_user_id = $questionnaire->pull('user_id');

        $questionnaire['date_birth'] = Carbon::parse($questionnaire['date_birth'])->age;

        return response(view('main.home', compact('questionnaire')))->cookie('current_questionnaire', $questionnaire_user_id, '3600');
    }

    public function actionQuestionnaire(Request $request)
    {
        if (!$currentQuestionnaireId = $request->cookie('current_questionnaire')) {
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
                $this->activeLike();
                break;
            case 'message':
                $this->activeLMessage($request->message);
                break;
            case 'dislike':
                $this->activeDislike();
                break;
        }

        $questionnaire = $this->getLastQuestionnaire();

        $questionnaire_user_id = $questionnaire->pull('user_id');

        $questionnaire['date_birth'] = Carbon::parse($questionnaire['date_birth'])->age;

        return response()->json($questionnaire)->cookie('current_questionnaire', $questionnaire_user_id, '3600');
    }

    private function activeLike()
    {

    }

    private function activeLMessage($message)
    {

    }

    private function activeDislike()
    {

    }

    private function getLastQuestionnaire(): mixed
    {
        if (!$questionnaire = auth()->user()->questionnaires()->first()) {
            $questionnaire = $this->createQuestionnaires();
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
        // Сделать логику чтобы подбирались люди по интересам и т.д, короче логику
        $packedProfiles = PackedProfile::inRandomOrder()->limit(10)->get();

        $readyQuestionnaires = array();

        foreach ($packedProfiles as $packedProfile) {
            $readyQuestionnaires[] = ['user_id' => auth()->user()->id, 'questionnaire_json' => $packedProfile->profile_json];
        }

        Questionnaire::upsert($readyQuestionnaires, []);
        return auth()->user()->questionnaires()->first();
    }
}
