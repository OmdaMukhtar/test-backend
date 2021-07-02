<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'classes';
    protected $fillable = [
        'code',
        'name',
        'status',
        'description',
        'max_students',
        'students',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id', 'id');
    }

    public function getStatusAttribute($value)
    {
        return $value == 0? 'close': 'open';
    }
}
