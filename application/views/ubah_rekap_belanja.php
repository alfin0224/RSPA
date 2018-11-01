<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Ubah Rekap Belanja</title>
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
      <li class="breadcrumb-item active">
        Rekap Belanja
      </li>
      <li class="breadcrumb-item">
        <a href="<?php echo base_url('user_adm/aset/');?>">Kelola Aset</a>
      </li>
      <li class="breadcrumb-item">
       <a href="<?php echo base_url('user_adm/kelola_kontak/');?>">Kelola Kontak</a>
     </li>
   </ol>

   <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-pencil"></i> Ubah Kontak RSPA</div>
      <div class="card-body">
        <?php foreach ($rekap_belanja as $r) { ?>
        <form class="form-horizontal" id="form-ubah-rekap-belanja" action="<?php echo base_url('user_adm/simpan_ubah_rekap_belanja')?>" method="post" enctype="multipart/form-data" role="form">
          <input type="hidden" name="id_belanja" value="<?php echo $r->id_belanja; ?>">
          <div class="form-group row">
            <div class="col-md-5">
              <label for="nama_pasien">Nama Barang</label>
              <input class="form-control" name="nama_barang" type="text" value="<?php echo $r->nama_barang; ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-5">
              <label for="nama_ortu">Jenis Barang</label>
              <select class="form-control flat" name="jenis_barang">
                <option value="<?php echo $r->harga; ?>"> <?php echo $r->jenis_barang; ?> </option>
                <option value="makanan"> Makananan </option>
                <option value="minuman"> Minuman </option>
                <option value="obat-obatan"> Obat-obatan </option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-5">
              <label for="nama_ortu">Harga Barang</label>
              <input class="form-control" name="harga" type="number" value="<?php echo $r->harga; ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-5">
              <label for="nama_ortu">Jumlah Barang</label>
              <input class="form-control" name="jml_barang" type="number" value="<?php echo $r->jumlah; ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <label for="tanggal_lahir">Tanggal Belanja</label>
              <input id="datepicker" name="tgl_belanja" value="<?php echo $r->tgl_belanja; ?>">
            </div>
          </div>   
          <input class="btn btn-success simpan_ubah_rekap_belanja" type="submit" value="Simpan">
          <input class="btn btn-danger" type="reset" value="Reset">
          <a href="<?php echo base_url('user_adm/kelola_kontak'); ?>" class="btn btn-primary">Kembali</a><br>
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
<script>
  $('#datepicker').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'dd-mm-yyyy'
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
