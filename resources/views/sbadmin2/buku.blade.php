@section('active-buku', 'active')
@section('title', 'Buku | Perpus')
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    {{-- @include('admin-lte.head') --}}

    <link href="/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/fontawesome/css/brands.css" rel="stylesheet">
    <link href="/fontawesome/css/solid.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="/sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('sbadmin2/sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('sbadmin2/navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Data Buku</h1>


                    <div class="content">
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header" style="background-color: white">
                                                <div class="d-flex align-items-center">
                                                    <h4 class="card-title"></h4>
                                                    <button class="btn btn-success btn-round ml-auto"
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
                                                                <th>Kode Buku</th>
                                                                <th>Judul</th>
                                                                <th>Gambar</th>
                                                                <th>Dibuat Pada</th>
                                                                <th>Diedit Pada</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $no = 1;
                                                            @endphp
                                                            @foreach ($data as $index => $row)
                                                                <tr>
                                                                    <td>{{ $no++ }}</td>
                                                                    <td>{{ $row->id }}</td>
                                                                    <td>{{ $row->judul }}</td>
                                                                    <td><img src="storage/buku/{{ $row->sampul }} "alt=" "
                                                                            width="60px" class=""></td>
                                                                    <td>{{ $row->created_at }}</td>
                                                                    <td>{{ $row->updated_at }}</td>
                                                                    <td>
                                                                        <a type="button" data-toggle="modal"
                                                                            title=""
                                                                            href="#modalEditBuku{{ $row->id }}"
                                                                            class="btn btn-link btn-primary btn-lg "
                                                                            data-original-title="Edit">
                                                                            <i class="fas fa-edit text-white"></i>
                                                                        </a>
                                                                        <a type="button" data-toggle="modal"
                                                                            title=""
                                                                            href="#modalShowBuku{{ $row->id }}"
                                                                            class="btn btn-link btn-success btn-lg "
                                                                            data-original-title="Show">
                                                                            <i class="fas fa-eye text-white"></i>
                                                                        </a>
                                                                        <button type="button" title=""
                                                                            class="btn btn-link btn-danger btn-lg delete"
                                                                            data-id="{{ $row->id }}"
                                                                            data-nama="{{ $row->nama }}"
                                                                            data-original-title="Remove">
                                                                            <i class="fas fa-trash text-white"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kode Buku</th>
                                                                <th>Judul</th>
                                                                <th>Gambar</th>
                                                                <th>Dibuat Pada</th>
                                                                <th>Diedit Pada</th>
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
                        </section>

                        <!-- Modal Tambah Buku -->
                        <div class="modal fade" id="modalTambahBuku" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLongTitle"><b> Tambah Buku</b></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                {{-- <input type="hidden" name="slug"> --}}
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
                                                    <label for="stok">Stok</label>
                                                    <input type="number" name="stok" id="stok"
                                                        class="form-control" autofocus>
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
                        </div>

                        <!-- Modal Show Buku -->
                        @foreach ($data as $dd)
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
                        @endforeach

                        <!-- Modal Edit Buku -->
                        @foreach ($data as $dd)
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
                                                        <label for="penerbit">penerbit</label>
                                                        <select value="penerbit_id" class="form-control"
                                                            name="penerbit_id">
                                                            <option value="{{ $item->id }}">Pilih penerbit
                                                            </option>
                                                            @foreach ($penerbit as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $item->id == $dd->penerbit_id ? 'selected' : '' }}>
                                                                    {{ $item->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('kategori_id')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="kategori">Kategori</label>
                                                        <select value="kategori_id" class="form-control"
                                                            name="kategori_id">
                                                            <option value="{{ $item->id }}">Pilih Kategori
                                                            </option>
                                                            @foreach ($kategori as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $item->id == $dd->kategori_id ? 'selected' : '' }}>
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
                                                            <option value="{{ $dd->id }}">Pilih Rak</option>
                                                            @foreach ($raks as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $item->id == $dd->rak_id ? 'selected' : '' }}>
                                                                    Rak :
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
                        @endforeach
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
