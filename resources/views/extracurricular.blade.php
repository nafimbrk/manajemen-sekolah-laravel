@extends('layouts.mainlayout')
@section('title', 'students')

@section('content')

    <h1>ini halaman extracurricular</h1>

    <div class="my-5">
        <a href="" class="btn btn-primary">Add Data</a>
    </div>
    <h3>extracurricular list</h3>

    <table class="table">
        <thead>
            <tr>
                <th>no</th>
                <th>name</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ekskulList as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td><a href="extracurricular-detail/{{ $data->id }}">detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection










{{-- <td>
    @foreach ($data->students as $item)
        - {{ $item->name }} <br>
    @endforeach
</td> --}}