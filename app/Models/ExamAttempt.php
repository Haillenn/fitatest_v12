<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamAttempt extends Model
{
    use HasFactory;

    protected $table = 'exams_attempt';

    protected $fillable = [
        'exam_id',
        'user_id',
        'status',
        'marks',
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function examAnswers()
    {
        return $this->hasMany(ExamAnswer::class, 'attempt_id', 'id');
    }
}
