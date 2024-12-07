<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Important line
use Illuminate\Notifications\Notifiable; // Notification trait
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable  // Extending Authenticatable
{
    use HasFactory, Notifiable; // Including both the HasFactory and Notifiable traits

    protected $fillable = [
        'fullname', 'email', 'class', 'role', 'password', // Add password to fillable fields
    ];

    protected $hidden = [
        'password', // Hide password when serializing the model
    ];

    /**
     * Determine if the user is a teacher.
     */
    public function isTeacher()
    {
        return $this->role === 'teacher';
    }

    /**
     * Determine if the user is a student.
     */
    public function isStudent()
    {
        return $this->role === 'student';
    }

    /**
     * A teacher has many classes.
     */
    public function classes()
    {
        return $this->hasMany(ClassModel::class, 'teacherid');
    }

    /**
     * A student can have many attendances.
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'studentid');
    }
        /**
     * A user can have many classes.
     */
    public function studentclasses()
    {
        return $this->belongsToMany(ClassModel::class, 'class_user', 'user_id', 'class_id');
    }

}
