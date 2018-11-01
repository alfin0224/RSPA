<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Profil Pasien</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
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

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-address-card"></i> Profil Pasien</div>
        <div class="card-body">
          <div class="table-responsive">
            <?php foreach($biodata_pasien as $ft){ ?>
            <div class="col-xs-2 col-sm-2 col-lg-3" align="center"> <br><img alt="User Pic" src="<?php echo base_url(); ?>assets/img/<?php echo $ft->foto_profil ?>" width="100%" height="200%" class="img-circle img-responsive" ></div>
            <div class="col-xs-9 col-sm-9 col-lg-9" style="margin-top:3%;" align="right">  <a href="<?php echo base_url('user_adm/jadwal_berobat_pasien/'); echo $ft->id; ?>" class="btn btn-success">Jadwal Berobat Pasien</a></div>
            <?php } ?>
            <div class=" col-md-11 col-lg-11 "> 
              <table class="table table-user-information">
                <tbody>
                  <?php foreach($biodata_pasien as $b){ ?>
                  <tr>
                    <td>Nama Lengkap</td>
                    <td><h5><?php echo $b->nama; ?></h5></td>
                  </tr>
                  <tr>
                    <td>Tanggal Lahir</td>
                    <td><?php echo date('d F Y', strtotime($b->tgl_lahir)); ?></td>
                  </tr>
                  <tr>
                    <td>Umur</td>
                    <td><?php echo $b->umur; ?> Tahun</td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td><?php echo $b->jenis_kelamin; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Butuh Inap</td>
                    <td><?php echo date('d F Y', strtotime($b->tgl_dibutuhkan)); ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td> <?php 
                     if ($b->id_kel == NULL) {
                       echo "<span class='text-danger'>Kelurahan belum dimasukkan</span>,";
                     } else {
                      foreach ($kelurahan as $kel) {

                       echo $kel->nama_kel; 
                     }
                   } ?>
                   <?php 
                   if ($b->id_kec == NULL) {
                    echo "<span class='text-danger'>Kecamatan belum dimasukkan/span>,";
                   } else {
                     foreach ($kecamatan as $kec) {
                      echo $kec->nama_kec; 
                    }
                  } ?>
                  <?php echo $b->nama_kab ?>, <?php echo $b->nama_prov; ?></td>
                </tr>
                <tr>
                  <td>Nomor KTP Ayah/Ibu</td>
                  <td><?php 
                   if ($b->no_ktp == NULL) {
                    echo "<span class='text-danger'>belum dimasukkan</span>";
                  } else {
                    echo $b->no_ktp;
                  } ?></td>
                </tr>
                <tr>
                  <td>Nama Ayah Kandung</td>
                  <td><?php echo $b->nama_ayah; ?></td>
                </tr>
                <tr>
                  <td>Nama Ibu Kandung</td>
                  <td><?php echo $b->nama_ibu; ?></td>
                </tr>
                <tr>
                  <td>Pekerjaan Orangtua</td>
                  <td><?php 
                   if ($b->pekerjaan_ortu == NULL) {
                    echo "<span class='text-danger'>belum dimasukkan</span>";
                  } else {
                    echo $b->pekerjaan_ortu; 
                  }
                  ?></td>
                </tr>
                <tr>
                  <td>Nomor Telepon/HP</td>
                  <td><?php echo $b->no_telp; ?></td>
                </tr>
                <tr>
                  <td>Jenis Penyakit</td>
                  <td><?php echo $b->jenis_penyakit; ?></td>
                </tr>
                <tr>
                  <td>Fasilitas Kesehatan</td>
                  <td><?php echo $b->faskes; ?></td>
                </tr>
                <tr>
                  <td>Nomor Faskes</td>
                  <td><?php echo $b->no_kartu; ?></td>
                </tr>
                <tr>
                  <td>Tanggal Daftar</td>
                  <td><?php echo date('d F Y', strtotime($b->tgl_daftar)); ?></td>
                </tr><br>
                <tr>
                  <td></td><td></td></tr>

                </tr>
                <?php } ?>
              </tbody>
            </table>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-3" align="center">
                  <img alt="User Pic" src="<?php echo base_url(); ?>assets/img/<?php echo $b->foto_kk ?>" width="100%" height="100%" class="img-circle img-responsive" >
                  <a href="#">Foto KK</a>
                </div>
                <div class="col-md-3" align="center">
                  <img alt="User Pic" src="<?php echo base_url(); ?>assets/img/<?php echo $b->foto_ktp ?>" width="100%" height="100%" class="img-circle img-responsive" >
                  <a href="#">Foto KTP</a>
                </div>
              </div>
            </div><br>
            <a href="<?php echo base_url('user_adm/ubah_profil_pasien/'); echo $b->id; ?>" class="btn btn-warning">Ubah Profil Pasien</a>
            <a href="<?php echo base_url('user_adm/pasien'); ?>" class="btn btn-primary">Kembali</a><br>
          </div>
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
