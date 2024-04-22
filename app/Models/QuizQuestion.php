<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;

    public static function getQuestions()
    {
        return [
            [
                'question' => 'What is considered as sexual harassment in the workplace?',
                'options' => [
                    'Unwanted physical contact',
                    'Asking for a date repeatedly',
                    'Both A and B',
                    'None of the above'
                ],
                'correct_answer' => 2
            ],
            // Add more questions as needed
        ];
    }
}
