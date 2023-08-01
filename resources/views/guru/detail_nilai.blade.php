<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Nilai</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Nilai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item"><a href="nilai">Nilai Ulangan</a></li>
              <li class="breadcrumb-item">Detail Ulangan</li>
              <li class="breadcrumb-item active">Detail Nilai</li>
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
            <h4>Predikat</h4>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama Mata Pelajaran</th>
                  <th>A</th>
                  <th>B</th>
                  <th>C</th>
                  <th>D</th>
                </tr>
              </thead>
              <tbody>
                @foreach($predikats as $predikat)
                <tr>
                  <td>{{ $predikat->mapel->nama_mapel }}</td>
                  <td>{{ $predikat->deskripsi_a }}</td>
                  <td>{{ $predikat->deskripsi_b }}</td>
                  <td>{{ $predikat->deskripsi_c }}</td>
                  <td>{{ $predikat->deskripsi_d }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="card">
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama Mata Pelajaran</th>
                  <th>KKM</th>
                  <th>Ulangan 1</th>
                  <th>Ulangan 2</th>
                  <th>Ulangan 3</th>
                  <th>Ulangan 4</th>
                  <th>Ulangan 5</th>
                  <th>Ulangan 6</th>
                  <th>Praktikum</th>
                  <th>UTS</th>
                  <th>UAS</th>
                  <th>Total</th>
                  <th>Predikat</th>
                </tr>
              </thead>
              <tbody>
                @foreach($ulangans as $ulangan)
                <tr>
                  <td><a class="btn-edit" href="#" data-id="{{ json_encode($ulangan); }}">{{ $ulangan->mapel->nama_mapel }}</a></td>
                  <td>
                      @foreach($nilais as $nilai)
                        @if($ulangan->mapel->id == $nilai->mapel->id)
                          {{ $nilai->kkm }}
                        @endif
                      @endforeach
                  </td>
                  <td>{{ $ulangan->ulha_1 }}</td>
                  <td>{{ $ulangan->ulha_2 }}</td>
                  <td>{{ $ulangan->ulha_3 }}</td>
                  <td>{{ $ulangan->ulha_4 }}</td>
                  <td>{{ $ulangan->ulha_5 }}</td>
                  <td>{{ $ulangan->ulha_6 }}</td>
                  <td>{{ $ulangan->prak }}</td>
                  <td>{{ $ulangan->uts }}</td>
                  <td>{{ $ulangan->uas }}</td>
                  <td>
                    <?php
                      echo ($ulangan->ulha_1+$ulangan->ulha_2+$ulangan->ulha_3+$ulangan->ulha_4+$ulangan->ulha_5+$ulangan->ulha_6+$ulangan->prak+$ulangan->uts+$ulangan->uas)/9;
                    ?>
                  </td>
                  <td>
                    <?php
                      $total = ($ulangan->ulha_1+$ulangan->ulha_2+$ulangan->ulha_3+$ulangan->ulha_4+$ulangan->ulha_5+$ulangan->ulha_6+$ulangan->prak+$ulangan->uts+$ulangan->uas)/9;
                      if ($total >= 86) {
                        echo 'A';
                      } elseif ($total >= 76) {
                        echo 'B';
                      } elseif ($total >= 66) {
                        echo 'C';
                      } else {
                        echo 'D';
                      }
                    ?>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="ulanganForm">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Nilai Ulangan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="simpanUlangan" method="post" id="simpanForm">
              @csrf
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label>NIS</label>
                <input type="text" class="form-control" value="{{$siswa->nis}}" readonly>
              </div>
              <div class="form-group">
                <label>NISN</label>
                <input type="text" class="form-control" value="{{$siswa->nisn}}" readonly>
              </div>
              <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" class="form-control" value="{{$siswa->nama_siswa}}" readonly>
                <input type="hidden" name="siswa_id" value="{{$siswa->id}}">
              </div>
              <div class="form-group">
                <label>Mata Pelajaran</label>
                <input type="text" class="form-control" value="{{ $mapel->nama_mapel }}" readonly>
                <input type="hidden" name="mapel" id="mapel">
              </div>
              <div class="form-group">
                <label>Kelas</label>
                <input type="text" class="form-control" value="{{$siswa->kelas->nama_kelas}}" readonly>
                <input type="hidden" name="kelas" value="{{$siswa->kelas->id}}">
              </div>
              <div class="form-group">
                <div class="form-group row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Ulangan 1</label>
                      <input type="text" class="form-control" name="ulangan1" id="ulangan1">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Ulangan 2</label>
                      <input type="text" class="form-control" name="ulangan2" id="ulangan2">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Ulangan 3</label>
                      <input type="number" class="form-control" name="ulangan3" id="ulangan3">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Ulangan 4</label>
                      <input type="text" class="form-control" name="ulangan4" id="ulangan4">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Ulangan 5</label>
                      <input type="number" class="form-control" name="ulangan5" id="ulangan5">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Ulangan 6</label>
                      <input type="number" class="form-control" name="ulangan6" id="ulangan6">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>UTS</label>
                      <input type="number" class="form-control" name="uts" id="uts">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Praktikum</label>
                      <input type="number" class="form-control" name="praktikum" id="praktikum">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>UAS</label>
                      <input type="number" class="form-control" name="uas" id="uas">
                    </div>
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
    <script>
      $(document).ready(function() {
        // Button click event handler
        $('.btn-edit').on('click', function() {

            var data = $(this).data('id');

            // Set nilai pada form modal
            $('#mapel').val(data.mapel_id);
            $('#ulangan1').val(data.ulha_1);
            $('#ulangan2').val(data.ulha_2);
            $('#ulangan3').val(data.ulha_3);
            $('#ulangan4').val(data.ulha_4);
            $('#ulangan5').val(data.ulha_5);
            $('#ulangan6').val(data.ulha_6);
            $('#praktikum').val(data.prak);
            $('#uts').val(data.uts);
            $('#uas').val(data.uas);
            $('#id').val(data.id);

            $('#ulanganForm').modal('show');
        });

        $('.btn-tambah').on('click', function() {

            $('#ulanganForm').modal('show');
        });
      });
    </script>
    @endsection
    <!-- Referensi jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
