<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TeacherController extends Controller
{
    public function index() {
        $teacher = Teacher::all();
        confirmDelete('Hapus Data', 'Yakin ingin menghapus data');
        return view('teacher.teacher', ['teacherList' => $teacher]);
    }

    public function show($id) {
        $teacher = Teacher::with('class.students')->findOrFail($id);
        return view('teacher.teacher-detail', ['teacher' => $teacher]);
    }

    public function create()
    {
        return view('teacher.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'nama wajib diisi'
        ]);

        if($validated) {
            Teacher::create($request->all());
            Alert::success('Berhasil', 'Berhasil Menambahkan Data');
            return redirect('/teacher');
        } else {
            Alert::danger('Gagal', 'Gagal Menambahkan Data');
            return redirect('/teacher/create');
        }

    }

    public function edit($id) {

        $teacher = Teacher::findOrFail($id);

        return view('teacher.edit', compact('teacher'));
    }

    public function update(Request $request, $id) {

        $teacher = Teacher::findOrFail($id);

        if($teacher) {
            $teacher->update($request->all());
            Alert::success('Berhasil', 'Berhasil Mengedit Data');
            return redirect('/teacher');
        }
}

public function destroy($id) {
    $teacher = Teacher::findOrFail($id);

    if($teacher) {
        $teacher->delete();
        Alert::success('Berhasil', 'Berhasil Menghapus Data');
        return redirect('/teacher');
    }
}

}
