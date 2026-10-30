<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'birth',
        'phone',
        'avatar',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roleModel()
    {
        return $this->belongsTo(Role::class, 'role', 'id');
    }

    public function roles()
    {
        return $this->belongsTo(Role::class, 'role', 'id');
    }

    /**
     * Scope hỗ trợ tìm kiếm người dùng (Dùng cho trang Quản lý Admin)
     */
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query->where(function ($q) use ($key) {
                $q->where('name', 'like', '%' . $key . '%')
                    ->orWhere('email', 'like', '%' . $key . '%')
                    ->orWhere('phone', 'like', '%' . $key . '%')
                    ->orWhere('gender', 'like', '%' . $key . '%')
                    ->orWhereHas('role', function ($subQuery) use ($key) {
                        $subQuery->where('name', 'like', '%' . $key . '%');
                    });
            });
        }
        return $query;
    }
}
