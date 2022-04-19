<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Student implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return [
            'name'=>'required|unique:students,name|string|max:200',
            'email'=>'required|unique:students,email|email|max:100',
            'student_class_id'=>'required|exists:student_classes,id'
        ];
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
