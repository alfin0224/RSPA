<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>RSPA Buah Hati</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/package/dist/sweetalert2.min.css">
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/moment.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/tempusdominus-bootstrap-4.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax_daerah.js"></script>
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>assets/css/grayscale.min.css" rel="stylesheet">
  <!-- SweetAlert -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/sweetalert/sweetalert.css'); ?>">
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/dialogs.js"></script>
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <img src="<?php echo base_url(); ?>assets/img/RSPA1.png" width="7%" height="7%" alt="Responsive image">
      &nbsp; &nbsp;<a class="navbar-brand js-scroll-trigger" href="#page-top">RSPA BUAH HATI</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Registrasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#projects">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#signup">Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
       <img src="<?php echo base_url(); ?>assets/img/logo1.png" class="img-fluid" alt="Responsive image">

       <a href="#about" class="btn btn-primary js-scroll-trigger">Detail Pasien</a>
     </div>
   </div>
 </header>

 <!-- About Section -->
 <section id="about" class="about-section text-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h2 class="text-white mb-4">Pasien Berhasil Terdaftar</h2>
        
        <div class="form-group row">
          <div class="col-sm-10">
            <label style="color:white;">Nama Pasien</label>
            <h4 style="color:white;"><?= isset($biodata->nama)? $biodata->nama : '' ?></h4>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-5">
            <label style="color:white;">Tanggal Lahir</label>
            <h4 style="color:white;"><?= isset($biodata->tgl_lahir_pasien)? $biodata->tgl_lahir_pasien : '' ?></h4>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-4" style="border-style:solid; border-width:1px; border-color:white; margin-left:15px;margin-right:15px; padding:10px;">

            <h4 style="color:white;"><?= isset($biodata->jenis_kelamin)? $biodata->jenis_kelamin : '' ?></h4>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <label style="color:white;">Jenis Penyakit Pasien</label>
            <h4 style="color:white;"><?= isset($biodata->jenis_penyakit)? $biodata->jenis_penyakit : '' ?></h4>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-10">
            <label style="color:white;">Nama Ayah Kandung</label>
            <h4 style="color:white;"><?= isset($biodata->nama_ayah)? $biodata->nama_ayah : '' ?></h4>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <label style="color:white;">Pekerjaan Orangtua</label>
            <h4 style="color:white;"><?= isset($biodata->pekerjaan_ortu)? $biodata->pekerjaan_ortu : '' ?></h4>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-5">
            <label style="color:white;">Alamat Provinsi</label>
            <h4 style="color:white;"><?= isset($biodata->id_prov)? $biodata->id_prov : '' ?></h4>
          </div>
          <div class="col-md-5" id="kab_box">
            <label style="color:white;">Kabupaten/Kota</label>
            <h4 style="color:white;"><?= isset($biodata->kota)? $biodata->kota : '' ?></h4>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-10">
            <label style="color:white;">Nomor Telepon</label>
            <h4 style="color:white;"><?= isset($biodata->no_telp)? $biodata->no_telp : '' ?></h4>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-7">
            <label style="color:white;">Fasilitas Kesehatan</label>
            <h4 style="color:white;"><?= isset($biodata->faskes)? $biodata->faskes : '' ?></h4>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-10">
            <label style="color:white;">Nomor Kartu BPJS</label>
            <h4 style="color:white;"><?= isset($biodata->no_kartu)? $biodata->no_kartu : '' ?></h4>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-2">
            <?= anchor('user','Kembali',array('class'=>'btn btn-primary')) ?>
          </div>
        </div>
        
      </div>
    </div>
    <img src="<?php echo base_url(); ?>assets/img/childcancer.png" class="img-fluid" alt="Responsive image"  style="margin-top:18%;">
  </div>
</section>

<!-- Projects Section -->
<section id="projects" class="projects-section bg-light">
  <div class="container">

    <!-- Featured Project Row -->
    <div class="row align-items-center no-gutters mb-4 mb-lg-5">
      <div class="col-xl-8 col-lg-7">
        <img class="img-fluid mb-3 mb-lg-0" src="<?php echo base_url(); ?>assets/img/bg-masthead.jpg" alt="">
      </div>
      <div class="col-xl-4 col-lg-5">
        <div class="featured-text text-center text-lg-left">
          <h4 style="color:white;">Angka Kanker Anak</h4>
          <p class="text-black-50 mb-0">Menurut data yang yang diperoleh melalui WHO, setiap tahunnya angka kejadian kanker anak meningkat mencapai 110 sampai 130 kasus per satu juta anak pertahunnya. Berdasarkan data resmi dari IARC (International Agency of Research Cancer) memperkirakan 80% anak yang terdiagnosis kanker terletak di negara berkembang.</p>
        </div>
      </div>
    </div>

    <!-- Project One Row -->
    <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
      <div class="col-lg-6">
        <img class="img-fluid" src="<?php echo base_url(); ?>assets/img/child-cancer1.jpg" alt="">
      </div>
      <div class="col-lg-6">
        <div class="bg-black text-center h-100 project">
          <div class="d-flex h-100">
            <div class="project-text w-100 my-auto text-center text-lg-left">
              <h4 style="color:white;" class="text-white">Kanker Anak di Indonesia</h4>
              <p class="mb-0 text-white-50">Di Indonesia sendiri angka kejadian kanker kurang lebih 11 ribu kasus kanker anak setiap tahunnya yang sebagian besar berasal dari keluarga yang kurang mampu.</p>
              <hr class="d-none d-lg-block mb-0 ml-0">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Project Two Row -->
    <div class="row justify-content-center no-gutters">
      <div class="col-lg-6">
        <img class="img-fluid" src="<?php echo base_url(); ?>assets/img/child-cancer2.jpg" alt="">
      </div>
      <div class="col-lg-6 order-lg-first">
        <div class="bg-black text-center h-100 project">
          <div class="d-flex h-100">
            <div class="project-text w-100 my-auto text-center text-lg-right">
              <h4 style="color:white;" class="text-white">RSPA BUAH HATI</h4>
              <p class="mb-0 text-white-50">Rumah Singgah Pasien Anak Khusus Kanker dan Kelainan Darah “Buah Hati” merupakan kegiatan sosial non-profit milik perseorangan, yang berdiri sejak bulan Mei 2015. Tujuan dari rumah singgah ini yaitu untuk mengakomodasi para pasien kanker anak dan pendampingnya untuk mendapatkan akses tempat tinggal, sarana transportasi dan informasi terkait proses pengobatan.</p>
              <hr class="d-none d-lg-block mb-0 mr-0">
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- Signup Section -->
<section id="signup" class="signup-section">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-lg-8 mx-auto text-center">

        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
        <h2 class="text-white mb-5">Silahkan Hubungi Kami Dibawah Ini..</h2>


      </div>
    </div>
  </div>
</section>

<!-- Contact Section -->
<section class="contact-section bg-black">
  <div class="container">

    <div class="row">

      <div class="col-md-4 mb-3 mb-md-0">
        <div class="card py-4 h-100">
          <div class="card-body text-center">
            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
            <h4 style="color:white;" class="text-uppercase m-0">Address</h4>
            <hr class="my-4">
            <?php foreach ($kontak as $k) { ?>

              <div class="small text-black-50"><?php echo $k->alamat; ?></div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-envelope text-primary mb-2"></i>
              <h4 style="color:white;" class="text-uppercase m-0">Email</h4>
              <hr class="my-4">
              <div class="small text-black-50">
                <a href="#"><?php echo $k->email; ?></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-mobile-alt text-primary mb-2"></i>
              <h4 style="color:white;" class="text-uppercase m-0">Phone</h4>
              <hr class="my-4">
              <div class="small text-black-50"><?php echo $k->no_telp; ?></div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

    <div class="social d-flex justify-content-center">
      <a href="#" class="mx-2">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#" class="mx-2">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#" class="mx-2">
        <i class="fab fa-github"></i>
      </a>
    </div>

  </div>
</section>

<!-- Footer -->
<footer class="bg-black small text-center text-white-50">
  <div class="container">
    Copyright &copy; Muhamad Alfienda Rachman - Teknik Informatika UII 2018
  </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="<?php echo base_url(); ?>assets/vendor/font-awesome/js/all.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="<?php echo base_url(); ?>assets/js/grayscale.min.js"></script>

<script src="<?php echo base_url(); ?>assets/package/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">

  $(function () {

    <?php
    if (!is_null($this->session->flashdata('message'))) {
      $message = $this->session->flashdata('message');
      echo 'swal({
        title:"Alert",
        text: "'.$message['text'].'",
        timer: 1500,
        showConfirmButton: true,
        type: "'.$message['type'].'"
      });';
    }
    ?>

    $('#datetimepicker1').datetimepicker({
      format: 'DD-MM-YYYY'
    });

    $('#datetimepicker').datetimepicker({
      format: 'DD-MM-YYYY'
    });

    var statusBerhasil = $('#statusBerhasil').text();
    if(statusBerhasil == 'success'){
      console.log('berhasil panggil');

      
    }

  });

  
</script>
</body>

</html>
