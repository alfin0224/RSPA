<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Ubah Jadwal Berobat</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/moment.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/tempusdominus-bootstrap-4.min.js" type="text/javascript"></script>
  <!-- SweetAlert -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/sweetalert/sweetalert.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
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

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo base_url('user_adm/kamar/');?>">Kamar RSPA</a>
      </li>
      <li class="breadcrumb-item">
        <a href="<?php echo base_url('user_adm/rekap_belanja/');?>">Rekap Belanja</a>
      </li>
      <li class="breadcrumb-item">
        <a href="<?php echo base_url('user_adm/aset/');?>">Kelola Aset</a>
      </li>
      <li class="breadcrumb-item active">
       Kelola Kontak
     </li>
   </ol>

   <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-pencil"></i> Ubah Kontak RSPA</div>
      <div class="card-body">
        <?php foreach ($jadwal_berobat as $j) { ?>
        <form class="form-horizontal" id="form-ubah-jadwal-berobat" action="<?php echo base_url('user_adm/simpan_ubah_jadwal_berobat')?>" method="post" enctype="multipart/form-data" role="form">
          <input type="hidden" name="id_jadwal" value="<?php echo $j->id_jadwal; ?>">
          <input type="hidden" name="id_pasien" value="<?php echo $j->id_pasien; ?>">
          <input type="hidden" name="alasan_terlambat" value="<?php echo $j->alasan_terlambat; ?>">
          <input type="hidden" name="minggu_ke" value="<?php echo $j->minggu_ke; ?>">
          <div class="form-group row">
            <div class="col-md-5">
              <label for="nama_pasien"><b><u>Minggu ke - <?php echo $j->minggu_ke; ?></u></b></label>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <label for="tanggal_lahir">Tanggal Berobat</label>
              <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker" name="tgl_berobat" value="<?php echo $j->tgl_berobat; ?>" />
                <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
          </div>
          <?php 
            if ($j->minggu_ke == 1) {  ?>
            <div class="form-group row">
              <div class="col-md-4">
                <label>Status Berobat</label>
                <select class="form-control flat" name="status_berobat">
                <option value="<?php echo $j->status_berobat; ?>"><?php echo $j->status_berobat; ?></option>
                <option disabled="">-----------------------------------------</option>
                  <option value="tepat waktu"> Tepat Waktu</option>
                  <option value="terlambat"> Terlambat</option>
                </select>
              </div>
            </div>
            <?php  } ?>
          <div class="form-group row">
            <div class="col-md-4">
              <label>Kestabilan Kondisi</label>
              <select class="form-control flat" name="kestabilan_kondisi">
                <option value="<?php echo $j->kestabilan_kondisi; ?>"><?php echo $j->kestabilan_kondisi; ?></option>
                <option disabled="">-----------------------------------------</option>
                <option value="stabil"> Stabil</option>
                <option value="naik"> Naik</option>
                <option value="turun"> Turun</option>
              </select>
            </div>
          </div>  
          <input class="btn btn-success simpan_ubah_jadwal_berobat" type="submit" value="Simpan">
          <input class="btn btn-danger" type="reset" value="Reset">
          <a href="<?php echo base_url('user_adm/jadwal_berobat_pasien/'); echo $j->id_pasien; ?>" class="btn btn-primary">Kembali</a><br>
        </form>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('parts/footer.php'); ?>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fa fa-angle-up"></i>
</a>
<?php $this->load->view('parts/logout_modal.php'); ?>

<script type="text/javascript">
  $(function () {
    $('#datetimepicker').datetimepicker({
      format: 'DD-MM-YYYY'
    });
  });
</script>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>
</div>
</body>

</html>
