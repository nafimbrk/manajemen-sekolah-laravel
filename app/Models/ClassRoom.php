<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassRoom extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'class';
    protected $guarded = [];


    public function students()
    {
        return $this->hasMany(Student::class, 'class_id', 'id');
    }


    public function homeroomTeacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}
