@extends('sbadmin2/app')

@section('active-penerbit', 'active')

{{-- @section ('title', 'Data Kategori') --}}

@section('content')
<div class="card shadow">
    <div class="card-header mb-1">
        <h4 class="card-title mb-1 mt-2">
            Data Penerbit
        </h4>
    </div>
    <div class="card-body">
    <div class="d-flex justify-content-end mb-4">
        <div class="col-md-4">
            <form action="/DataPenerbit" method="GET">
                <div class="input-group">
                    <button class="btn btn-secondary mb-2" type="submit"><i class="fas fa-search"></i></button>
                    <input name="search" type="search" class="form-control mb-2 ml-1" placeholder="Search . . ." value="{{ request('search') }}">
                </div>
                
            </form>
        </div>
        <a href="#modalTambahPenerbit" data-toggle="modal" class="btn btn-success btn-md mb-2"><span class="fa fa-plus mr-2"></span>Tambah Data</a>
        <a href="/exportpdfpenerbit"  class="btn btn-info btn-md ml-2 mb-2"><span class="fa fa-solid fa-file mr-2"></span>Export PDF</a>
        
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
        <table class="table table-bordered table-hover table-striped text-center">
            <thead>
                <tr>
                    <th width="3%">No</th>
                    <th width="20%">Nama Penerbit</th>
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
                            <a type="button" data-toggle="modal" title="" href="#modalEditPenerbit{{ $row->id }}" class="btn btn-link btn-primary btn-lg " data-original-title="Edit">
                                <i class="fas fa-edit text-white"></i>
                            </a>
                        <button type="button" title="" class="btn btn-link btn-danger btn-lg delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}" data-original-title="Remove">
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
            {{-- {{ $Penerbit->links() }} --}}
        </div>
    </div>
</div>

<!-- Modal Tambah Penerbit -->
<div class="modal fade" id="modalTambahPenerbit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" name="nama" class="form-control" autofocus>
                        </div>
                        <div class="mb-2">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" class="form-control" autofocus>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Edit Penerbit -->
@foreach ($data as $dd)
<div class="modal fade" id="modalEditPenerbit{{ $dd->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle"><b> Edit Data Penerbit</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/Penerbit/{{ $dd->id }}/updatePenerbit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="mb-2">
                            <label for="nama" class="form-label">Penerbit</label>
                            <input type="text" name="nama" class="form-control" value="{{ $dd->nama }}">
                        </div>
                        <div class="mb-2">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ $dd->slug }}">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endforeach

@endif

<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
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
{{-- <div class="modal fade" id="modal-form" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="row">
            <div class="col-md-12">
                <form class="form-kategori" >
                    @csrf
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control nama" name="nama" 
                            placeholder="Nama kategori" required>
                    </div>
                    <input type="hidden" value="" >
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> --}}


{{-- <div class="modal fade" id="modal-edit{{ $ct->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="/kategori/{{ $ct->id }}/update" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" class="form-control" name="nama" value="{{$ct->nama}}" placeholder="Nama kategori" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}


@endsection
{{-- @push('js')
{{-- <script>
    //     window.Laravel = {
    //     csrfToken: '{{csrf_token()}}'
    // }

    $(function() {

        $.ajax({
            url: 'api/categories',
            success: function({
                data
            }) {

                let row;
                data.map(function(val, index) {
                    row += `
                        <tr>
                            <td>${index+1}</td>
                            <td>${val.nama}</td>
                            <td>
                                <a data-toggle="modal" data-target="#modal-edit${val.id}" class="btn btn-info">Edit</a>
                                <a href="#" data-id="${val.id}" class="btn btn-danger btn-hapus">Hapus</a>
                            </td>
                        </tr>
                        `;
                });

                $('tbody').append(row)
            }
        });

        $(document).on('click', '.btn-hapus', function() {
            const id = $(this).data('id')
            const token = localStorage.getItem('token')

            confirm_dialog = confirm('Apakah anda yakin?');

            if (confirm_dialog) {
                $.ajax({

                    url: 'api/categories/' + id,
                    type: "delete",
                    
                    headers: {
                        "Authorization": token
                    },
                    success: function(data) {
                        if (data.message == 'success') {
                            alert('Data Berhasil Dihapus')
                        }
                        location.reload()
                    }
                });
            }
        });

        // $(document).on('click', '.btn-primary', function(){
        $('.modal-tambah').click(function() {
            $('#modal-form').modal('show')

            $('.form-kategori').submit(function(e) {
                e.preventDefault();

                const token = localStorage.getItem('token')

                const frmdata = new FormData(this);


                $.ajax({
                    url: 'api/categories',
                    type: 'POST',
                    data: frmdata,
                    cache: false,
                    contentType: false,
                    processData: false,

                    headers: {
                        "Authorization": 'Bearer ' + token
                    },
                    success: function(data) {
                        if (data.success) {
                            alert('Data Berhasil Ditambah')
                            location.reload()
                        }
                    }
                });

            });





        });
    });
</script> --}}
{{-- @endpush --}} 