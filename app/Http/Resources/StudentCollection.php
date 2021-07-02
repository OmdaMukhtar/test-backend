<?php

namespace App\Http\Resources;

use App\Student;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StudentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = $this->collection->transform(function(Student $student){
            return new StudentResource($student);
        });

        return [
            'status' => count($data)? true : false,
            'name' => 'Student api',
            'data' => $data
        ];
    }
}
