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

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('sbadmin2/sidebar')
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
