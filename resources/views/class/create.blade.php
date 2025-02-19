@extends('layouts.mainlayout')
@section('title', 'home')

@section('content')

<h1 class="font-bold text-2xl">Tambah Data</h1>
<form class="mx-auto" action="student" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4 mt-4">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
      @error('name')
    <p class="text-red-500 italic">{{ $message }}</p>
@enderror
      <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') is-invalid @enderror" />
    </div>
    <div class="mb-4">
    <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Gender</label>
    @error('gender')
    <p class="text-red-500 italic">{{ $message }}</p>
@enderror
    <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('genre') is-invalid @enderror">
      <option selected disabled>Select one</option>
      <option value="L" {{ old('gender') == "L" ? 'selected' : '' }}>L</option>
      <option value="P" {{ old('gender') == "P" ? 'selected' : '' }}>P</option>
    </select>
    </div>
    <div class="mb-4">
      <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nis</label>
      @error('nis')
    <p class="text-red-500 italic">{{ $message }}</p>
@enderror
      <input type="text" name="nis" id="nis" value="{{ old('nis') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" @error('nis') is-invalid @enderror />
    </div>
    <div class="mb-4">
        <label for="class_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Class</label>
        @error('class_id')
    <p class="text-red-500 italic">{{ $message }}</p>
@enderror
        <select id="class_id" name="class_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('class_id') is-invalid @enderror">
          <option selected disabled>Select one</option>
          @foreach ($class as $item)
                    <option value="{{ $item->id }}" @selected(old('class_id') == $item->id)>
                        {{ $item->name }}
                    </option>
                @endforeach
        </select>
        </div>
        <div class="mb-4">

<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="photo">Upload Foto</label>
@error('photo')
    <p class="text-red-500 italic">{{ $message }}</p>
@enderror
<input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('photo') is-invalid @enderror" id="photo" type="file" name="photo">

        </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>
@endsection
