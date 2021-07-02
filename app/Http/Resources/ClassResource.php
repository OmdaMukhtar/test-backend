<?php

namespace App\Http\Resources;

use App\ClassModel;
use Illuminate\Http\Resources\Json\JsonResource;

class ClassResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'status' => $this->status,
            'description' => $this->description,
            'max_students' => $this->max_students,
            'students' => $this->students
        ];
    }
}
