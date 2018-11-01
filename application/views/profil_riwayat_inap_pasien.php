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
  <!-- SweetAlert -->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/sweetalert/sweetalert.css'); ?>">
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/dialogs.js"></script>
  <style>
    .tooltip-inap-lagi {
      position: relative;
      display: inline-block;
      word-break: normal;
      word-spacing: normal;
      white-space: normal;
      line-break: auto;
      font-size: .875rem;
      word-wrap: break-word;

    }

    .tooltip-inap-lagi-text {
      visibility: hidden;
      width: 150px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;
      position: absolute;
      z-index: 1;
      left: -40px;
      top: 40px;
    }

    .tooltip-inap-lagi:hover .tooltip-inap-lagi-text {
      visibility: visible;
    }
  </style>
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

        <i class="fa fa-address-card"></i> Profil Riwayat Pasien Keluar</div>
        <div class="card-body">
          <div class="row">
            <div class="col-xs-9 col-sm-9 col-lg-10">
              <div class="table-responsive">
                <table class="table table-user-information">
                  <tbody>
                    <?php foreach($pasien_keluar as $p){ ?>
                    <tr>
                      <td><b>Nama Lengkap  </b></td>
                      <td><h5><?php echo $p->nama; ?></h5></td>
                    </tr>
                    <tr>
                      <td><b>Tanggal Lahir  </b></td>
                      <td><?php echo date('d F Y', strtotime($p->tgl_lahir)); ?></td>
                    </tr>
                    <tr>
                      <td><b>Umur  </b></td>
                      <td><?php echo $p->umur; ?> Tahun</td>
                    </tr>
                    <tr>
                      <td><b>Jenis Kelamin  </b></td>
                      <td><?php echo $p->jenis_kelamin; ?></td>
                    </tr>
                    <tr>
                      <td><b>Alamat Lengkap </b></td>
                      <td><?php echo $p->nama_kel; ?>, <?php echo $p->nama_kec; ?>, <?php echo $p->nama_kab ?>, <?php echo $p->nama_prov; ?></td>
                    </tr>
                    <tr>
                      <td><b>Nama Ayah Kandung  </b></td>
                      <td><?php echo $p->nama_ayah; ?></td>
                    </tr>
                    <tr>
                      <td><b>Nama Ibu Kandung  </b></td>
                      <td><?php echo $p->nama_ibu; ?></td>
                    </tr>
                    <tr>
                      <td><b>Nomor Telepon/HP </b></td>
                      <td><?php echo $p->no_telp; ?></td>
                    </tr>
                    <tr>
                      <td><b>Jenis Penyakit </b></td>
                      <td><?php echo $p->jenis_penyakit; ?></td>
                    </tr>
                    <tr>
                      <td><b>Fasilitas Kesehatan </b></td>
                      <td><?php echo $p->faskes; ?></td>
                    </tr>
                    <tr>
                      <td><b>Tanggal Daftar </b></td>
                      <td><?php echo date('d F Y', strtotime($p->tgl_daftar)); ?></td>
                    </tr>
                    <tr>
                      <td><b>Status Saat Ini </b></td>
                      <td><b><?php echo $p->status; ?></b></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td></tr>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>

              </div>
            </div>
            <div class="col-xs-6 col-sm-5 col-lg-5"> 
              <div class="table-responsive">
                <label>Tabel Daftar Riwayat Inap Pasien</label>
                <table class="table table-bordered" style="text-align:center">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Masuk</th>
                      <th>Tanggal Keluar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $nomer=0; ?>
                    <?php foreach($riwayat_inap as $r){ ?>
                    <tr>
                      <td><?php $nomer++; echo $nomer;  ?></td>
                      <td><?php echo date('d F Y', strtotime($r->tgl_masuk)); ?></td>
                      <td><?php echo date('d F Y', strtotime($r->tgl_keluar)); ?></td>

                    </tr>

                    <?php } ?><br>
                  </tbody>
                </table>
              </div>
            </div>
            
            <div class="col-xs-10 col-sm-11 col-lg-9"> 
             <form class="form-horizontal" id="form-inap-lagi" action="<?php echo base_url('user_adm/pasien_inap_lagi/'); echo $p->id_pasien; ?>" method="post" enctype="multipart/form-data" role="form">
              <?php 
              foreach ($kamar_penuh as $kp) {
                foreach ($jml_semua_kamar as $j) {
                  if ($kp->total_penuh == $j->total_kamar) { ?>
                  <label>Daftar Kamar Tersedia</label>
                  <select class="form-control flat" name="kamar_tersedia">
                    <option value="Tidak ada kamar yang tersedia"> Tidak ada kamar yang tersedia </option>
                  </select>
                  <?php } else { ?>
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6">
                        <label>Daftar Kamar Tersedia</label>
                        <select class="form-control flat" name="kamar_tersedia">
                          <?php 
                          foreach($kamar as $k){ ?>
                          <option value="<?php $id_kamar = $k->id_kamar; echo $id_kamar; ?>"> <?php echo $k->nama_kamar; ?> </option>
                          <?php } ?>
                        </select>
                        <?php }
                      }
                    } ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-7">
                  <?php                         
                  foreach ($kamar_penuh as $kp) {
                    foreach ($jml_semua_kamar as $j) {
                      if ($p->status == 'diterima' OR $kp->total_penuh == $j->total_kamar) { ?>
                      <button class="btn btn-success tooltip-inap-lagi" type="submit" value="Inap Lagi" disabled="disabled"> Inap Lagi
                        <span class="tooltip-inap-lagi-text">Belum bisa inap lagi karena status pasien masih menginap</span>
                      </button> 
                      <?php   } else { ?>
                      <input class="btn btn-success pasien_inap_lagi" type="submit" value="Inap Lagi">
                      <?php }
                    }
                  } ?>
                </form>
                <a href="<?php echo base_url('user_adm/riwayat_inap_pasien'); ?>" class="btn btn-primary">Kembali</a><br>
              </div>
            </div>
          </div>
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
</div>
</body>

</html>
