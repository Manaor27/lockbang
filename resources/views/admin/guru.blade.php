<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Guru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Data Guru</li>
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
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Telp</th>
                        <th>Tempat Lahir</th>
                        <th>Agama</th>
                        <th>Tanggal Lahir</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach($gurus as $guru)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $guru->name }}</td>
                        <td>{{ $guru->jk }}</td>
                        <td>{{ $guru->telp }}</td>
                        <td>{{ $guru->tmp_lahir }}</td>
                        <td>{{ $guru->agama }}</td>
                        <td>{{ $guru->tgl_lahir }}</td>
                        <td><img src="foto/{{ $guru->foto }}" alt="foto" style="height: 75px;"></td>
                        <td>
                        <button class="btn btn-warning btn-edit" data-id="{{ json_encode($guru) }}"><i class="fas fa-pen"></i></button>
                        <button class="btn btn-danger btn-hapus" data-id="{{ $guru->id }}"><i class="fas fa-trash"></i></button>
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
    <div class="modal fade" id="guruForm">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Guru</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="simpanGuru" method="post" id="simpanForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label>NIP</label>
                    <input type="number" class="form-control" id="nip" name="nip" required>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jk" id="jk" required>
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Telpon</label>
                    <input type="text" class="form-control" id="telp" name="telp" required>
                  </div>
                  <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                  </div>
                  <div class="form-group">
                    <label>Agama</label>
                    <select class="form-control" name="agama" id="agama" required>
                      <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Katolik">Katolik</option>
                      <option value="Budha">Budha</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Konghucu">Konghucu</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" onchange="PreviewImage();" id="uploadImage" name="foto">
                        <label class="custom-file-label">Pilih file</label>
                      </div>
                    </div>
                    <img id="uploadPreview" style="width: 150px; height: 150px; display: none;"/><br>
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
              <form action="hapusGuru" method="get" id="hapusForm">
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
            $('#uploadImage').prop('required', true);
            $('#nama').val(null);
            $('#id').val(null);
            $('#tempat_lahir').val(null);
            $('#tgl_lahir').val(null);
            $('#jk').val(null);
            $('#agama').val(null);
            $('#telp').val(null);
            $('#nip').val(null);
            $('#guruForm').modal('show');
        });

        // Button click event handler
        $('.btn-edit').on('click', function() {
            var data = $(this).data('id');

            // Set nilai pada form modal
            $('#nama').val(data.name);
            $('#id').val(data.id);
            $('#tempat_lahir').val(data.tmp_lahir);
            $('#tgl_lahir').val(data.tgl_lahir);
            $('#jk').val(data.jk);
            $('#agama').val(data.agama);
            $('#telp').val(data.telp);
            $('#nip').val(data.nip);

            $('#uploadPreview').css('display', 'block');
            $('#uploadPreview').attr('src', 'foto/'+data.foto);

            $('#guruForm').modal('show');
        });

        // Button click event handler
        $('.btn-hapus').on('click', function() {
            $('#deleteForm').modal('show');
            var data = $(this).data('id');
            console.log(data);
            $('#hapus').val(data);
        });
      });
    </script>
    <script type="text/javascript">
      function PreviewImage() {
        var imageReader = new FileReader();
        imageReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
        imageReader.onload = function (imageREvent) {
            document.getElementById("uploadPreview").src = imageREvent.target.result;
            document.getElementById("uploadPreview").style.display = "block";
        };
      };
    </script>
    @endsection
    <!-- Referensi jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
