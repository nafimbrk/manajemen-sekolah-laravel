<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Extracurricular;
use RealRashid\SweetAlert\Facades\Alert;

class ExtracurricularStudentController extends Controller
{

    public function index() {
        $students = Student::with('extracurriculars')->get();
        confirmDelete('Hapus Data', 'Yakin ingin menghapus data');
        return view('ekskul-student.index', compact('students'));
    }

    public function create() {
        $students = Student::select('id', 'name')->get();
        $extracurriculars = Extracurricular::select('id', 'name')->get();

        return view('ekskul-student.create', [
            'students' => $students,
            'extracurriculars' => $extracurriculars
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'student_id' => 'required|exists:students,id',
            'extracurricular_id' => 'required|exists:extracurriculars,id'
        ]);

        $student = Student::find($request->student_id);
        $student->extracurriculars()->attach($request->extracurricular_id);

        Alert::success('Berhasil', 'Berhasil Menambahkan Data');
        return redirect()->route('ekskul.student.index');
    }

    public function edit(Request $request)
{
    $student = Student::findOrFail($request->student_id);
    $students = Student::all();
    $extracurriculars = Extracurricular::all();
    $selectedExtracurricular = $request->extracurricular_id;

    return view('ekskul-student.edit', compact('student', 'students', 'extracurriculars', 'selectedExtracurricular'));
}


public function update(Request $request)
{
    $request->validate([
        'old_student_id' => 'required|exists:students,id',
        'old_extracurricular_id' => 'required|exists:extracurriculars,id',
        'student_id' => 'required|exists:students,id',
        'extracurricular_id' => 'required|exists:extracurriculars,id',
    ]);

    $oldStudent = Student::findOrFail($request->old_student_id);
    $oldStudent->extracurriculars()->detach($request->old_extracurricular_id); // Hapus data lama

    $newStudent = Student::findOrFail($request->student_id);
    $newStudent->extracurriculars()->attach($request->extracurricular_id); // Tambahkan data baru

    return redirect()->route('ekskul.student.index')->with('success', 'Data berhasil diperbarui!');
}



    public function destroy(Request $request) {

        $request->validate([
            'student_id' => 'required|exists:students,id',
            'extracurricular_id' => 'required|exists:extracurriculars,id'
        ]);

        $student = Student::find($request->student_id);
        $student->extracurriculars()->detach($request->extracurricular_id);

        Alert::success('Berhasil', 'Berhasil Menghapus Data');
        return redirect()->route('ekskul.student.index');
    }
}
