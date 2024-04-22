<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrimeReport; 

class HomeController extends Controller
{
    public function showHome()
    {
        return view('home');
    }

    public function showAbout()
    {
        return view('about');
    }

    public function showForum()
    {
        return view('forum');
    }
    
    public function index()
    {
        $questions = [
            [
                'question' => 'What is considered as sexual harassment in the workplace?',
                'options' => ['Unwanted physical contact', 'Asking for a date repeatedly', 'Both A and B', 'None of the above'],
                'correct_answer' => 'Both A and B'
            ],
            // Additional questions can be added here
        ];

        return view('home', compact('questions')); // Passing the questions array to the view
    }
}
