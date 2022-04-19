<?php

namespace Database\Factories;

use App\Models\lection;
use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudyPlan>
 */
class StudyPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_class_id'=>$id=StudentClass::inRandomOrder()->first(),
            'lection_id'=>lection::inRandomOrder()->first(),
        ];
    }
}
