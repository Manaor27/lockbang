<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Pelajaran</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Mata Pelajaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Data Mata Pelajaran</li>
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
                      <th>Nama Mata Pelajaran</th>
                      <th>Nama Guru</th>
                      <th>Jurusan</th>
                      <th>Kelompok</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                    @foreach($mapels as $mapel)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $mapel->nama_mapel }}</td>
                      <td>{{ $mapel->guru->name }}</td>
                      <td>{{ $mapel->jurusan->jurusan }}</td>
                      <td>
                        <?php
                          if($mapel->kelompok == 'A') {
                            echo 'A Mata Pelajaran Umum';
                          } elseif ($mapel->kelompok == 'B') {
                            echo 'B Mata Pelajaran Kejurusan';
                          } else {
                            echo 'C Mata Pelajaran Pilihan';
                          }

                        ?>
                      </td>
                      <td>
                        <button class="btn btn-warning btn-edit" data-id="{{ json_encode($mapel); }}"><i class="fas fa-pen"></i></button>
                        <button class="btn btn-danger btn-hapus" data-id="{{ $mapel->id }}"><i class="fas fa-trash"></i></button>
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
    <div class="modal fade" id="mapelForm">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Mata Pelajaran</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="simpanMapel" method="post" id="simpanForm">
                @csrf
                <input type="hidden" name="id" id="id">
                  <div class="form-group">
                    <label>Nama Mata Pelajaran</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                  </div>
                  <div class="form-group">
                    <label>Jurusan</label>
                    <select class="form-control" name="jurusan" id="jurusan" required>
                      @foreach($jurusans as $jurusan)
                      <option value="{{ $jurusan->id }}">{{ $jurusan->jurusan }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kelompok</label>
                    <select class="form-control" name="kelompok" id="kelompok" required>
                      <option value="A">A Mata Pelajaran Umum</option>
                      <option value="B">B Mata Pelajaran Kejurusan</option>
                      <option value="C">C Mata Pelajaran Pilihan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Guru</label>
                    <select class="form-control" name="guru" id="guru" required>
                      @foreach($gurus as $guru)
                      <option value="{{ $guru->id }}">{{ $guru->name }}</option>
                      @endforeach
                    </select>
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
              <form action="hapusMapel" method="get" id="hapusForm">
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
            $('#mapelForm').modal('show');
        });

        // Button click event handler
        $('.btn-edit').on('click', function() {
            var data = $(this).data('id');

            // Set nilai pada form modal
            $('#nama').val(data.nama_mapel);
            $('#guru').val(data.guru_id);
            $('#jurusan').val(data.jurusan_id);
            $('#kelompok').val(data.kelompok);
            $('#id').val(data.id);

            $('#mapelForm').modal('show');
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
