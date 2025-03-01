<x-mainlayout title="Class Detail">

    <div class="mt-14">
        <h4 class="font-semibold text-lg inline">Homeroom Teacher: </h4><span class="text-gray-500">{{ $class->homeroomTeacher->name }}</span>
    </div>

    <div class="mt-3">
        <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">List Student</h2>
        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
            @foreach ($class->students as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ul>
    </div>




</x-mainlayout>
