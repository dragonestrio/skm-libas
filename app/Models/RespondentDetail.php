<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RespondentDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "respondent_detail";
    protected $fillable = [
        "respondent_id",
        "question_id",
        "answer",
    ];
}
