@extends('sbadmin2/app')

@section('active-rak', 'active')

{{-- @section('title', 'Data Kategori') --}}

@section('content')
    <div class="card shadow">
        <div class="card-header mb-1">
            <h4 class="card-title mb-1 mt-2">
                Data Rak
            </h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end mb-4">
                <div class="col-md-4">
                    <form action="/DataRak" method="GET">
                        <div class="input-group">
                            <button class="btn btn-secondary mb-2" type="submit"><i class="fas fa-search"></i></button>
                            <input name="search" type="search" class="form-control mb-2 ml-1" placeholder="Search . . ."
                                value="{{ request('search') }}">
                        </div>

                    </form>
                </div>
                <a href="#modalTambahRak" data-toggle="modal" class="btn btn-success btn-md mb-2"><span
                        class="fa fa-plus mr-2"></span>Tambah Data</a>
                <a href="/exportpdfrak" class="btn btn-info btn-md ml-2 mb-2"><span
                        class="fa fa-solid fa-file mr-2"></span>Export PDF</a>

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
                {{-- <div class="table-responsive"> --}}
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th width="10%">Rak</th>
                            <th width="10%">Baris</th>
                            <th width="10%">slug</th>
                            <th width="10%">Kategori</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $row)
                            <tr class="text-center">
                                <td>{{ $index + $data->firstitem() }}</td>
                                <td>{{ $row->rak }}</td>
                                <td>{{ $row->baris }}</td>
                                <td>{{ $row->slug }}</td>
                                <td>{{ $row->Kategori->nama }}</td>
                                <td style="text-align: center ;">
                                    <div class="form-button-action">
                                        <a type="button" data-toggle="modal" title=""
                                            href="#modalEditRak{{ $row->id }}" class="btn btn-link btn-primary btn-lg "
                                            data-original-title="Edit">
                                            <i class="fas fa-edit text-white"></i>
                                        </a>
                                        <button type="button" title="" class="btn btn-link btn-danger btn-lg delete"
                                            data-id="{{ $row->id }}" data-nama="{{ $row->nama }}"
                                            data-original-title="Remove">
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
                {{-- {{ $Rak->links() }} --}}
                {{-- </div> --}}
        </div>
    </div>

    <!-- Modal Tambah Rak -->
    <div class="modal fade" id="modalTambahRak" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle"><b> Tambah Rak</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/Rak/insertRak" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="mb-2">
                                <label for="rak" class="form-label">Rak</label>
                                <input type="number" name="rak" class="form-control" autofocus>
                            </div>
                            <div class="mb-2">
                                <label for="baris" class="form-label">Baris</label>
                                <input type="number" name="baris" class="form-control" autofocus>
                            </div>
                            {{-- <input type="hidden" name="slug"> --}}
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

    <!-- Modal Edit Rak -->
    @foreach ($data as $dd)
        <div class="modal fade" id="modalEditRak{{ $dd->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle"><b> Edit Data Rak</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="/Rak/{{ $dd->id }}/updateRak" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="mb-2">
                                    <label for="rak" class="form-label">Rak</label>
                                    <input type="text" name="rak" class="form-control"
                                        value="{{ $dd->rak }}">
                                    @error('rak')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="baris" class="form-label">Baris</label>
                                    <input type="text" name="baris" class="form-control"
                                        value="{{ $dd->baris }}">
                                    @error('rak')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" name="slug" class="form-control"
                                        value="{{ $dd->slug }}">
                                    @error('rak')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="kategori">Kategori</label>
                                    <select value="kategori_id" class="form-control" name="kategori_id">
                                        <option selected value="{{ $item->id }}">Pilih Kategori</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
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

    <!-- Bootstrap core JavaScript-->
    <script src="/sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/sbadmin2/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/sbadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/sbadmin2/js/demo/datatables-demo.js"></script>
    @endif
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

    <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="/sbadmin2/sweetalert.min.js"></script>

    @include('admin-lte.script')
    <script>
        $('.delete').click(function() {
            var Rakid = $(this).attr('data-id')
            var Raknama = $(this).attr('data-nama')

            swal({
                    title: "Yakin ?",
                    text: "Menghapus Data Rak " + Raknama + " !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/deleteRak/" + Rakid + " "
                        swal("Data Berhasil di Hapus!", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi terhapus");
                    }
                });
        });
    </script>
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


@endsection
