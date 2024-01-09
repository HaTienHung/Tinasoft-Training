<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = ['teacher_id', 'class_name'];

    public function enrolledUsers()
    {
        return $this->belongsToMany(User::class, 'class_users', 'class_id', 'user_id');
    }
}
