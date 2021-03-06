<?php

namespace App\Http\Resources;

use App\Models\StudentClass;
use Illuminate\Http\Resources\Json\JsonResource;

class Student extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>  $this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'student_class_id'=>$this->student_class_id,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            // 'classroom'=>$this->classes,
            'classroom'=>StudentClass::whereid($this->student_class_id)->with('lection')->first(),
        ];
    }
}
