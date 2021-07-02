<?php

namespace App\Http\Resources;

use App\ClassModel;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ClassCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = $this->collection->transform(function(ClassModel $classModel){
            return new ClassResource($classModel);
        });

        return [
            'status' => $data->count() != 0,
            'name' => 'Class api',
            'data' => $data
        ];
    }
}
