@extends('layouts.app')
@include('admin-lte/flash')
@section('title', 'Ulasan | Perpus')
@section('buku')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/dashboard/peminjam') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" style="cursor: pointer" saria-haspopup="true" aria-expanded="false"
                            v-pre>
                            Kategori
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown"
                            style="cursor: pointer">
                            <a class="dropdown-item" href="/semuaBuku/">Semua Kategori</a>
                            <div class="dropdown-divider"></div>
                            @foreach ($kategori as $item)
                                <a class="dropdown-item" href="/pilihBuku/{{ $item->id }}">{{ $item->nama }}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav ">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" style="cursor: pointer" saria-haspopup="true" aria-expanded="false"
                            v-pre>
                            Penerbit
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown"
                            style="cursor: pointer">
                            <a class="dropdown-item" href="/semuaPenerbit/">Semua Penerbit</a>
                            <div class="dropdown-divider"></div>
                            @foreach ($penerbit as $item)
                                <a class="dropdown-item" href="/pilihBuku/{{ $item->id }}">{{ $item->nama }}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" style="cursor: pointer" saria-haspopup="true" aria-expanded="false"
                            v-pre>
                            Data
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown"
                            style="cursor: pointer">
                            <a class="dropdown-item" href="/detailPinjam">Data Pinjam</a>
                            <a class="dropdown-item" href="/favorit">Favorit</a>
                            {{-- <div class="dropdown-divider"></div>
                            @foreach ($kategori as $item)
                                <a class="dropdown-item" href="/pilihBuku/{{ $item->id }}">{{ $item->nama }}</a>
                            @endforeach --}}
                        </div>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto ">
                    <!-- Authentication Links -->
                    @guest

                        <li class="nav-item">
                            <a class="nav-link" href="/loginn">Login</a>
                        </li>



                        <li class="nav-item">
                            <a class="nav-link" href="/registerr">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col mb-4">
                @foreach ($data as $item)
                    <h1>Ulasan Buku {{ $item->judul }}</h1>

            </div>
            <div class="col-auto">
                <div class="card-header">
                    <a href="/dashboard/peminjam" style="" class="btn btn-primary mt-2 mb-2 ml-3"
                        alt="Tambahkan Favorit">
                        <i class="fa fa-arrow-left text-white"></i> Kembali
                    </a>

                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-4">
                <div class="card mb-4 shadow rounded" style="cursor: pointer">
                    <img src="/storage/buku/{{ $item->sampul }}" alt="{{ $item->judul }}" class="card-img-top rounded"
                        width="300" height="400">
                </div>
            </div>

            <div class="col-8 mt-1">

                <div class="card bg-white">
                    <div class="card-header">
                        <a href="/favorit/{{ $item->id }}" style="margin-right: 2%"
                            class="btn btn-primary mt-2 mb-2 ml-3" alt="Tambahkan Favorit">
                            <i class="fa fa-heart text-white"></i>
                        </a>

                        <head style="">Tambahkan Favorit</head>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <form action="/ulasan/insertUlasan/{{ $item->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <label for="ulasan" class="form-label"> Ulasan Buku
                                    {{ $item->judul }}</label>
                                @endforeach
                                <textarea class="form-control" name="ulasan" id="ulasan" rows="3"></textarea>
                                <div id="" class="form-text">Sharing your experience after reading this
                                    book.</div>
                                <div class="mt-4">
                                    <label for="" class="form-label">Rating Buku</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rating" id="rating"
                                        value="1">
                                    <label class="form-check-label" for="inlineRadio1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rating" id="rating"
                                        value="2">
                                    <label class="form-check-label" for="inlineRadio2">2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rating" id="rating"
                                        value="3">
                                    <label class="form-check-label" for="inlineRadio3">3</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rating" id="rating"
                                        value="4">
                                    <label class="form-check-label" for="inlineRadio3">4</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rating" id="rating"
                                        value="5">
                                    <label class="form-check-label" for="inlineRadio3">5</label>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-send text-white"></i> Kirim
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="/sbadmin2/sweetalert.min.js"></script>
    @include('sweetalert::alert')
@endsection
