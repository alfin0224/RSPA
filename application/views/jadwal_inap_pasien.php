<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Daftar Pasien</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>

  <!-- SweetAlert -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/sweetalert/sweetalert.css'); ?>">
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/dialogs.js"></script>
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
    
    <div class="bg-light">
      <ol class="breadcrumb">
        <a href="<?php echo base_url('user_adm/pasien'); ?>">Daftar Pasien</a>
        
        <li class="breadcrumb-item">
         <li class="breadcrumb-item active">Jadwal Inap Pasien</li>
       </li>
       <li class="breadcrumb-item">
        <a href="<?php echo base_url('user_adm/riwayat_inap_pasien'); ?>">Riwayat Inap Pasien</a>
      </li>
    </ol>
  </div><br>

  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Jadwal Inap pasien</div>
      <div class="card-body">
        <div class="table-responsive">
        </br><table class="table table-bordered data" id="dataTable" width="100%" cellspacing="0"  style="text-align:center;">
        <thead>
          <tr>
            <th>Nama Pasien</th>
            <th>Tanggal Masuk</th>
            <th>Nama kamar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nama Pasien</th>
            <th>Tanggal Masuk</th>
            <th>Nama kamar</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach($jadwal_inap as $j){ ?>
          <tr>
            <td><?php echo $j->nama; ?></td>
            <td><?php echo date('d F Y', strtotime($j->tgl_masuk)); ?></td>
            <td><?php echo $j->nama_kamar; ?></td>
            <td><a href="<?php echo base_url('user_adm/tombol_pasien_keluar/'); echo $j->id; ?>" class="btn btn-sm btn-danger pasien_keluar">Pasien Keluar</i></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <br>
    </div>
  </div>
  <div class="card-footer small text-muted"></div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>
</html>
<?php $this->load->view('parts/footer.php'); ?>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fa fa-angle-up"></i>
</a>
<?php $this->load->view('parts/logout_modal.php'); ?>
<!-- Bootstrap core JavaScript-->

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

