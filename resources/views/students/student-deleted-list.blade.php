@extends('layouts.mainlayout')
@section('title', 'home')

@section('content')


<h3 class="font-bold text-xl">Trash</h3>



<div class="my-3 relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Gender
                </th>
                <th scope="col" class="px-6 py-3">
                    Nis
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $data)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $data->name }}</td>
                    <td class="px-6 py-4">{{ $data->gender }}</td>
                    <td class="px-6 py-4">{{ $data->nis }}</td>
                    <td class="px-6 py-4">
                            <a class="font-medium text-white bg-green-700 hover:bg-green-800 px-2 py-2 rounded dark:text-blue-500 hover:underline"
                                href="/student/{{ $data->id }}/restore"><i class="fa-solid fa-arrow-right"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



</div>

@endsection
