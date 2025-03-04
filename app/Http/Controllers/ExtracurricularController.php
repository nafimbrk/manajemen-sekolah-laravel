<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ExtracurricularController extends Controller
{
    public function index() {
        $ekskul = Extracurricular::get();
        confirmDelete('Hapus Data', 'Yakin ingin menghapus data');
        return view('ekskul.extracurricular', ['ekskulList' => $ekskul]);
    }

    public function show($id)
    {
        $ekskul = Extracurricular::with('students')->findOrFail($id);
        return view('ekskul.extracurricular-detail', ['ekskul' => $ekskul]);
    }

    public function create() {
        return view('ekskul.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'nama wajib diisi'
        ]);

        Extracurricular::create($request->all());
        Alert::success('Berhasil', 'Berhasil Menambahkan Data');
        return redirect('/extracurricular');
    }

    public function edit($id) {
        $ekskul = Extracurricular::select('id', 'name')->where('id', $id)->get();
        return view('ekskul.edit', compact('ekskul'));
    }

    public function update(Request $request, $id) {
        $ekskul = Extracurricular::findOrFail($id);
        $ekskul->update($request->all());
        Alert::success('Berhasil', 'Berhasil Mengedit Data');
        return redirect('/extracurricular');
    }

    public function destroy($id) {
        $ekskul = Extracurricular::where('id', $id);
        $ekskul->delete();
        Alert::success('Berhasil', 'Berhasil Menghapus Data');
        return redirect('/extracurricular');
    }


}
