<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/logo.jpg" type="image/jpg" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="style/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="style/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="style/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="style/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="style/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="style/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="style/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="style/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="style/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="img/logo.jpg" alt="Logo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i>&nbsp; {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{ route('logout') }}" class="dropdown-item">
            <i class="fas fa-power-off mr-2"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="img/logo.jpg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SMKN 1 Toraja Utara</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if(Auth::user()->level == 'Admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dataSiswa" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dataGuru" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dataKelas" class="nav-link">
                  <i class="fas fa-layer-group nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dataJurusan" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Jurusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dataMataPelajaran" class="nav-link">
                  <i class="fas fa-bookmark nav-icon"></i>
                  <p>Mata Pelajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dataWali" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Wali Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dataHari" class="nav-link">
                  <i class="fas fa-bars nav-icon"></i>
                  <p>Hari</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dataPredikat" class="nav-link">
                  <i class="fas fa-clipboard nav-icon"></i>
                  <p>Predikat</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="user" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
          @elseif(Auth::user()->level == 'Wali')
          <li class="nav-item">
            <a href="kelas" class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Kelas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="nilai" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Nilai
              </p>
            </a>
          </li>
          @else
          <li class="nav-item">
            <a href="siswa" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Siswa
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="#">SMKN 1 Toraja Utara</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="style/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="style/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="style/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="style/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="style/plugins/sparklines/sparkline.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="style/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="style/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="style/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="style/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="style/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="style/dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="style/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="style/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="style/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="style/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="style/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="style/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="style/plugins/jszip/jszip.min.js"></script>
<script src="style/plugins/pdfmake/pdfmake.min.js"></script>
<script src="style/plugins/pdfmake/vfs_fonts.js"></script>
<script src="style/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="style/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="style/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
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
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "pageLength": 1
    });
  });
</script>
</body>
</html>
