<x-mainlayout title="Home">


<div class="mt-20">

    <h2 class="font-bold text-xl">selamat datang {{ Auth::user()->name }}, anda adalah {{ Auth::user()->role->name }}</h2>
</div>


</x-mainlayout>
