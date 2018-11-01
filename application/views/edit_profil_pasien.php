<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Edit Daftar Pasien</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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
    
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">Daftar Pasien</li>
      <li class="breadcrumb-item">
        <a href="#">Jadwal Tinggal Pasien</a>
      </li>
    </ol>

    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-pencil"></i> Edit Profil Pasien</div>
        <div class="card-body">
          <?php 
          foreach($biodata_pasien as $b){
            ?>
            <form class="form-horizontal" action="<?php echo base_url('user_adm/simpan_edit_profil_pasien')?>" method="post" enctype="multipart/form-data" role="form">
              <input type="hidden" name="id" value="<?php echo  $this->uri->segment(3); ?>">
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="nama_pasien">Nama Pasien</label>
                    <input class="form-control" name="nama_pasien" type="text" value="<?php echo $b->nama; ?>">
                  </div>
                  <div class="col-md-3">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input id="datepicker" name="tgl_lahir_pasien" value="<?php echo $b->tgl_lahir; ?>" >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-5">
                    <label for="alamat">Alamat Kota</label>
                    <input type="text" class="form-control" name="alamat_kota" value="<?php echo $b->alamat_kota; ?>">
                  </div>
                  <div class="col-md-5">
                    <label for="alamat">Alamat Provinsi</label>
                    <input type="text" class="form-control" name="alamat_provinsi" value="<?php echo $b->alamat_provinsi; ?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                   <div class="form-group">
                    <label for="nama_ortu">Jenis Penyakit</label>
                    <select class="form-control flat" name="jenis_penyakit">
                      <option value="Kanker Darah"> Kanker Darah (Leukimia) </option>
                      <option value="Kanker Mata">Kanker Mata</option>
                      <option value="Kanker Kulit">Kanker Kulit</option>
                      <option value="Kanker Hati">Kanker Hati</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="nama_ortu">Nama Ayah Kandung</label>
                  <input class="form-control" name="nama_ayah" type="text" value="<?php echo $b->nama_ayah; ?>" placeholder="Nama ayah belum diisi . . .">
                </div>
                <div class="col-md-12">
                  <label for="nama_ortu">Nama Ibu Kandung</label>
                  <input class="form-control" name="nama_ibu" type="text" value="<?php echo $b->nama_ibu; ?>" placeholder="Nama ibu belum diisi . . .">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="no_telp">Nomor telepon</label>
              <input class="form-control" name="no_telp" type="text" value="<?php echo $b->no_telp; ?>" placeholder="Nomor Telepon Belum Diisi . . .">
            </div>
            <div class="form-group row">
              <div class="col-md-7">
                <div class="form-group">
                  <label style="color:white;">Fasilitas Kesehatan</label>
                  <select class="form-control flat" name="faskes">
                    <option value="Kartu Indonesia Sehat"> Kartu Indonesia Sehat</option>
                    <option value="BPJS kelas 3"> BPJS kelas 3</option>
                  </select>
                </div>
              </div>
            </div>
            <input class="btn btn-success" type="submit" value="Simpan">
            <input class="btn btn-danger" type="reset" value="Reset">
          </form>
          <?php } ?>
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
