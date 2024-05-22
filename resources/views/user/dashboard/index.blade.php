@extends('layouts.main')

@section('container')
    {{-- Page Heading --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard - Selamat Datang, {{ auth()->user()->name }}</h1>
    </div>
    {{-- End of Page Heading --}}


@endsection