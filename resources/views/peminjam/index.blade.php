@extends('layouts.app')
@section('title', 'Perpus | Peminjaman')
@section('buku')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link href="/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/fontawesome/css/brands.css" rel="stylesheet">
    <link href="/fontawesome/css/solid.css" rel="stylesheet">
    <nav class="navbar navbar-expand-md navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/dashboard/peminjam') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse  mt-lg-0" id="navbarNavDropdown">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav  ">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                            data-bs-toggle="dropdown" style="cursor: pointer" saria-haspopup="true" aria-expanded="false"
                            v-pre>
                            Penerbit
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown"
                            style="cursor: pointer">
                            <a class="dropdown-item" href="/semuaPenerbit/">Semua Penerbit</a>
                            <div class="dropdown-divider"></div>
                            @foreach ($penerbit as $item)
                                <a class="dropdown-item" href="/pilihPenerbit/{{ $item->id }}">{{ $item->nama }}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>

                @guest
                @else
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
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
                @endguest

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto ">
                    <!-- Authentication Links -->
                    @guest

                        <li class="nav-item">
                            <a class="nav-link text-white" href="/loginn">Login</a>
                        </li>



                        <li class="nav-item">
                            <a class="nav-link text-white" href="/registerr">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white   " href="#" role="button"
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
            <div class="col-md-8 mb-4">
                <h1>{{ $title }}</h1>
            </div>

            <div class="col-md-4">
                <form action="/dashboard/peminjam" method="GET">
                    @csrf
                    <div class="input-group">
                        <button class="btn btn-secondary" value="searchh" type="submit"><i
                                class="fas fa-search"></i></button>
                        <input name="searchh" type="search" class="form-control" placeholder="Cari Buku"
                            value="{{ old('searchh') }}" style="background-color: white">
                    </div>
                </form>
            </div>
        </div>

        {{-- @if ($detailbuku)
            <div class="row">
                <div class="col-md-4">
                    <img src="/storage/{{$data->sampul}}" alt="">
                </div>
            </div>
        @endif --}}

        @if ($data->isNotEmpty())
            <div class="row">
                @if (request('searchh'))
                    @foreach ($datas as $dd)
                        <div class="col-md-3">
                            <div class="card mb-4 shadow" style="cursor: pointer">
                                <img src="/storage/buku/{{ $dd->sampul }}" alt="{{ $dd->judul }}"
                                    class="card-img-top" width="300" height="350">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $dd->judul }}</h5>
                                    <p class="card-text">{{ $dd->penulis }}</p>
                                    {{-- <a href="#modalShowBuku{{ $dd->id }}" id="modalShowBuku{{ $dd->id }}" type="button" data-toggle="modal"
                                title="" class="btn btn-success" data-original-title="Show"> Show buku</a> --}}
                                </div>
                                <div class="card-footer">
                                    <a type="button" data-toggle="modal" title=""
                                        href="#modalShowBuku{{ $dd->id }}" class="btn btn-primary"
                                        data-original-title="Show">
                                        <i class="fa fa-eye text-white"></i> Detail Buku</a>
                                    <a type="button" class="btn btn-success" href="/pinjamBuku/{{ $dd->id }}"> <i
                                            class="fa fa-book text-white"></i> Pinjam</a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach ($data as $dd)
                        <div class="col-md-3">
                            <div class="card mb-4 shadow" style="cursor: pointer">
                                <img src="/storage/buku/{{ $dd->sampul }}" alt="{{ $dd->judul }}"
                                    class="card-img-top" width="300" height="350">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $dd->judul }}</h5>
                                    <p class="card-text">{{ $dd->penulis }}</p>
                                    {{-- <a href="#modalShowBuku{{ $dd->id }}" id="modalShowBuku{{ $dd->id }}" type="button" data-toggle="modal"
                                    title="" class="btn btn-success" data-original-title="Show"> Show buku</a> --}}
                                </div>
                                <div class="card-footer">
                                    <a type="button" data-toggle="modal" title=""
                                        href="#modalShowBuku{{ $dd->id }}" class="btn btn-primary"
                                        data-original-title="Show">
                                        <i class="fa fa-eye text-white"></i> Detail Buku</a>
                                    <a type="button" class="btn btn-success" href="/pinjamBuku/{{ $dd->id }}"> <i
                                            class="fa fa-book text-white"></i> Pinjam</a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif

                <!-- Modal Show Buku -->
                @foreach ($data as $dd)
                    <div class="modal fade" id="modalShowBuku{{ $dd->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLongTitle"><b> Show Buku</b></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="row justify-content-center">
                                                <img src="/storage/buku/{{ $dd->sampul }}" alt=""
                                                    width="300" height="350" class="text-center">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <table class="table text-nowarp">
                                                <tbody>
                                                    <tr>
                                                        <th>Judul</th>
                                                        <td>:</td>
                                                        <td>{{ $dd->judul }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Penulis</th>
                                                        <td>:</td>
                                                        <td>{{ $dd->penulis }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Penerbit</th>
                                                        <td>:</td>
                                                        <td>{{ $dd->penerbit->nama }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kategori</th>
                                                        <td>:</td>
                                                        <td>{{ $dd->kategori->nama }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Rak</th>
                                                        <td>:</td>
                                                        <td>{{ $dd->rak->rak }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Baris</th>
                                                        <td>:</td>
                                                        <td>{{ $dd->rak->baris }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Stok</th>
                                                        <td>:</td>
                                                        <td>{{ $dd->stok }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <a href="/favorit/{{ $dd->id }}" style="" class="btn btn-primary"
                                        alt="Tambahkan Favorit">
                                        <i class="fa fa-heart text-white"></i> Add Favorit
                                    </a>
                                    <a type="button" class="btn btn-success" href="/ulasan/{{ $dd->id }}">
                                        <i class="fa fa-feather text-white"></i> Ulasan</a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                            class="fa fa-undo"></i>
                                        Tutup</button>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @else
            <div class="alert alert-danger">
                Data Tidak Ada
            </div>
        @endif




        <div class="row justify-content-center" style="align-content: center">
            <div>
                {{ $data->links() }}
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="/sbadmin2/sweetalert.min.js"></script>
    @include('sweetalert::alert')
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="/sbadmin2/sweetalert.min.js"></script>

    <script src="/sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/sbadmin2/js/sb-admin-2.min.js"></script>
    @include('sweetalert::alert')
@endsection
