<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('voting')->only('voting');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'questions' => Question::all()
        ]);
    }

    public function voting(Request $request)
    {
        try {
            Answer::create([
                'question_id' => $request->input('question_id'),
                'question_option_id' => $request->input('question_option_id'),
                'user_id' => Auth::user()->id
            ]);
        } catch (\Exception $e) {
            dd('Please try again later');
        }
        $expiresAt = now()->addDay(1);
        \Cache::put('voted_user_id', Auth::user()->id, $expiresAt);
        //  TODO
        \Redis::command('HINCRBY', ['voting_more_gold_' . $request->input('question_id'), 'option_'.$request->input('question_option_id'), 1]);
        return view('statistics', [
            'question' => Question::first()
        ]);
    }
}
