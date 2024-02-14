{{-- <!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <title>Data Buku</title>
    @include('admin-lte.head')
</head> --}}
@include('sbadmin2.buku')
@section('active-buku', 'active')

{{-- <body class="hold-transition sidebar-mini">
    <div class="wrapper"> --}}
{{-- @section('content') --}}


<!-- Navbar -->
<!-- /.navbar -->

<!-- Main Sidebar Container -->
{{-- @include('admin-lte.sidebar') --}}

<!-- Content Wrapper. Contains page content -->
{{-- <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="card-title">Data Buku</h1>
                        </div><!-- /.col -->
                        {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Buku</li>
                        </ol>
                    </div><!-- /.col --> --}}
{{-- </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div> --}}
<!-- /.content-header -->

<!-- Main content -->
{{-- <div class="content">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <h4 class="card-title"></h4>
                                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                                data-target="#modalTambahBuku">
                                                <i class="fa fa-plus"></i>
                                                Tambah Data
                                            </button>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul</th>
                                                        <th>Penulis</th>
                                                        <th>Penerbit</th>
                                                        <th>Tahun Terbit</th>
                                                        <th>Gambar</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($data as $row)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $row->judul }}</td>
                                                            <td>{{ $row->penulis }}</td>
                                                            <td>{{ $row->penerbit->nama }}</td>
                                                            <td>{{ $row->kategori->nama }}</td>
                                                            <td><img src="storage/buku/{{ $row->sampul }} "alt=" "
                                                                    width="60px" class=""></td>
                                                            <td>
                                                                <a type="button" data-toggle="modal" title=""
                                                                    href="#modalEditBuku{{ $row->id }}"
                                                                    class="btn btn-link btn-primary btn-lg "
                                                                    data-original-title="Edit">
                                                                    <i class="fas fa-edit text-white"></i>
                                                                </a>
                                                                <a type="button" data-toggle="modal" title=""
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
                                                        <th>Judul</th>
                                                        <th>Penulis</th>
                                                        <th>Penerbit</th>
                                                        <th>Tahun Terbit</th>
                                                        <th>Gambar</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
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
                                            <input type="text" name="judul" class="form-control" autofocus>
                                        </div>
                                        <div class="mb-2">
                                            <label for="slug" class="form-label">Slug</label>
                                            <input type="text" name="slug" class="form-control" autofocus>
                                        </div>
                                        <div class="mb-2">
                                            <label for="sampul" class="form-label">Sampul</label>
                                            <input type="file" name="sampul" class="form-control" autofocus>
                                        </div>
                                        <div class="mb-2">
                                            <label for="penulis" class="form-label">Penulis</label>
                                            <input type="text" name="penulis" class="form-control" autofocus>
                                        </div>
                                        {{-- <input type="hidden" name="slug"> --}}
{{-- <div class="mb-2">
                                            <label for="penerbit">Penerbit</label>
                                            <select value="penerbit_id" class="form-control" name="penerbit_id">
                                                <option selected value="penerbit_id">Pilih Penerbit</option>
                                                @foreach ($penerbit as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('penerbit_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <label for="kategori">Kategori</label>
                                            <select value="kategori_id" class="form-control" name="kategori_id">
                                                <option selected value="kategori_id">Pilih Kategori</option>
                                                @foreach ($kategori as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
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
                                                    <option value="{{ $item->id }}">Rak : {{ $item->rak }};
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
                                            <input type="number" name="stok" class="form-control" autofocus>
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
                                </div> --}}
{{-- <div class="modal-body">
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
{{-- 
                <!-- Modal Edit Buku -->
                @foreach ($data as $dd)
                    <div class="modal fade" id="modalEditBuku{{ $dd->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLongTitle"><b> Edit Data Buku</b></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="/Buku/{{ $dd->id }}/updateBuku" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf --}}
{{-- <div class="modal-body">
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
                                                        width="60px" height="80px"></td>
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
                                                <select class="form-control" name="penerbit_id" id="penerbit_id">
                                                    <option selected value="{{ $dd->id }}">
                                                        {{ $dd->penerbit->nama }}</option>
                                                    {{-- @if ($item->id != 1) --}}
{{-- @foreach ($penerbit as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}
            </option>
            {{-- @endif --}}
{{-- @endforeach
        </select>
        @error('penerbit_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-2">
        <label for="kategori">Kategori</label>
        <select class="form-control" name="kategori_id" id="kategori_id">
            <option selected value="{{ $dd->id }}">
                {{ $dd->kategori->nama }}</option>
            @foreach ($kategori as $item)
                {{-- @if ($item->id != 1) --}}
{{-- <option value="{{ $item->id }}">{{ $item->nama }}
                </option> --}}
{{-- @endif --}}
{{-- @endforeach --}}
{{-- </select>
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
    </div> --}}
{{-- <div class="mb-2">
        <label for="stok" class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control" value="{{ $dd->stok }}">
        @error('stok')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div> --}}
{{-- </div>  --}}
{{-- </div>  --}}
{{-- 
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                class="fa fa-undo"></i> Close</button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                            Save
                                            changes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach --}}
{{-- </div>
        </div>  --}}


<!-- Control Sidebar -->
{{-- <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside> --}}
<!-- /.control-sidebar -->

<!-- Main Footer -->
{{-- @include('admin-lte.footer') --}}

{{-- </div> --}}

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
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


{{-- <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
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
    </script> --}}
{{-- @endsection --}}

</body>
