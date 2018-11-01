<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Ubah Profil Admin</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax_daerah_ubah_profil.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/preview_image.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/moment.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/tempusdominus-bootstrap-4.min.js" type="text/javascript"></script>
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
    
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">Daftar Pasien</li>
      <li class="breadcrumb-item">
        <a href="<?php echo base_url('user_adm/jadwal_inap_pasien'); ?>">Jadwal Inap Pasien</a>
      </li>
    </ol>

    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-pencil"></i> Ubah Data Pasien</div>
        <div class="card-body">
          <?php 
          foreach($profil_admin as $b){
            ?>
            <form id="form-ubah-profil-admin" class="form-horizontal" action="<?php echo base_url('user_adm/simpan_ubah_profil_admin')?>" method="post" enctype="multipart/form-data" role="form">
              <input type="hidden" name="no_ktp" value="<?php echo $this->uri->segment(3); ?>">
              <!--
              <div class="form-group row">
                <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">  
                  <label>Foto Profil</label>
                  <div class="input-group image-preview">
                    <input type="text" class="form-control image-preview-filename" disabled="disabled" > 
                    <span class="input-group-btn">
                      
                      <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                      </button>
                      
                      <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title fa fa-camera"> Browse</span>
                        <input type="file" name="img_profil_admin" /> 
                      </div>
                    </span>
                  </div>
                </div>
              </div>
            -->
            <div class="form-group row">
              <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">  
                <div class="profile-pic">
                  <img src="<?= base_url() ?>assets/img/<?= $b->foto_profil ?>" id="img-profile" width="200">
                  <div class="profile-pic-edit"><a href="#" onclick="clickToBrowseFile()"><i class="fa fa-pencil fa-lg"></i></a></div>
                </div>
                <input type="file" name="img_profil_admin" /> 
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="nama_pasien">Nomor KTP</label>
                <input class="form-control" name="no_ktp" type="text" value="<?php echo $b->no_ktp; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="nama_pasien">Nama Anda</label>
                <input class="form-control" name="nama_admin" type="text" value="<?php echo $b->nama; ?>">
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-10">
                  <label>Jenis Kelamin</label>
                  <select class="form-control flat" name="jenis_kelamin">
                    <option value="<?php echo $b->jenis_kelamin; ?>"><?php echo $b->jenis_kelamin; ?></option>
                    <option disabled="">------------------------------------------------------</option>
                    <option value="laki-laki"> Laki-laki </option>
                    <option value="perempuan">Perempuan</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-10">
                <label>Username</label>
                <input class="form-control" name="username" type="text" value="<?php echo $b->username; ?>">
              </div>
            </div>
              <!--<div class="form-group">
                <div class="form-row">
                  <div class="col-md-10">
                    <label>Password Lama</label>
                    <input class="form-control" name="password_lama" type="password" value="<?php //echo $b->password; ?>" readonly>
                  </div>
                </div>
              </div>-->
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10">
                    <label>Password Baru</label>
                    <input class="form-control" name="password_baru" type="password" placeholder="Masukkan password baru di sini . . .">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10">
                    <label>Ulangi Password Baru</label>
                    <input class="form-control" name="ulangi_password_baru" type="password" placeholder="Ulangi password baru di sini . . .">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-10">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="5" id="comment" name="alamat"><?php echo $b->alamat ?></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-10">
                  <label for="no_telp">Nomor telepon</label>
                  <input class="form-control" name="no_telp" type="text"  value="<?php echo $b->no_telp; ?>">
                </div>
              </div><br>
              <script>
          //   var b = 1;
          //   $('#tambah-tanggal').click(function(){
          //     $('#tambah-tanggal').before('<div class="form-group row"><div class="col-md-5"><label>Tanggal Masuk</label><br><div class="input-group date" id="tgl_masuk'+b+'" data-target-input="nearest"><input type="text" class="form-control datetimepicker-input" data-target="#tgl_masuk'+b+'" name="tgl_masuk'+b+'" /><div class="input-group-append" data-target="#tgl_masuk'+b+'" data-toggle="datetimepicker"><div class="input-group-text"><i class="fa fa-calendar"></i></div></div></div></div><div class="col-md-5"><label>Tanggal Keluar</label><br><div class="input-group date" id="datetimepicker" data-target-input="nearest"><input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker" name="tgl_lahir'+b+'" /><div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker"><div class="input-group-text"><i class="fa fa-calendar"></i></div></div></div></div></div>');
          //     b++;
          //   });
        // </script>
        <input class="btn btn-success simpan_ubah_profil_admin" type="submit" value="Simpan">
        <input class="btn btn-danger" type="reset" value="Reset">
        <a href="<?php echo base_url('user_adm/profil_admin/'); echo $b->no_ktp; ?>" class="btn btn-primary">Kembali</a><br>
      </form>
      <?php 
    } 
    ?> 
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

  function imageIsLoaded(e) {
    $('#img-profile').attr('src', e.target.result);

  };
  function clickToBrowseFile() {
    $('input[name="img_profil_admin"]').trigger('click');
    $('input[name="img_profil_admin"]').attr('cek','1');
  }

  $(function () {

    $('#datetimepicker').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    
    $('#datetimepicker1').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    
    $('input[name="img_profil_admin"]').change(function () {
      console.log(this.files[0]);
      if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
      }
    });
    $('input[name="img_profil_admin"]').click(function(){

      if ($(this).attr('cek') == 1) {
        return false;
      }
    });

  });
  
</script>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>

</div>
</body>

</html>
