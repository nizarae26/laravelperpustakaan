<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    @include('admin-lte.head')

    <!-- Custom fonts for this template-->
    <link href="/sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center ml-4" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-2" style="font-size: 90%">Perpustakaan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item @yield('active-dashboard')">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li
                class="nav-item active @yield('active-kategori') @yield('active-penerbit') @yield('active-rak') @yield('active-buku') @yield('active-user')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item @yield('active-kategori')" href="/DataCategory">Data Category</a>
                        <a class="collapse-item @yield('active-penerbit')" href="/DataPenerbit">Data Penerbit</a>
                        <a class="collapse-item @yield('active-rak')" href="/DataRak">Data Rak</a>
                        <a class="collapse-item active" href="/DataBuku">Data Buku</a>
                        <a class="collapse-item @yield('active-user')" href="/DataUser">Data User</a>
                    </div>
                </div>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pesanan"
                    aria-expanded="true" aria-controls="pesanan">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Data Pesanan</span>
                </a>
                <div id="pesanan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/pesanan/baru"> Pesanan Baru</a>
                        <a class="collapse-item" href="/pesanan/dikonfirmasi"> Pesanan Dikonfirmasi</a>
                        <a class="collapse-item" href="/pesanan/dikemas">Pesanan Dikemas</a>
                        <a class="collapse-item" href="/pesanan/dikirim">Pesanan Dikirim</a>
                        <a class="collapse-item" href="/pesanan/diterima">Pesanan Diterima</a>
                        <a class="collapse-item" href="/pesanan/selesai">Pesanan Selesai</a>
                    </div>
                </div>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link" href="/payment">
                    <i class="fas fa-fw fa-credit-card"></i>
                    <span>Pembayaran</span></a>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link" href="/laporan">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Laporan</span></a>
            </li>

            <li class="nav-item @yield('active-peminjaman') @yield('active-pengembalian') ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-folder fa-cog"></i>
                    <span>Perpus Master</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item @yield('active-peminjaman')" href="/DataCategory">Data Peminjaman</a>
                        <a class="collapse-item @yield('active-pengembalian')" href="/DataPenerbit">Data Pengembalian</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/tentang">
                    <i class="fas fa-fw fa-globe"></i>
                    <span>About</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="/logout" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="/sbadmin2/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Data Peminjaman</h1>


                    <div class="content">
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header" style="background-color: white">
                                                <div class="d-flex align-items-center">
                                                    <h4 class="card-title"></h4>
                                                    <button class="btn btn-primary btn-round ml-auto"
                                                        data-toggle="modal" data-target="#modalTambahBuku">
                                                        <i class="fa fa-plus"></i>
                                                        Tambah Data
                                                    </button>
                                                </div>

                                                <!-- /.card-header -->
                                                <div class="card-body" style="background-color: white">
                                                    <table id="example1"
                                                        class="table table-bordered table-hover table-striped text-center">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Judul</th>
                                                                <th>Penulis</th>
                                                                <th>Penerbit</th>
                                                                <th>Kategori</th>
                                                                <th>Gambar</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $no = 1;
                                                            @endphp
                                                            {{-- @foreach ($data as $index => $row) --}}
                                                            <tr>
                                                                {{-- <td>{{ $index + $data->firstitem() }}</td>
                                                                    <td>{{ $row->judul }}</td>
                                                                    <td>{{ $row->penulis }}</td>
                                                                    <td>{{ $row->penerbit->nama }}</td>
                                                                    <td>{{ $row->kategori->nama }}</td>
                                                                    <td><img src="storage/buku/{{ $row->sampul }} "alt=" "
                                                                            width="60px" class=""></td> --}}
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <button type="button" title=""
                                                                        class="btn btn-link btn-danger btn-lg delete"
                                                                        {{-- data-id="{{ $row->id }}"
                                                                        data-nama="{{ $row->nama }}" --}}
                                                                        data-original-title="Remove">
                                                                        <i class="fas fa-trash text-white"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            {{-- @endforeach --}}
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Judul</th>
                                                                <th>Penulis</th>
                                                                <th>Penerbit</th>
                                                                <th>Kategori</th>
                                                                <th>Gambar</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    <div class="row justify-content-center">
                                                        {{-- <div>{{ $data->links() }}</div> --}}
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.container-fluid -->
                            </div>
                    </div>
                    {{-- </section> --}}

                    <!-- Modal Tambah Buku -->
                    {{-- <div class="modal fade" id="modalTambahBuku" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLongTitle"><b> Tambah Buku</b></h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="/Buku/insertBuku" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="mb-2">
                                                    <label for="judul" class="form-label">Judul Buku</label>
                                                    <input type="text" name="judul" class="form-control"
                                                        autofocus>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="slug" class="form-label">Slug</label>
                                                    <input type="text" name="slug" class="form-control"
                                                        autofocus>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="sampul" class="form-label">Sampul</label>
                                                    <input type="file" name="sampul" class="form-control"
                                                        autofocus>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="penulis" class="form-label">Penulis</label>
                                                    <input type="text" name="penulis" class="form-control"
                                                        autofocus>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="penerbit">Penerbit</label>
                                                    <select value="penerbit_id" class="form-control"
                                                        name="penerbit_id">
                                                        <option selected value="penerbit_id">Pilih Penerbit</option>
                                                        @foreach ($penerbit as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('penerbit_id')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="mb-2">
                                                    <label for="kategori">Kategori</label>
                                                    <select value="kategori_id" class="form-control"
                                                        name="kategori_id">
                                                        <option selected value="kategori_id">Pilih Kategori</option>
                                                        @foreach ($kategori as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('kategori_id')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="mb-2">
                                                    <label for="rak">Rak</label>
                                                    <select value="rak_id" class="form-control" name="rak_id">
                                                        <option selected value="rak_id">Pilih Rak</option>
                                                        @foreach ($raks as $item)
                                                            <option value="{{ $item->id }}">Rak :
                                                                {{ $item->rak }};
                                                                Baris :
                                                                {{ $item->baris }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('rak_id')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="mb-2">
                                                    <label for="stok" class="form-label">Stok</label>
                                                    <input type="number" name="stok" class="form-control"
                                                        autofocus>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                    class="fa fa-undo"></i>
                                                Close</button>
                                            <button type="submit" class="btn btn-primary "><i
                                                    class="fa fa-save"></i>
                                                Save
                                                changes</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div> --}}

                    <!-- Modal Show Buku -->

                    {{-- @foreach ($data as $dd)
                            <div class="modal fade" id="modalShowBuku{{ $dd->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle"><b> Show Buku</b></h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="row justify-content-center">
                                                        <img src="/storage/buku/{{ $dd->sampul }}" alt=""
                                                            width="300px" height="350px" class="text-center">
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
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                    class="fa fa-undo"></i>
                                                Close</button>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @endforeach --}}

                    <!-- Modal Edit Buku -->

                    {{-- @foreach ($data as $dd)
                            <div class="modal fade" id="modalEditBuku{{ $dd->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle"><b> Edit Data Buku</b>
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="/Buku/{{ $dd->id }}/updateBuku" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="mb-2">
                                                        <label for="judul" class="form-label">Judul Buku</label>
                                                        <input type="text" name="judul" class="form-control"
                                                            value="{{ $dd->judul }}">
                                                        @error('judul')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="slug" class="form-label">Slug</label>
                                                        <input type="text" name="slug" class="form-control"
                                                            value="{{ $dd->slug }}">
                                                        @error('slug')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="sampul" class="form-label">Sampul</label>
                                                        <input type="file" name="sampul" class="form-control"
                                                            value="{{ $dd->sampul }}">
                                                        <td><img src="{{ asset('storage/buku/' . $dd->sampul) }}"
                                                                width="60px" height="80px" style="margin-top: 1%">
                                                            {{ $dd->sampul }}
                                                        </td>
                                                        @error('sampul')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="penulis" class="form-label">Penulis</label>
                                                        <input type="text" name="penulis" class="form-control"
                                                            value="{{ $dd->penulis }}">
                                                        @error('penulis')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="penerbit_id">Penerbit</label>
                                                        <select class="form-control" name="penerbit_id"
                                                            id="penerbit_id">
                                                            <option selected value="{{ $dd->id }}">
                                                                {{ $dd->penerbit->nama }}</option>
                                                            @foreach ($penerbit as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('penerbit_id')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="kategori">Kategori</label>
                                                        <select class="form-control" name="kategori_id"
                                                            id="kategori_id">
                                                            <option selected value="{{ $dd->id }}">
                                                                {{ $dd->kategori->nama }}</option>
                                                            @foreach ($kategori as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('kategori_id')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="rak">Rak</label>
                                                        <select class="form-control" name="rak_id" id="rak_id">
                                                            <option selected value="{{ $dd->id }}">Rak :
                                                                {{ $dd->rak->rak }}; Baris :
                                                                {{ $dd->rak->baris }}</option>
                                                            @foreach ($raks as $item)
                                                                <option value="{{ $item->id }}">Rak :
                                                                    {{ $item->rak }}; Baris :
                                                                    {{ $item->baris }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('rak_id')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="stok" class="form-label">Stok</label>
                                                        <input type="number" name="stok" class="form-control"
                                                            value="{{ $dd->stok }}">
                                                        @error('stok')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fa fa-save"></i>
                                                    Save
                                                    changes</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @endforeach --}}

                </div>


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Perpus RPL 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->


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

    <script>
        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                return null;
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="/sbadmin2/sweetalert.min.js"></script>

    <script>
        $('.delete').click(function() {
            var Bukuid = $(this).attr('data-id')
            var Bukunama = $(this).attr('data-nama')

            swal({
                    title: "Yakin ?",
                    text: "Menghapus Data Buku " + Bukunama + " !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/deleteBuku/" + Bukuid + " "
                        swal("Data Berhasil di Hapus!", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi terhapus");
                    }
                });
        });
    </script>
    @include('sweetalert::alert')

    @stack('js')

</body>

</html>
