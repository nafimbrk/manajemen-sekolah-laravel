<x-mainlayout title="Ekskul Student Create">
    <div class="mt-16">

        <h1 class="font-bold text-2xl">Tambah Data</h1>
    </div>
    <form class="mx-auto" action="{{ route('ekskul.student.store') }}" method="POST">
        @csrf

        <div class="mb-4 mt-4">
            <label for="student_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                Siswa</label>
            @error('student_id')
            <p class="text-red-500 italic">{{ $message }}</p>
            @enderror
            <select id="student_id" name="student_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('teacher_id') is-invalid @enderror">
                <option selected disabled>Select one</option>
                @foreach($students as $student)
                <option value="{{ $student->id }}" @selected(old('student_id')==$student->id)>{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="extracurricular_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                Ekskul</label>
            @error('extracurricular_id')
            <p class="text-red-500 italic">{{ $message }}</p>
            @enderror
            <select id="extracurricular_id" name="extracurricular_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('teacher_id') is-invalid @enderror">
                <option selected disabled>Select one</option>
                @foreach($extracurriculars as $extracurricular)
                <option value="{{ $extracurricular->id }}" @selected(old('extracurricular_id')==$extracurricular->id)>{{
                    $extracurricular->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</x-mainlayout>
