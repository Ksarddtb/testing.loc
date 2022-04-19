<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studyplan extends Model
{
    use HasFactory;
    /**
     * Get all of the comments for the Studyplan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lection()
    {
        return $this->hasMany(lection::class, 'id', 'lection_id');
    }
}
