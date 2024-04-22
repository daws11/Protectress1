<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrimeReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'details',
        'location',
        'evidence_path'
    ];
}
