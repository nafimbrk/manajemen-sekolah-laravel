<x-mainlayout title="Ekskul Edit">
    <div class="mt-16">

        <h1 class="font-bold text-2xl">Edit Data</h1>
    </div>

        <form action="{{ route('ekskul.student.update') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="old_student_id" value="{{ $student->id }}">
            <input type="hidden" name="old_extracurricular_id" value="{{ $selectedExtracurricular }}">

            <div class="mb-4 mt-4">
            <!-- Pilih Siswa -->
            <label for="student_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Siswa</label>
            <select name="student_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('teacher_id') is-invalid @enderror">
                @foreach($students as $s)
                    <option value="{{ $s->id }}" @if($s->id == $student->id) selected @endif>
                        {{ $s->name }}
                    </option>
                @endforeach
            </select>
            </div>

            <div class="mb-4">

            <!-- Pilih Ekstrakurikuler -->
            <label for="extracurricular_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Ekskul</label>
            <select name="extracurricular_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('teacher_id') is-invalid @enderror">
                @foreach($extracurriculars as $e)
                    <option value="{{ $e->id }}" @if($e->id == $selectedExtracurricular) selected @endif>
                        {{ $e->name }}
                    </option>
                @endforeach
            </select>
        </div>


        <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</x-mainlayout>
