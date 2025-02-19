@extends('layouts.mainlayout')
@section('title', 'students')

@section('content')

    <h3 class="font-bold text-xl">Student List</h3>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Foto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gender
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Class
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Homeroom Teacher
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Extracurricular
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <td class="px-6 py-4">
                        @if ($student->image != '')
                            <img src="{{ asset('storage/photo/' . $student->image) }}" alt="" width="200px" class="rounded-lg">
                        @else
                            Tidak Ada Foto
                        @endif
                    </td>
                    <td class="px-6 py-4">{{ $student->name }}</td>
                    <td class="px-6 py-4">{{ $student->nis }}</td>
                    <td class="px-6 py-4">{{ $student->gender }}</td>
                    <td class="px-6 py-4">{{ $student->class->name }}</td>
                    <td class="px-6 py-4">{{ $student->class->homeroomTeacher->name }}</td>
                    <td class="px-6 py-4">
                        @forelse ($student->extracurriculars as $item)
                        {{ $item->name }}@if(!$loop->last),@endif
                        @empty
                        Siswa Tidak Mengikuti Kegiatan Extracurricular
                        @endforelse
                    </td>
                </tr>
            </tbody>
        </table>



    </div>

@endsection
