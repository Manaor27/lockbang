<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <p>SISWA</p>
                <h3><?php if($siswa) { echo $siswa; } else { echo '0'; } ?></h3>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <p>MATA PELAJARAN</p>
                <h3><?php if($mapel) { echo $mapel->nama_mapel; } else { echo '-'; } ?></h3>
              </div>
              <div class="icon">
                <i class="fas fa-bookmark"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <p>KELAS</p>
                <h3><?php if($kelas) { echo $kelas->nama_kelas; } else { echo '-'; } ?></h3>
              </div>
              <div class="icon">
                <i class="fas fa-layer-group"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <p>JURUSAN</p>
                <h3><?php if($kelas) { echo $kelas->jurusan->jurusan; } else { echo '-'; } ?></h3>
              </div>
              <div class="icon">
                <i class="fas fa-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><b>Profile</b></h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-2">
                <img src="foto/{{ Auth::user()->foto }}" alt="Foto" style="height: 100px;">
              </div>
              <div class="col-sm-10">
                <table>
                  <tr>
                    <th>Nama</th>
                    <td>: {{ Auth::user()->name }}</td>
                  </tr>
                  <tr>
                    <th>Telpon</th>
                    <td>: {{ Auth::user()->telp }}</td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td>: {{ Auth::user()->email }}</td>
                  </tr>
                </table>
              </div>
            </div>

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <br>
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @endsection
</body>
</html>
