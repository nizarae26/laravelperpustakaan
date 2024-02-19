@section('active-penerbit', 'active')
@section('title', 'Penerbit | Perpus')
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

        <!-- Sidebar -->
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
                    <h1 class="h3 mb-4 text-gray-800">Data Penerbit</h1>

                    <!-- isi -->
                    <div class="content">
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card mb-5">
                                            <div class="card-header" style="background-color: white">
                                                <div class="d-flex align-items-center">
                                                    <h4 class="card-title"></h4>
                                                    <button class="btn btn-success btn-round ml-auto"
                                                        data-toggle="modal" data-target="#modalTambahPenerbit">
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
                                                                <th width="3%">No</th>
                                                                <th width="20%">Nama penerbit</th>
                                                                <th width="20%">Slug</th>
                                                                <th width="10%">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $no = 1;
                                                            @endphp
                                                            @foreach ($data as $index => $row)
                                                                <tr>
                                                                    <td>{{ $no++ }}
                                                                    <td>{{ $row->nama }}</td>
                                                                    <td>{{ $row->slug }}</td>
                                                                    <td style="text-align: center ;">
                                                                        <div class="form-button-action">
                                                                            <a type="button" data-toggle="modal"
                                                                                title=""
                                                                                href="#modalEditPenerbit{{ $row->id }}"
                                                                                class="btn btn-link btn-primary btn-lg "
                                                                                data-original-title="Edit">
                                                                                <i class="fas fa-edit text-white"></i>
                                                                            </a>
                                                                            <button type="button" title=""
                                                                                class="btn btn-link btn-danger btn-lg delete"
                                                                                data-id="{{ $row->id }}"
                                                                                data-nama="{{ $row->nama }}"
                                                                                data-original-title="Remove">
                                                                                <i class="fas fa-trash text-white"></i>
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th width="3%">No</th>
                                                                <th width="20%">Nama penerbit</th>
                                                                <th width="20%">Slug</th>
                                                                <th width="10%">Aksi</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    <div class="row justify-content-left">
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

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Modal Tambah Penerbit -->
            <div class="modal fade" id="modalTambahPenerbit" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLongTitle"><b> Tambah Penerbit</b></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="/Penerbit/insertPenerbit" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="mb-2">
                                        <label for="nama" class="form-label">Penerbit</label>
                                        <input type="text" name="nama" class="form-control" autofocus>
                                    </div>
                                    <div class="mb-2">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-undo"></i>
                                    Close</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save
                                    changes</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!-- Modal Edit Penerbit -->
            @foreach ($data as $dd)
                <div class="modal fade" id="modalEditPenerbit{{ $dd->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLongTitle"><b> Edit Data Penerbit</b></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="/Penerbit/{{ $dd->id }}/updatePenerbit" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="mb-2">
                                            <label for="nama" class="form-label">Penerbit</label>
                                            <input type="text" name="nama" class="form-control"
                                                value="{{ $dd->nama }}">
                                        </div>
                                        <div class="mb-2">
                                            <label for="slug" class="form-label">Slug</label>
                                            <input type="text" name="slug" class="form-control"
                                                value="{{ $dd->slug }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                            class="fa fa-undo"></i> Close</button>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save
                                        changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach

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
            var Penerbitid = $(this).attr('data-id')
            var Penerbitnama = $(this).attr('data-nama')

            swal({
                    title: "Yakin ?",
                    text: "Menghapus Data Penerbit " + Penerbitnama + " !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/deletePenerbit/" + Penerbitid + " "
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

    @include('admin-lte.script')


    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

</body>


</html>
