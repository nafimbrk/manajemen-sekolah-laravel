<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Teacher;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectController extends Controller
{
    public function index() {
        $subject = Subject::with('teachers')->get();
        confirmDelete('Hapus Data', 'Yakin ingin menghapus data');
        return view('subject.index', compact('subject'));
    }

    public function create() {
        $teacher = Teacher::all();
        return view('subject.create', compact('teacher'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'teacher_id' => 'required'
        ], [
            'name.required' => 'nama wajib diisi',
            'teacher_id.required' => 'wajib memilih wali kelas'
        ]);

            Subject::create($request->all());
            Alert::success('Berhasil', 'Berhasil Menambahkan Data');
            return redirect()->route('subject.index');
        }

        public function edit(Request $request, $id) {
            $subject = Subject::with('teachers')->findOrFail($id);
            $teacher = Teacher::where('id', '!=', $subject->teacher_id)->get(['id', 'name']);
            return view('subject.edit', compact('subject', 'teacher'));
        }

        public function update(Request $request, $id) {
            $subject = Subject::findOrFail($id);

            $subject->update($request->all());
            Alert::success('Berhasil', 'Berhasil Mengedit Data');
            return redirect()->route('subject.index');
        }

        public function destroy($id)
        {
            $subject = Subject::findOrFail($id);

            $subject->delete();

            Alert::success('Berhasil', 'Berhasil Menghapus Data');
            return redirect()->route('subject.index');
        }
}
