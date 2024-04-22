<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizQuestion;

class EducationalContentController extends Controller
{
    //
    public function index()
    {
        $questions = QuizQuestion::getQuestions();
        return view('home', compact('questions'));
    }
}
