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
        <!-- Main row -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Profile</h3>
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
                    <th>NIP</th>
                    <td>: {{ Auth::user()->nip }}</td>
                  </tr>
                  <tr>
                    <th>Telpon</th>
                    <td>: {{ Auth::user()->telp }}</td>
                  </tr>
                  <tr>
                    <th>Agama</th>
                    <td>: {{ Auth::user()->agama }}</td>
                  </tr>
                  <tr>
                    <th>Tanggal Lahir</th>
                    <td>: {{ Auth::user()->tgl_lahir }}</td>
                  </tr>
                  <tr>
                    <th>Tempat Lahir</th>
                    <td>: {{ Auth::user()->tmp_lahir }}</td>
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