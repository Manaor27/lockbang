<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Predikat</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Predikat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Data Predikat</li>
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
                    <th rowspan="2">No</th>
                    <th rowspan="2">Nama Mapel</th>
                    <th rowspan="2">Guru Mata Pelajaran</th>
                    <th rowspan="2">KKM</th>
                    <th colspan="4" style="text-align: center;">Predikat</th>
                    <th rowspan="2">Aksi</th>
                  </tr>
                  <tr>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                  </tr>
                  </thead>
                  <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($predikats as $predikat)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $predikat->mapel->nama_mapel }}</td>
                    <td>{{ $predikat->mapel->guru->name }}</td>
                    <td>{{ $predikat->kkm }}</td>
                    <td>{{ $predikat->deskripsi_a }}</td>
                    <td>{{ $predikat->deskripsi_b }}</td>
                    <td>{{ $predikat->deskripsi_c }}</td>
                    <td>{{ $predikat->deskripsi_d }}</td>
                    <td>
                      <button class="btn btn-warning btn-edit" data-id="{{ json_encode($predikat) }}"><i class="fas fa-pen"></i></button>
                      <button class="btn btn-danger btn-hapus" data-id="{{ $predikat->id }}"><i class="fas fa-trash"></i></button>
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
    <div class="modal fade" id="predikatForm">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Predikat</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="simpanPredikat" method="post" id="simpanForm">
                @csrf
                <input type="hidden" name="id" id="id">
                  <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <select class="form-control" name="mapel" id="mapel" required>
                    @foreach($mapels as $mapel)
                      <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>KKM</label>
                    <input type="number" name="kkm" id="kkm" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Predikat</label>
                    <div class="form-group row">
                      <label class="col-sm-1 col-form-label">A</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="a" name="a" required>
                      </div>
                      <label class="col-sm-1 col-form-label">C</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="c" name="c" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-1 col-form-label">B</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="b" name="b" required>
                      </div>
                      <label class="col-sm-1 col-form-label">D</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="d" name="d" required>
                      </div>
                    </div>
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
              <form action="hapusPredikat" method="get" id="hapusForm">
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
            $('#predikatForm').modal('show');
        });

        // Button click event handler
        $('.btn-edit').on('click', function() {
            var data = $(this).data('id');

            // Set nilai pada form modal
            $('#kkm').val(data.kkm);
            $('#mapel').val(data.mapel_id);
            $('#a').val(data.deskripsi_a);
            $('#b').val(data.deskripsi_b);
            $('#c').val(data.deskripsi_c);
            $('#d').val(data.deskripsi_d);
            $('#id').val(data.id);

            $('#predikatForm').modal('show');
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
