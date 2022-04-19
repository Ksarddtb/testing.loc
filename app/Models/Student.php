<?php

namespace App\Models;

use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    /**
     * Get the user that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected $fillable=['name','email','student_class_id'];
    public function classes()
    {
        return $this->belongsTo(StudentClass::class, 'student_class_id', 'id');
    }
    public function lection()
    {
        return $this->belongsToMany(lection::class, 'studyplans','student_class_id','lection_id');
    }
}
