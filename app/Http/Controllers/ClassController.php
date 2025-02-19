<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Teacher;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\ClassLike;

class ClassController extends Controller
{
    public function index() {

        $class = ClassRoom::get();
        return view('class.classroom', ['classList' => $class]);
    }


    public function show($id)
    {
        $class = ClassRoom::with(['students', 'homeroomTeacher'])->findOrFail($id);
        return view('class.class-detail', ['class' => $class]);
    }

    public function create()
    {
        $teacher = Teacher::select('id', 'name')->get();
        return view('class.create', compact('teacher'));
    }
}
