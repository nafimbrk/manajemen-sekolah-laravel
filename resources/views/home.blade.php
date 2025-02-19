@extends('layouts.mainlayout')
@section('title', 'home')

@section('content')


<div class="mt-20">

    <h2 class="font-bold text-xl">selamat datang {{ Auth::user()->name }}, anda adalah {{ Auth::user()->role->name }}</h2>
</div>


@endsection
