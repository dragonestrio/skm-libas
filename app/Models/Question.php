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
        'id',
    ];

    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];

<<<<<<< HEAD
    public function question_category()
    {
        return $this->belongsTo(Questions_category::class, 'questions_categorie_id', 'id');
=======
    public function category()
    {
        return $this->belongsTo(Questions_category::class, "questions_categorie_id", "id");
>>>>>>> e6c86d4ae319f8a1a8779e8069d1f46dce83cea2
    }
}
