<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Ubah Kontak</title>
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
          <?php foreach ($kontak as $k) { ?>
          <form class="form-horizontal" id="form-ubah-kontak" action="<?php echo base_url('user_adm/simpan_ubah_kontak')?>" method="post" enctype="multipart/form-data" role="form">
            <input type="hidden" name="id_kontak" value="<?php echo $k->id; ?>">
            <div class="form-group row">
              <div class="col-md-5">
                <label for="nama_pasien">Nomor Telepon</label>
                <input class="form-control" name="no_telp" type="text" value="<?php echo $k->no_telp; ?>">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-5">
                <label for="nama_ortu">Email RSPA</label>
                <input class="form-control" name="email" type="email" value="<?php echo $k->email; ?>">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-5">
                <label for="nama_ortu">Alamat RSPA</label>
                <textarea class="form-control" rows="5" id="comment" name="alamat"><?php echo $k->alamat ?></textarea>
              </div>
            </div>   
            <input class="btn btn-success simpan_ubah_kontak" type="submit" value="Simpan">
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

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>
</div>
</body>

</html>
