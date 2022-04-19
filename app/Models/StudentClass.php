<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StudentClass extends Model
{
    use HasFactory;
    /**
     * Get all of the comments for the StudentClass
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'student_class_id', 'id');
    }
    /**
     * The roles that belong to the StudentClass
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lection(): BelongsToMany
    {
        return $this->belongsToMany(lection::class, 'studyplans', 'student_class_id', 'lection_id');
    }


}
