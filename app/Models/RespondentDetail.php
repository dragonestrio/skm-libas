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
        "questions_categorie_id"
    ];

    public function respondent()
    {
        return $this->belongsTo(Respondent::class, "respondent_id", "id");
    }

    public function question()
    {
        return $this->belongsTo(Question::class, "question_id", "id");
    }

    public function category()
    {
        return $this->belongsTo(Questions_category::class, "questions_categorie_id", "id");
    }
}
