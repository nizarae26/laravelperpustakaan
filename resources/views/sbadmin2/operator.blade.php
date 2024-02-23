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

    <!-- Custom fonts for this template-->
    <link href="/sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/fontawesome/css/brands.css" rel="stylesheet">
    <link href="/fontawesome/css/solid.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="/sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Nama Kategori', 'Jumlah Peminjaman'],
                @foreach ($chartData as $data)
                    ['{{ $data[0] }}', {{ $data[1] }}],
                @endforeach
            ]);

            var options = {
                title: 'Buku Yang Sedang Dipinjam Berdasarkan Kategori',
                pieHole: 0.3,
                is3D: true,
            };


            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-2" style="font-size: 90%">Perpustakaan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item @yield('active-dashboard')">
                <a class="nav-link" href="/dashboard/operator">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider ">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Set
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li
                class="nav-item @yield('active-kategori') @yield('active-penerbit') @yield('active-rak') @yield('active-buku') @yield('active-user')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-target="#collapseTwo"
                    aria-expanded="false" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item @yield('active-kategori')" href="/DataCategory">Data Category</a>
                        <a class="collapse-item @yield('active-penerbit')" href="/DataPenerbit">Data Penerbit</a>
                        <a class="collapse-item @yield('active-rak')" href="/DataRak">Data Rak</a>
                        <a class="collapse-item @yield('active-buku')" href="/DataBuku">Data Buku</a>
                        <a class="collapse-item @yield('active-user')" href="/DataUser">Data User</a>
                    </div>
                </div>
            </li>

            <li class="nav-item @yield('active-peminjaman') @yield('active-pengembalian') ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-folder-open "></i>
                    <span>Perpus Master</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item @yield('active-peminjaman')" href="/DataPeminjaman">Data Peminjaman</a>
                        <a class="collapse-item @yield('active-pengembalian')" href="/DataPengembalian">Data Pengembalian</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider ">
            <!-- Heading -->
            <div class="sidebar-heading">
                Report Set
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/laporan">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Laporan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/DataUlasan">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Ulasan</span></a>
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
                    <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

                    @yield('content')


                </div>
            </div>
            <!-- /.container-fluid -->
            <!-- Bootstrap core JavaScript-->

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


            <!-- End of Content Wrapper -->


            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>


            <!-- Logout Modal-->


            <!-- Bootstrap core JavaScript-->
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
