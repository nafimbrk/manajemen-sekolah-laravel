<x-mainlayout title="SUbject">
    <div class="mt-16 mb-4 flex justify-between items-center mx-auto">
        <h1 class="font-bold text-xl">Subject List</h1>

        <a href="{{ route('subject.create') }}"
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
                            Teacher
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subject as $data)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $data->name }}</td>
                            <td class="px-6 py-4">{{ $data->teachers->name }}</td>
                            <td class="px-6 py-4">
                                <a class="font-medium text-white bg-yellow-400 px-2 py-2 rounded dark:text-blue-500 hover:underline"
                                        href="{{ route('subject.edit', $data->id) }}"><i class="fa-solid fa-pen"></i></a>
                                        <form id="delete-form-{{ $data->id }}" action="{{ route('subject.destroy', $data->id) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="font-medium text-white bg-red-500 px-2 py-2 rounded dark:text-blue-500 hover:underline"
                                                onclick="confirmDelete({{ $data->id }})">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-mainlayout>











