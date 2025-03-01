<x-mainlayout title="Teacher">

    <div class="mt-16 mb-4 flex justify-between items-center mx-auto">
        <h1 class="font-bold text-xl">Teacher List</h1>

        <a href="{{ route('teacher.create') }}"
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
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teacherList as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $item->name }}</td>
                        <td class="px-6 py-4">
                            @if (Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
                                -
                            @else
                                <a class="px-2 py-2 text-white bg-green-700 font-medium rounded dark:text-blue-500 hover:underline"
                                    href="teacher-detail/{{ $item->id }}"><i class="fa-solid fa-eye"></i></a>
                                <a class="font-medium text-white bg-yellow-400 px-2 py-2 rounded dark:text-blue-500 hover:underline"
                                    href="teacher/edit/{{ $item->id }}"><i class="fa-solid fa-pencil"></i></a>
                            @endif

                            @if (Auth::user()->role_id == 1)
                            <form id="delete-form-{{ $item->id }}" action="{{ route('teacher.destroy', $item->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="font-medium text-white bg-red-500 px-2 py-2 rounded dark:text-blue-500 hover:underline"
                                    onclick="confirmDelete({{ $item->id }})">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



    </div>
</x-mainlayout>
