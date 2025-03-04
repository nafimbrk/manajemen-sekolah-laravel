<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCreateRequest;
use App\Models\ClassRoom;
use App\Models\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $student = Student::with('class')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('gender', $keyword)
                    ->orWhere('nis', 'LIKE', '%' . $keyword . '%')
                    ->orWhereHas('class', function ($query) use ($keyword) {
                        $query->where('name', 'LIKE', '%' . $keyword . '%');
                    });
            })
            ->paginate(10);

        confirmDelete('Hapus Data', 'Yakin ingin menghapus data');

        return view('students.student', [
            'studentList' => $student
        ]);
    }




    public function show($id)
    {
        $student = Student::with(['class.homeroomTeacher', 'extracurriculars'])->findOrFail($id);
        return view('students.student-detail', ['student' => $student]);
    }

    public function create()
    {
        $class = ClassRoom::select('id', 'name')->get();
        return view('students.student-add', ['class' => $class]);
    }

    public function store(StudentCreateRequest $request)
    {
        $newName = '';

        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('public/photo', $newName);
        }

        $request['image'] = $newName;
        $student = Student::create($request->all());

        Alert::success('Berhasil', 'Berhasil Menambahkan Data');
        return redirect('/students');
    }

    public function edit(Request $request, $id)
    {

        $student = Student::with('class')->findOrFail($id);
        $class = ClassRoom::where('id', '!=', $student->class_id)->get(['id', 'name']);
        return view('students.student-edit', ['student' => $student, 'class' => $class]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);


        if ($request->file('photo')) {
            $newName = '';

            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('public/photo', $newName);

            Storage::delete('public/photo/'.$student->image);

            $request['image'] = $newName;
            $student->update($request->all());
        } else {
            $student->update($request->all());

        }

        Alert::success('Berhasil', 'Berhasil Mengubah Data');
        return redirect('students');
    }

    public function destroy($id)
    {
        $deletedStudent = Student::findOrFail($id);

        Storage::delete('public/photo/'. $deletedStudent->image);

        $deletedStudent->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Data');
        return redirect('/students');
    }
}



