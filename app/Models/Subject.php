<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        'subject'
    ];

    /**
     * Quan hệ 1 - nhiều với bảng Questions (Một môn học có nhiều câu hỏi)
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'subject_id', 'id');
    }

    /**
     * Quan hệ 1 - nhiều với bảng Documents (Đã sửa từ belongsTo thành hasMany vì một môn học có nhiều tài liệu)
     */
    public function documents()
    {
        return $this->hasMany(Document::class, 'subject_id', 'id');
    }

    /**
     * Quan hệ 1 - nhiều với bảng Exams (Bổ sung thêm để đồng bộ theo ERD FitaTest)
     */
    public function exams()
    {
        return $this->hasMany(Exam::class, 'subject_id', 'id');
    }

    /**
     * Scope hỗ trợ tìm kiếm môn học (Dùng cho trang Quản lý Admin)
     */
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query->where(function ($q) use ($key) {
                $q->where('subject', 'like', '%' . $key . '%')
                    ->orWhere('id', 'like', '%' . $key . '%');
            });
        }
        return $query;
    }
}
