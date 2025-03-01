<x-mainlayout title="Teacher Detail">

    <div class="mt-14">
        <h4 class="font-semibold text-lg inline">
            class :
        </h4>
            @if ($teacher->class)
                <span class="text-gray-500">{{ $teacher->class->name }}</span>
            @else
                -
            @endif
    </div>

    <div class="mt-3">
        <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">list student</h2>
        @if ($teacher->class)
        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
            @foreach ($teacher->class->students as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ul>
        @endif
    </div>

</x-mainlayout>
