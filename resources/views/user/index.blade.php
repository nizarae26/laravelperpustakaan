@extends('sbadmin2/app')

@section('active-user', 'active')

{{-- @section('title', 'Data Kategori') --}}

@section('content')
    <div class="card shadow">
        <div class="card-header mb-1">
            <h4 class="card-title mb-1 mt-2">
                Data User
            </h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end mb-1">
                <div class="col-md-4">
                    <form action="/DataUser" method="GET">
                        <div class="input-group">
                            {{-- <button class="btn btn-secondary mb-2" type="submit"><i class="fas fa-search"></i></button>
                            <input name="search" type="search" class="form-control mb-2 ml-1" placeholder="Search . . ."
                                value="{{ request('search') }}"> --}}
                        </div>

                    </form>
                </div>
                <a href="#modalTambahUser" data-toggle="modal" class="btn btn-success btn-md mb-2"><span
                        class="fa fa-plus mr-2"></span>Tambah Data</a>

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
                <table id="example1" class="table table-bordered table-hover table-striped text-center">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Name</th>
                            <th>Email</th>
                            {{-- <th width="2%" >Password</th> --}}
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $row)
                            <tr class="text-center">
                                <td>{{ $index + $data->firstitem() }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                {{-- <td style="font-size:10px">{{ $row -> password }}</td> --}}
                                <td>{{ $row->role->name }}</td>
                                <td style="text-align: center ;">
                                    <div class="form-button-action">
                                        <a type="button" data-toggle="modal" title=""
                                            href="#modalEditUser{{ $row->id }}"
                                            class="btn btn-link btn-primary btn-lg " data-original-title="Edit">
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
                {{-- {{ $User->links() }} --}}
                {{-- </div> --}}
        </div>
    </div>

    <!-- Modal Tambah User -->
    <div class="modal fade" id="modalTambahUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle"><b> Tambah User</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/User/insertUser" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="mb-2">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" autofocus>
                            </div>
                            <div class="mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" autofocus>
                            </div>
                            <div class="mb-2">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" autofocus>
                            </div>
                            {{-- <input type="hidden" name="slug"> --}}
                            <div class="mb-2">
                                <label for="role_id">Role</label>
                                <select value="role_id" class="form-control" name="role_id">
                                    <option selected value="role_id">Pilih Role</option>
                                    {{-- @foreach ($role as $item) --}}
                                    <option value="2">Operator</option>
                                    <option value="3">Peminjam</option>
                                    {{-- @endforeach --}}
                                </select>
                                @error('role_id')
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

    <!-- Modal Edit User -->
    @foreach ($data as $dd)
        <div class="modal fade" id="modalEditUser{{ $dd->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle"><b> Edit Data User</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="/User/{{ $dd->id }}/updateUser" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="mb-2">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ $dd->name }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="email" class="form-label">email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ $dd->email }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                {{-- <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" value="{{ $dd->password }}">
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div> --}}
                                <div class="mb-2">
                                    <label for="role">Role</label>
                                    <select value="role_id" class="form-control" name="role_id" id="role_id">
                                        <option <?php if ($dd['role_id'] == 1) {
                                            echo 'selected';
                                        } ?> value="1">Admin</option>
                                        <option <?php if ($dd['role_id'] == 2) {
                                            echo 'selected';
                                        } ?> value="2">Operator</option>
                                        <option <?php if ($dd['role_id'] == 3) {
                                            echo 'selected';
                                        } ?> value="3">Peminjam</option>
                                        {{-- @foreach ($role as $item) --}}
                                        {{-- <option value="2">Operator</option>
                                    <option value="3">Peminjam</option> --}}
                                        {{-- @endforeach --}}
                                    </select>
                                    @error('role_id')
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

    @endif

    <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="/sbadmin2/sweetalert.min.js"></script>

    <script>
        $('.delete').click(function() {
            var Userid = $(this).attr('data-id')
            var Usernama = $(this).attr('data-nama')

            swal({
                    title: "Yakin ?",
                    text: "Menghapus Data User " + Usernama + " !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/deleteUser/" + Userid + " "
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
@endsection
