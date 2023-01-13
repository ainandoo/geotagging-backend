@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Dashboard</h1>
        <p class="lead">Only authenticated users can access this section.</p>
        <a class="btn btn-lg btn-primary" href="#" role="button">View more &raquo;</a>
        @endauth

        @guest
        <h1>BBLK Surabaya Geotagging</h1>
        <p class="lead">Selamat datang. Silakan login terlebih dahulu.</p>
        @endguest
    </div>
@endsection