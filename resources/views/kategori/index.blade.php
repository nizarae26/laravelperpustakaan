@extends('sbadmin2/app')

@section('active-kategori', 'active')


{{-- @section('title', 'Data Kategori') --}}

@section('content')
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <div class="card shadow">
        <div class="card-header mb-1">
            <h4 class="card-title mb-1 mt-2">
                Data Kategori
            </h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end mb-1">
                <div class="col-md-4">
                    <form action="/DataCategory" method="GET">
                        <div class="input-group">
                            <button class="btn btn-secondary mb-2" type="submit"><i class="fas fa-search"></i></button>
                            <input name="search" type="search" class="form-control mb-2 ml-1" placeholder="Search . . ."
                                value="{{ request('search') }}">
                        </div>

                    </form>
                </div>
                <a href="#modalTambahCategory" data-toggle="modal" class="btn btn-success btn-md mb-2"><span
                        class="fa fa-plus mr-2"></span>Tambah Data</a>
                <a href="/exportpdfkategori" class="btn btn-info btn-md ml-2 mb-2"><span
                        class="fa fa-solid fa-file-pdf mr-2"></span>Export
                    PDF</a>

            </div>
            @if ($data->count())

                <div class="row">
                    <div class="col-md-12 mb-0">
                        @if ($mess = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ $mess }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- @foreach ($kategori as $kategori) --}}
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-hover table-striped text-center">
                        <thead>
                            <tr>
                                <th width="3%">No</th>
                                <th width="20%">Nama Kategori</th>
                                <th width="20%">Slug</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $row)
                                <tr class="text-center">
                                    <td>{{ $index + $data->firstitem() }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->slug }}</td>
                                    <td style="text-align: center ;">
                                        <div class="form-button-action">
                                            <a type="button" data-toggle="modal" title=""
                                                href="#modalEditCategory{{ $row->id }}"
                                                class="btn btn-link btn-primary btn-lg " data-original-title="Edit">
                                                <i class="fas fa-edit text-white"></i>
                                            </a>
                                            <button type="button" title=""
                                                class="btn btn-link btn-danger btn-lg delete" data-id="{{ $row->id }}"
                                                data-nama="{{ $row->nama }}" data-original-title="Remove">
                                                <i class="fas fa-trash text-white"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row justify-content-center">
                        <div>{{ $data->links() }}</div>
                    </div>
                    {{-- {{ $category->links() }} --}}
                </div>
        </div>
    </div>

    <!-- Modal Tambah Category -->
    <div class="modal fade" id="modalTambahCategory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle"><b> Tambah Category</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/Category/insertCategory" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="mb-2">
                                <label for="nama" class="form-label">Category</label>
                                <input type="text" name="nama" class="form-control" autofocus>
                            </div>
                            <div class="mb-2">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control" autofocus>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>
                            Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal Edit Category -->
    @foreach ($data as $dd)
        <div class="modal fade" id="modalEditCategory{{ $dd->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle"><b> Edit Data Category</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="/Category/{{ $dd->id }}/updateCategory" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="mb-2">
                                    <label for="nama" class="form-label">Category</label>
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

    @endif

    <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="/sbadmin2/sweetalert.min.js"></script>

    <script>
        $('.delete').click(function() {
            var categoryid = $(this).attr('data-id')
            var categorynama = $(this).attr('data-nama')

            swal({
                    title: "Yakin ?",
                    text: "Menghapus Data Category " + categorynama + " !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/deleteCategory/" + categoryid + " "
                        swal("Data Berhasil di Hapus!", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi terhapus");
                    }
                });
        });
    </script>

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

    @include('sweetalert::alert')

    @stack('js')
@endsection
