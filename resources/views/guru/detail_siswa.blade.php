<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kelas</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Kelas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item"><a href="kelas">Kelas</a></li>
              <li class="breadcrumb-item active">Detail Kelas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!--div class="row pb-4">
          <div class="col-lg-4">
            <h5>Kelas</h5>
            <select class="form-control" name="jk" id="jk" required>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div-->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                @foreach($nilais as $nilai)
                <h4>Rata-rata nilai kelas: {{ $nilai->rata_rata }}</h4>
                @endforeach
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Wali Kelas</th>
                  </tr>
                  </thead>
                  <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($siswas as $siswa)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td><a href="detailPenilaian{{ $siswa->id }}">{{ $siswa->nama_siswa }}</a></td>
                    <td>{{ $siswa->kelas->nama_kelas }}</td>
                    <td>{{ $siswa->kelas->jurusan->jurusan }}</td>
                    <td>{{ $siswa->kelas->guru->name }}</td>
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
    @endsection
</body>
</html>
