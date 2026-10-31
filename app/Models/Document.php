<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $fillable = [
        'subject_id',
        'name',
        'document'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query->where(function ($q) use ($key) {
                $q->where('name', 'like', '%' . $key . '%')
                    ->orWhereHas('subject', function ($subQuery) use ($key) {
                        $subQuery->where('subject', 'like', '%' . $key . '%');
                    });
            });
        }
        return $query;
    }
}
