<?php

namespace App;

use App\Http\Resources\ClassResource;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'class_id',
        'date_of_birth',
        'first_name',
        'last_name',
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }
}
