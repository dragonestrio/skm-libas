<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;

    protected $guarded = [
        // 'id',
    ];

    protected $hidden = [
        // 'id',
    ];

    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];

    public function question_category()
    {
        return $this->belongsTo(Questions_category::class, 'questions_categorie_id', 'id');
    }
}
