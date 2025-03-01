<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClassController extends Controller
{
    public function index() {

        $class = ClassRoom::get();
        confirmDelete('Hapus Data', 'Yakin ingin menghapus data');
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

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'teacher_id' => 'required'
        ], [
            'name.required' => 'nama wajib diisi',
            'teacher_id.required' => 'wajib memilih wali kelas'
        ]);


        try {
            ClassRoom::create($request->all());
            Alert::success('Berhasil', 'Berhasil Menambahkan Data');
            return redirect('/class');
        } catch (Exception $e) {
            Alert::success('Gagal', 'Gagal menambahkan data ' . $e->getMessage());
            return redirect()->route('class.create');
        }

    }

    public function edit(Request $request, $id) {
        $class = ClassRoom::with('homeroomTeacher')->findOrFail($id);
        $teacher = Teacher::where('id', '!=', $class->teacher_id)->get(['id', 'name']);
        return view('class.edit', compact('class', 'teacher'));
    }

    public function update(Request $request, $id) {
        $class = ClassRoom::findOrFail($id);

        $class->update($request->all());
        Alert::success('Berhasil', 'Berhasil Mengedit Data');
        return redirect('/class');
    }

    public function destroy($id)
    {
        $class = ClassRoom::findOrFail($id);

        $class->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Data');
        return redirect('/students');
    }

}
