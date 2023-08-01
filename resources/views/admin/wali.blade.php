<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Wali</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Wali</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Data Wali</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <button class="btn btn-primary btn-tambah"><i class="nav-icon fas fa-plus"></i> Tambah Data</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Guru</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach($walis as $wali)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $wali->name }}</td>
                    <td>{{ $wali->catatan }}</td>
                    <td>
                      <button class="btn btn-warning btn-edit" data-id="{{ json_encode($wali) }}"><i class="fas fa-pen"></i></button>
                      <button class="btn btn-danger btn-hapus" data-id="{{ $wali->id }}"><i class="fas fa-trash"></i></button>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
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
    </section>
    <!-- /.content -->
    <div class="modal fade" id="waliForm">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Wali</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="simpanWali" method="post" id="simpanForm">
                @csrf
                <input type="hidden" name="id" id="id">
                  <div class="form-group">
                    <label>Nama Guru</label>
                    <select class="form-control" name="guru" id="guru" required>
                      @foreach($gurus as $guru)
                      <option value="{{ $guru->id }}">{{ $guru->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Catatan</label>
                    <textarea name="catatan" id="catatan" cols="30" rows="5" class="form-control" required></textarea>
                  </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="simpanForm">Simpan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <div class="modal fade" id="deleteForm">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5>Yakin menghapus data tersebut?</h5>
              <form action="hapusWali" method="get" id="hapusForm">
                <input type="hidden" name="id" id="hapus">
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="hapusForm">Yakin</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    <script>
      $(document).ready(function() {
        // Button click event handler
        $('.btn-tambah').on('click', function() {
            $('#waliForm').modal('show');
        });

        // Button click event handler
        $('.btn-edit').on('click', function() {
            var data = $(this).data('id');

            // Set nilai pada form modal
            $('#guru').val(data.id);
            $('#catatan').val(data.catatan);
            $('#id').val(data.id);

            $('#waliForm').modal('show');
        });

        // Button click event handler
        $('.btn-hapus').on('click', function() {
            $('#deleteForm').modal('show');
            var data = $(this).data('id');
            $('#hapus').val(data);
        });
      });
    </script>
    @endsection
    <!-- Referensi jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
