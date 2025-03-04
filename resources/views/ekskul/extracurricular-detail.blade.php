<x-mainlayout title="Extracurricular Detail">




    <div class="mt-16">
        <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">List Peserta</h2>
        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
            @if (!$ekskul->students->isEmpty())
            @foreach ($ekskul->students as $item)
            <li>{{ $item->name }}</li>
            @endforeach
            @else
            -
            @endif
        </ul>
    </div>

</x-mainlayout>
