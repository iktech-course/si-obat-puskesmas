<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs">Nurrajma suryanti</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="">
          <li class="active treeview">
            <a href="beranda.php">
              <i class="fa fa-dashboard"></i> <span>Beranda</span>
            </a>
          </li>
          <li class="treeview">
            <a href="obat-masuk.php">
              <i class="fa fa-map-o"></i> <span>Data obat masuk</span>
            </a>
          </li>
          <li class="treeview">
            <a href="obat-keluar.php">
              <i class="fa fa-map-o"></i> <span>Data obat keluar</span>
            </a>
          </li>
          <li class="treeview">
            <a href="stok-obat.php">
              <i class="fa fa-map-o"></i> <span>Stok obat</span>
            </a>
          <li class="treeview">
            <a href="data-obat.php">
              <i class="fa fa-map-o"></i> <span>Data obat</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-user-times"></i> <span>Logout</span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Data obat
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  <TABLE>Tambahkan</TABLE>
                </button>
                <a target="_blank" href="export-excel-data-obat.php" class="btn btn-success mt-2 mb-3">Export Ke Excel</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">
                  <?php
                  include 'koneksi.php';

                  $sql = "SELECT * FROM data_obat";
                  $query = mysqli_query($koneksi, $sql);
                  $no = 0
                  ?>
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Satuan</th>
                      <th>tgl Expired</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      while ($data = mysqli_fetch_array($query)) {
                        $no++
                      ?>
                        <td><?= $no ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['satuan'] ?></td>
                        <td><?= $data['tgl_expired'] ?></td>
                        <td>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?= $data['id'] ?>">
                            Edit
                          </button>
                          <a href="hapus-data-obat.php?id=<?php echo $data['id'] ?>" class="btn btn-danger">
                            Hapus
                          </a>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal-edit<?php echo $data['id']; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">edit data obat</h4>
                          </div>
                          <?php
                            $id=$data['id']; 
                            $query_data=mysqli_query($koneksi, "SELECT * FROM data_obat WHERE id = $id" ); 
                            $baris=mysqli_fetch_array($query_data); 
                          ?>
                            <div class="modal-body">
                              <!-- form start -->
                              <form action="edit-data-obat.php" method="post">
                                <input type="hidden" name="id" value="<?= $baris['id']; ?>">
                                <div class="box-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">nama</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $baris['nama'] ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">satuan</label>
                                    <input type="text" class="form-control" name="satuan" value="<?= $baris['satuan'] ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">tgl expired</label>
                                    <input type="date" class="form-control" name="tgl_expired" value="<?= $baris['tgl_expired'] ?>">
                                  </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                  <?php
                      }
                  ?>
                  </tbody>
                  </thead>


                  </tr>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Nurrajma Suryanti</a>.</strong>
    </footer>

    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Form Stok Obat</h4>
        </div>
        <div class="modal-body">
          <!-- form start -->
          <form action="input-data-obat-proses.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" class="form-control" name="nama" placeholder="Enter Nama Obat">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Satuan</label>
              <input type="text" class="form-control" name="satuan" placeholder="Enter Satuan">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">tgl expired</label>
              <input type="date" class="form-control" name="tgl_expired" placeholder="Enter Tgl Expired">
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $('#example2').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      })
    });
  </script>
</body>

</html>