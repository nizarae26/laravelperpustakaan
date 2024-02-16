@extends('layouts.app')
@include('admin-lte/flash')
@section('buku')
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
                <ul class="navbar-nav me-auto">
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

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
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
            <div class="col-md-12 mb-4">
                @foreach ($data as $item)
                    <h1>Detail Buku {{ $item->judul }}</h1>

            </div>
        </div>

        {{-- @if ($detailbuku)
            <div class="row">
                <div class="col-md-4">
                    <img src="/storage/{{$data->sampul}}" alt="">
                </div>
            </div>
        @endif --}}


        <div class="row">

            <div class="col-4">
                <div class="card mb-4 shadow rounded" style="cursor: pointer">
                    <img src="/storage/buku/{{ $item->sampul }}" alt="{{ $item->judul }}" class="card-img-top rounded"
                        width="280" height="380">
                </div>
            </div>

            <div class="col">
            </div>

            <div class="col-7">
                {{-- <div class="col-md-5"> --}}
                <table class="table ">
                    <tbody>
                        <tr>
                            <th>Judul</th>
                            <td>:</td>
                            <td>{{ $item->judul }}</td>
                        </tr>
                        <tr>
                            <th>Penulis</th>
                            <td>:</td>
                            <td>{{ $item->penulis }}</td>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <td>:</td>
                            <td>{{ $item->penerbit->nama }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>:</td>
                            <td>{{ $item->kategori->nama }}</td>
                        </tr>
                        <tr>
                            <th>Rak</th>
                            <td>:</td>
                            <td>{{ $item->rak->rak }}</td>
                        </tr>
                        <tr>
                            <th>Baris</th>
                            <td>:</td>
                            <td>{{ $item->rak->baris }}</td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td>:</td>
                            <td>{{ $item->stok }}</td>
                        </tr>
                    </tbody>

                </table>
                <a href="/favorit/{{ $item->id }}" style="text-align: right" class="btn btn-success">Pinjam</a>
            </div>
            {{-- </div> --}}
        </div>
        @endforeach





        <div class="row justify-content-center" style="align-content: center">
            <div>
                {{-- {{ $data->links() }} --}}
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="/sbadmin2/sweetalert.min.js"></script>
    @include('sweetalert::alert')
@endsection
