<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Jadwal Berobat Pasien</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
   <img src="<?php echo base_url(); ?>assets/img/RSPA1.png" width="3%" height="3%" alt="Responsive image">&nbsp&nbsp<a class="navbar-brand" href="index.html">RSPA Buah Hati</a>
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
    
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">Daftar Pasien</li>
      <li class="breadcrumb-item">
        <a href="#">Jadwal Tinggal Pasien</a>
      </li>
    </ol>

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Jadwal Berobat Pasien</div>
        <div class="card-body">
          <div class="table-responsive">
          </br><table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <label><b>Nama Pasien : </b></label><br>
          <?php 
          $x=0;
          $y = 0;
          for($j=0; $j<12; $j++){ ?>
          <thead>
            <tr>
              <td><label style="width:90px; text-align:center;">Minggu ke-</label></td>
              <?php 

              for($i=0; $i<12; $i++){

                ?>
                <th style="text-align:center;"><?php echo $x=$x+1; ?></th>
                <?php

              } ?>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="text-align:center;">Tanggal</td>
              <?php for($i=0; $i<12; $i++){?>
              <td>
                <input id="datepicker<?php echo $y ?>" width="80px" /></td>
                <?php  $y=$y+1;} ?>
              </tr>
            </tbody>
            <?php } ?>

          </table>
        </div>
      </div>
      <div class="card-footer small text-muted"></div>
    </div>
  </div>
  <?php $this->load->view('parts/footer.php'); ?>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>
  <?php $this->load->view('parts/logout_modal.php'); ?>
  <!-- Bootstrap core JavaScript-->

  <script>
    <?php for($z=0; $z<144; $z++){
      ?>
      $('#datepicker<?php echo $z;?>').datepicker({
        uiLibrary: 'bootstrap4'
      });
      <?php } ?>

    </script>
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
