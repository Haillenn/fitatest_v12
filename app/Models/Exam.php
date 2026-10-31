<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exams';

    protected $fillable = [
        'exam_name',
        'subject_id',
        'date',
        'time',
        'attempt',
        'enterance_id'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function qnaExams()
    {
        return $this->hasMany(QnaExam::class, 'exam_id', 'id');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'qna_exam', 'exam_id', 'question_id');
    }

    public function examAttempts()
    {
        return $this->hasMany(ExamAttempt::class, 'exam_id', 'id');
    }

    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query->where(function ($q) use ($key) {
                $q->where('exam_name', 'like', '%' . $key . '%')
                    ->orWhereHas('subject', function ($subQuery) use ($key) {
                        $subQuery->where('subject', 'like', '%' . $key . '%');
                    });
            });
        }
        return $query;
    }
}
