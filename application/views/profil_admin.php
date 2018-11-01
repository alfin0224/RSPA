<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Profil Admin</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
   <img src="<?php echo base_url(); ?>assets/img/RSPA1.png" width="3%" height="3%" alt="Responsive image">&nbsp&nbsp<span class="navbar-brand">RSPA Buah Hati</span>
   <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <?php $this->load->view('parts/sidebar.php'); ?>
    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
     <?php $this->load->view('parts/button_right.php'); ?>
   </ul>

 </div>

</nav>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-address-card"></i> Profil Admin</div>
        <div class="card-body">
          <div class="table-responsive">
            <?php foreach($admin as $ft){ ?>
            <div class="col-xs-2 col-sm-2 col-lg-3" align="center"> <br><img alt="User Pic" src="<?php echo base_url(); ?>assets/img/<?php echo $ft->foto_profil ?>" width="100%" height="200%" class="img-circle img-responsive" ></div>
            <?php } ?>
            <div class=" col-md-11 col-lg-11 "> 
              <table class="table table-user-information">
                <tbody>
                  <?php foreach($admin as $b){ ?>
                  <tr>
                    <td>Nomor KTP</td>
                    <td><h5><?php echo $b->no_ktp; ?></h5></td>
                  </tr>
                  <tr>
                    <td>Nama Lengkap</td>
                    <td><h5><?php echo $b->nama; ?></h5></td>
                  </tr>
                  <tr>
                    <td>Username</td>
                    <td><?php echo $b->username; ?></td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td><?php echo $b->jenis_kelamin; ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td><?php echo $b->alamat; ?></td>
                  </tr>
                  <tr>
                    <td>Nomor Telepon/HP</td>
                    <td><?php echo $b->no_telp; ?></td>
                  </tr><br>
                  <tr>
                    <td></td><td></td></tr>

                  </tr>
                  
                </tbody>
              </table><br>
              <a href="<?php echo base_url('user_adm/ubah_profil_admin/'); echo $b->no_ktp; ?>" class="btn btn-warning">Ubah Profil</a>
              <?php } ?>
              <button onclick="goBack()" class="btn btn-primary">Kembali</button><br>
            </div>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>
    <script>
      function goBack() {
        window.history.back();
      }
    </script>
    <?php $this->load->view('parts/footer.php'); ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <?php $this->load->view('parts/logout_modal.php'); ?>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
