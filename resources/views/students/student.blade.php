@extends('layouts.mainlayout')
@section('title', 'students')

@section('content')

    <h3 class="font-bold text-xl">Student List</h3>
    <!-- Bagian Tombol & Form Pencarian -->
    <div class="my-3 flex justify-between items-center mx-auto">
        <a href="student-add"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-2 mb-2">
            <i class="fa-solid fa-plus"></i> Add Data
        </a>

        <div class="flex gap-4 items-center">
            <!-- Form Pencarian -->
            <form action="" method="GET" class="flex gap-2">
                <input type="text" name="keyword" value="{{ request('keyword') }}"
                    class="rounded block p-2.5 w-72 text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search..." />
                <button type="submit"
                    class="p-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    <i class="fa fa-search"></i>
                </button>
            </form>

            <!-- Dropdown Urutan Terbaru/Terlama -->
            <form action="" method="GET">
                <input type="hidden" name="keyword" value="{{ request('keyword') }}">
                <select name="order" onchange="this.form.submit()"
                    class="block p-2.5 w-48 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="latest" {{ $order == 'latest' ? 'selected' : '' }}>Terbaru</option>
                    <option value="oldest" {{ $order == 'oldest' ? 'selected' : '' }}>Terlama</option>
                </select>
            </form>
        </div>


        <a href="student-deleted"
            class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-2 mb-2">
            <i class="fa-solid fa-trash"></i> Show Deleted Data
        </a>
    </div>



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                        Class
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studentList as $data)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $data->name }}</td>
                        <td class="px-6 py-4">{{ $data->gender }}</td>
                        <td class="px-6 py-4">{{ $data->nis }}</td>
                        <td class="px-6 py-4">{{ $data->class->name }}</td>
                        <td class="px-6 py-4">
                            @if (Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
                                -
                            @else
                                <a class="px-2 py-2 text-white bg-green-700 font-medium rounded dark:text-blue-500 hover:underline"
                                    href="student/{{ $data->id }}"><i class="fa-solid fa-eye"></i></a>
                                <a class="font-medium text-white bg-yellow-400 px-2 py-2 rounded dark:text-blue-500 hover:underline"
                                    href="student-edit/{{ $data->id }}"><i class="fa-solid fa-pencil"></i></a>
                            @endif

                            @if (Auth::user()->role_id == 1)
                            <form id="delete-form-{{ $data->id }}" action="/student-destroy/{{ $data->id }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')

                                <button type="button" class="font-medium text-white bg-red-500 px-2 py-2 rounded dark:text-blue-500 hover:underline"
                                    onclick="confirmDelete({{ $data->id }})">
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

    <div class="my-4 flex justify-center">
        {{ $studentList->withQueryString()->links() }}
    </div>











    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Hapus Data",
                text: "Yakin ingin menghapus data?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>






@endsection
