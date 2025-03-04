




<x-mainlayout title="Ekskul Student">

    <div class="mt-16 mb-4 flex justify-between items-center mx-auto">
        <h1 class="font-bold text-xl">Student Extracurricular List</h1>

        <a href="{{ route('ekskul.student.create') }}"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
        class="fa-solid fa-plus"></i> Add
        Data</a>

    </div>


    <div class="relative overflow-x-auto sm:rounded-lg">
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
                        Extracurricular
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                @foreach($student->extracurriculars as $extracurricular)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $student->name }}</td>
                        <td class="px-6 py-4">{{ $extracurricular->name }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('ekskul.student.edit', ['student_id' => $student->id, 'extracurricular_id' => $extracurricular->id]) }}"
        class="font-medium text-white bg-yellow-400 px-2 py-2 mr-1 rounded dark:text-blue-500 hover:underline">
        <i class="fa-solid fa-pen"></i>
    </a>
                            <form action="{{ route('ekskul.student.destroy') }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <input type="hidden" name="extracurricular_id" value="{{ $extracurricular->id }}">
                        <button type="button" onclick="confirmDeleteEx()" class="font-medium text-white bg-red-500 px-2 py-2 rounded dark:text-blue-500 hover:underline"><i class="fa-solid fa-trash"></i></button>
                    </form>
                        </td>
                    </tr>
                    @endforeach
                    @endforeach
            </tbody>
        </table>



    </div>
</x-mainlayout>

