<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $primaryKey = 'courseID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'instructor_id',
        'department_id',
        'title',
        'credit',
    ];

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class, 'instructor_id', 'instructorID');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'departmentID');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student', 'course_id', 'student_id');
    }
}
