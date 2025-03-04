<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    protected $guarded = [];
    use HasFactory, SoftDeletes;

    public function teachers()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}
