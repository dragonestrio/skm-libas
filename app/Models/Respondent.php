<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Respondent extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "respondents";

    protected $fillable = [
        "unit_id",
        "gender",
        "education"
    ];
}
