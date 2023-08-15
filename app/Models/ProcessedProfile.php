<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessedProfile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'processed_questionnaire_id'];

}
