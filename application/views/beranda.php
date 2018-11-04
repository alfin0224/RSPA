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
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>assets/css/grayscale.min.css" rel="stylesheet">
  <!-- SweetAlert -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/sweetalert/sweetalert.css'); ?>">

  
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

       <a href="#about" class="btn btn-primary js-scroll-trigger">Registrasi</a>
     </div>
   </div>
 </header>

 <!-- About Section -->
 <section id="about" class="about-section text-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h2 class="text-white mb-4">Silahkan Registrasi DISINI</h2>
        <p class="text-white-50">Pendaftaran Rumah Singgah Pasien Anak Kanker Buah Hati dapat mengisi form dibawah ini. Isi data dengan lengkap dan harus sesuai dengan biodata asli pendaftar.</p>
        <form class="form-horizontal" id="form-registrasi" action="<?php echo base_url('user/simpan_pendaftaran')?>" method="post" enctype="multipart/form-data" role="form" style="text-align:left;">
          <div class="form-group row">
            <div class="col-sm-10">
              <label style="color:white;">Nama Pasien</label>
              <input type="text" class="form-control" name="nama_pasien" placeholder="Masukkan Nama Pasien Di Sini . . ." required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-5">
              <label style="color:white;">Tanggal Lahir</label>
              <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker" name="tgl_lahir_pasien" required />
                <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-4" style="border-style:solid; border-width:1px; border-color:white; margin-left:15px;margin-right:15px; padding:10px;">
              <label style="color:white;">Jenis Kelamin</label><br>
              <input type="radio" name="jenis_kelamin" value="laki-laki"> <label style="color:white;">Laki-Laki</label> &nbsp;
              <input type="radio" name="jenis_kelamin" value="perempuan"> <label style="color:white;">Perempuan</label><br>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <label style="color:white;">Jenis Penyakit Pasien</label>
              <select class="form-control flat" name="jenis_penyakit">
                <option value="Kanker Darah"> Kanker Darah (Leukimia) </option>
                <option value="Kanker Mata">Kanker Mata</option>
                <option value="Kanker Kulit">Kanker Kulit</option>
                <option value="Kanker Hati">Kanker Hati</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-7">
              <label style="color:white;">Tanggal Inap</label>
              <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="tgl_dibutuhkan" required />
                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>

                </div>
                <span class="text-warning" style="font-size:12px;">*Masukkan tanggal anda membutuhkan inap di RSPA Buah Hati</span>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <label style="color:white;">Nama Ayah Kandung</label>
              <input type="text" class="form-control" name="nama_ayah" placeholder="Masukkan Nama Ayah Di Sini . . ." required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <label style="color:white;">Pekerjaan Orangtua</label>
              <input type="text" class="form-control" name="pekerjaan" placeholder="Masukkan Pekerjaan Orangtua Di Sini . . ." required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-5">
              <label style="color:white;">Alamat Provinsi</label>
              <select class="form-control flat" name="prop" id="prop" onchange="ajaxkota(this.value)">
                <option value="">Pilih Provinsi</option>
                <?php 
                foreach($provinsi as $data){ ?>
                  <option value="<?php echo $data->id_prov; ?>"><?php echo $data->nama_prov; ?></option>';
                <?php  }
                ?>
              </select>
            </div>
            <div class="col-md-5" id="kab_box">
              <label style="color:white;">Kabupaten/Kota</label>
              <select class="form-control flat" name="kota" id="kota" onchange="ajaxkec(this.value)">
                <option value="">Pilih Kota</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-10">
              <label style="color:white;">Nomor Telepon</label>
              <input type="text" class="form-control" name="no_telp" placeholder="Masukkan No Telepon/HP Di Sini . . ." required>
              <span class="text-warning" style="font-size:12px;">*Pastikan nomor yang anda masukkan adalah nomor yang aktif</span>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-7">
              <label style="color:white;">Fasilitas Kesehatan</label>
              <select class="form-control flat" name="faskes">
                <option value="Kartu Indonesia Sehat">BPJS Pemerintah(PBI)</option>
                <option value="BPJS Kelas 3"> BPJS kelas 3</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-10">
              <label style="color:white;">Nomor Kartu BPJS</label>
              <input type="text" class="form-control" name="no_kartu" placeholder="Masukkan Nomor Kartu Di Sini . . ." required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-10">
              <!-- Default unchecked -->
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultUnchecked" required>
                <label style="color:white;" class="custom-control-label" for="defaultUnchecked">Saya benar-benar membutuhkan RSPA Buah Hati dan saya bersedia untuk mentaati seluruh aturan RSPA Buah Hati</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2">
              <button type="submit" class="btn btn-primary">Daftar</button>
            </div>
          </div>
        </form>
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
          <h4>Angka Kanker Anak</h4>
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
              <h4 class="text-white">Kanker Anak di Indonesia</h4>
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
              <h4 class="text-white">RSPA BUAH HATI</h4>
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
            <h4 class="text-uppercase m-0">Address</h4>
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
              <h4 class="text-uppercase m-0">Email</h4>
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
              <h4 class="text-uppercase m-0">Phone</h4>
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
<div hidden="true" id="site-url"><?= site_url('/') ?></div>
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/moment.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/tempusdominus-bootstrap-4.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax_daerah.js"></script>
  
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/dialogs.js"></script>
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
