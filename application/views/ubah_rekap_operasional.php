<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Tambah Kamar</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/moment.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/tempusdominus-bootstrap-4.min.js" type="text/javascript"></script>
  <link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
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
   <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-pencil"></i> Ubah Rekap Operasional Ambulan </div>
      <div class="card-body">
        <?php foreach ($rekap_tanggal as $r) { ?>
        <form class="form-horizontal" id="form-ubah-rekap-operasional" action="<?php echo base_url('user_adm/simpan_ubah_rekap_operasional')?>" method="post" enctype="multipart/form-data" role="form">
         <input type="hidden" name="id_rekap" value="<?php echo $r->id_rekap; ?>">
       <div class="form-group row">
        <div class="col-md-5">
          <label>Tanggal Berangkat</label>
          <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" name="tgl_berangkat" value="<?php echo $r->tgl_berangkat; ?>" />
            <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-5">
          <label>Jam Berangkat</label>
          <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" name="jam_berangkat" value="<?php echo $r->jam_berangkat; ?>" />
            <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
            </div>
          </div>
        </div>
      </div>
      <?php 
      $j = 1;
      foreach ($rekap_pasien_diantar as $d) { ?>
      <div class="form-group row">
        <div class="col-md-5">
          <label>Nama Pasien-<?php echo $j ?></label>
          <select class="form-control flat" name="id_pasien[]">
            <option value="<?php echo $d->id_pasien; ?>"><?php echo $d->nama; ?></option>
            <option disabled="">---------------------------------</option>
            <?php foreach ($biodata_pasien as $b) { ?>
            <option value="<?php echo $b->id; ?>"> <?php echo $b->nama; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <?php 
      $j++; 
    } 
    ?>
    <div class="form-group row">
      <div class="col-md-5">
        <label>Lokasi Tujuan</label>
        <input class="form-control" name="lokasi" type="text" placeholder="Masukkan lokasi tujuan . . ." value="<?php echo $r->lokasi_tujuan; ?>">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-5">
        <label>Biaya Operasional</label>
        <input class="form-control" name="biaya" type="number" placeholder="Masukkan biaya tujuan . . ." value="<?php echo $r->biaya; ?>">
      </div>
    </div>
    <input class="btn btn-success simpan_ubah_rekap_operasional" type="submit" value="Simpan">
    <input class="btn btn-danger" type="reset" value="Reset">
    <a href="<?php echo base_url('user_adm/rekap_operasional_ambulan'); ?>" class="btn btn-primary">Kembali</a><br>
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
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>
<script type="text/javascript">
  $(function () {
    $('#datetimepicker3').datetimepicker({
      format: 'LT'
    });
  });
  $(function () {
    $('#datetimepicker4').datetimepicker({
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
