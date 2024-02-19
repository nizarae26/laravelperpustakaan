<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title> Perpus | Peminjaman </title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="/electro-master/css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="/electro-master/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="/electro-master/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="/electro-master/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="/electro-master/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="/electro-master/css/style.css" />


</head>

<body>
    <!-- HEADER -->
    <header>

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            {{-- <a href="/borrower" class="logo">
                                <img src=" /borrower.png" style="margin-top: 8px" alt="" width="220px" height="60px"> 
                            </a> --}}
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search" style="width: 500px;">
                            <form>
                                <select class="input-select">
                                    <option value="0">All Categories</option>
                                    <option value="1">Category 01</option>
                                    <option value="1">Category 02</option>
                                </select>
                                <input class="input" placeholder="Search here">
                                <button class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn" style="width: 420px !important ">
                            <!-- Wishlist -->
                            <div>
                                <a href="/favorite">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Favorite</span>
                                    @if ($favorit)
                                        <div class="qty">{{ $favorit->count() }}</div>
                                    @endif
                                </a>
                            </div>
                            <div>
                                <a href="/detailPinjam">
                                    <i class="fa fa-history"></i>
                                    <span>History</span>
                                    @if ($peminjaman)
                                        <div class="qty">{{ $peminjaman->count() }}</div>
                                    @endif
                                </a>
                            </div>
                            <div>
                                @guest
                                @else
                                    <a href="">
                                        <i class="fa fa-user"></i>
                                        <p>{{ auth()->user()->name }}</p>
                                    </a>
                                </div>
                                <div>
                                    <a>
                                        <i class="fa fa-sign-out"></i>
                                        <form action="/logout" method="POST">
                                            @method('post')
                                            @csrf
                                            <button type="submit"
                                                style="border: none;background-color: rgba(255, 255, 255, 0)">Logout</button>
                                        </form>
                                    </a>
                                </div>
                            @endguest
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    @foreach ($kategori as $data)
                        <li><a type="button" href="/pilihBuku/{{ $item->id }}">{{ $item->nama }}</a></li>
                    @endforeach
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            {{-- @yield('container') --}}
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 col-xs-12 text-center">
                        <div class="footer">
                            <h3 class="footer-title">SIPUSTAKA</h3>
                            <p>Sistem Informasi Perpustakaan adalah sebuah sistem yang dirancang dan digunakan untuk
                                mengelola semua aktivitas yang terkait dengan pengelolaan dan pengoperasian sebuah
                                perpustakaan. Tujuan utama dari sistem informasi perpustakaan adalah untuk menyediakan
                                akses yang efisien dan efektif terhadap sumber daya informasi yang tersedia di
                                perpustakaan tersebut. Sistem ini mencakup berbagai fungsi, termasuk pengelolaan
                                katalog, borroweran dan pengembalian buku, manajemen anggota, pelacakan inventaris,
                                serta layanan referensi dan penelusuran.</p>
                        </div>
                    </div>
                    <div class="clearfix visible-xs"></div>


                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        {{-- <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i
                                class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div> --}}
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="/electro-master/js/jquery.min.js"></script>
    <script src="/electro-master/js/bootstrap.min.js"></script>
    <script src="/electro-master/js/slick.min.js"></script>
    <script src="/electro-master/js/nouislider.min.js"></script>
    <script src="/electro-master/js/jquery.zoom.min.js"></script>
    <script src="/electro-master/js/main.js"></script>

</body>

</html>
