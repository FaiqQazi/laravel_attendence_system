<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'classid', 'studentid', 'isPresent', 'comments',
    ];

    /**
     * An attendance belongs to a student.
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'studentid');
    }

    /**
     * An attendance belongs to a class.
     */
    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'classid');
    }
}
