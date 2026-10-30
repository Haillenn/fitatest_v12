<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'role', 'id');
    }

    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query->where(function ($q) use ($key) {
                $q->where('name', 'like', '%' . $key . '%')
                    ->orWhere('id', 'like', '%' . $key . '%');
            });
        }
        return $query;
    }
}
