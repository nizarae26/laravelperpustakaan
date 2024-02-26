@section('active-ulasan', 'active')
@section('title', 'Ulasan | Perpus')
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
                    <h1 class="h3 mb-4 text-gray-800">Ulasan</h1>

                    <!-- isi -->
                    <div class="content">
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header" style="background-color: white">
                                                <form method="GET" action="/filterul">
                                                    <div class="row pb-3">
                                                        <div class="row g-5 align-items-center ml-3">
                                                            <div class="col-2 pt-2">
                                                                <label>Start Date :</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="date" name="start_date"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="col-2 pt-2">
                                                                <label> End Date :</label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="date" name="end_date"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="col-1">
                                                                <button type="submit"
                                                                    class="btn btn-secondary">Filter</button>
                                                            </div>
                                                            <div class="col-1 ml-2">
                                                                <a type="submit" href="/DataUlasan"
                                                                    class="btn btn-primary">
                                                                    Refresh</a>
                                                            </div>

                                                        </div>

                                                </form>
                                                <div class="d-flex align-items-center">

                                                </div>

                                                <!-- /.card-header -->
                                                <div class="card-body" style="background-color: white">
                                                    <table id="example1"
                                                        class="table table-bordered table-hover table-striped text-center">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Peminjam</th>
                                                                <th>Buku</th>
                                                                <th>Ulasan</th>
                                                                <th>Rating</th>
                                                                <th>Tanggal Ulas</th>
                                                                {{-- <th>Aksi</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $no = 1;
                                                            @endphp
                                                            @foreach ($data as $row)
                                                                <tr>
                                                                    <td>{{ $no++ }}</td>
                                                                    <td>{{ $row->user->name }}
                                                                    <td>{{ $row->buku->judul }}
                                                                    <td>{{ $row->ulasan }}
                                                                    <td>
                                                                        @if ($row->rating == 0)
                                                                        @elseif($row->rating == 1)
                                                                            <span>⭐</span>
                                                                        @elseif($row->rating == 2)
                                                                            <span>⭐⭐</span>
                                                                        @elseif($row->rating == 3)
                                                                            <span>⭐⭐⭐</span>
                                                                        @elseif($row->rating == 4)
                                                                            <span>⭐⭐⭐⭐</span>
                                                                        @else
                                                                            <span>⭐⭐⭐⭐⭐</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $row->created_at }}
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Peminjam</th>
                                                                <th>Buku</th>
                                                                <th>Ulasan</th>
                                                                <th>Rating</th>
                                                                <th>Tanggal Ulas</th>
                                                                {{-- <th>Aksi</th> --}}
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
