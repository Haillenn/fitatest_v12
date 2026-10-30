<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'question',
        'subject_id'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id'); // Đã đồng bộ khóa ngoại chuẩn question_id
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'qna_exam', 'question_id', 'exam_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($question) {
            $question->answers()->delete();
            // Nếu muốn xóa luôn liên kết trong bảng trung gian qna_exam khi xóa câu hỏi:
            // $question->exams()->detach();
        });
    }

    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query->where(function ($q) use ($key) {
                $q->where('question', 'like', '%' . $key . '%')
                    ->orWhere('id', 'like', '%' . $key . '%');
            });
        }
        return $query;
    }
}
