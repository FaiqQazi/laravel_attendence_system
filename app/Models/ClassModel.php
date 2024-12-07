<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'teacherid', 'starttime', 'endtime', 'credit_hours',
    ];

    /**
     * A class has many attendances.
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'classid');
    }

    /**
     * A class belongs to a teacher.
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacherid');
    }
        /**
     * A class has many students.
     */
    public function students()
    {
        return $this->belongsToMany(User::class, 'class_user', 'class_id', 'user_id');
    }

}
