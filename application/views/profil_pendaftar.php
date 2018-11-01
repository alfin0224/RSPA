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
    <!-- Breadcrumbs-->
    
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">Profil Pasien Pendaftar</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">

      <div class="card-header">

        <i class="fa fa-address-card"></i> Profil Pasien Pendaftar</div>
        <div class="card-body">
          <div class="table-responsive">
            <div class=" col-md-11 col-lg-11 "> 

              <table class="table table-user-information">
                <tbody>
                  <?php foreach($pendaftar as $p){ ?>
                    <tr>
                      <td>Nama Lengkap</td>
                      <td><h5><?php echo $p->nama; ?></h5></td>
                    </tr>
                    <tr>
                      <td>Tanggal Lahir</td>
                      <td><?php echo date('d F Y', strtotime($p->tgl_lahir)); ?></td>
                    </tr>
                    <tr>
                      <td>Umur</td>
                      <td><?php echo $p->umur; ?> Tahun</td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <td><?php echo "<span class='text-capitalize'>".$p->jenis_kelamin."</span>"; ?></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>
                        <?php echo "<span class='text-capitalize'>".$p->nama_kab."</span>"; ?>, <?php echo $p->nama_prov; ?></td>
                      </tr>
                      <tr>
                        <td>Nama Ayah Kandung</td>
                        <td><?php echo "<span class='text-capitalize'>".$p->nama_ayah."</span>"; ?></td>
                      </tr>
                      <tr>
                        <td>Nomor Telepon/HP</td>
                        <td><?php echo $p->no_telp; ?></td>
                      </tr>
                      <tr>
                        <td>Jenis Penyakit</td>
                        <td><?php echo $p->jenis_penyakit; ?></td>
                      </tr>
                      <tr>
                        <td>Fasilitas Kesehatan</td>
                        <td><?php echo $p->faskes; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Daftar</td>
                        <td><?php echo date('d F Y', strtotime($p->tgl_daftar)); ?></td>

                      </tr>
                      <?php $id=$p->id; } ?>
                      <tr>
                        <td></td><td></td>
                      </tr> 
                    </tbody>
                  </table>

                  <form class="form-horizontal" id="form-pendaftar" action="<?php echo base_url('user_adm/terima_pasien/'); echo $id;?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <?php                         
                          foreach ($kamar_penuh as $kp) {
                            foreach ($jml_semua_kamar as $j) {
                              if ($kp->total_penuh == $j->total_kamar) { ?>
                                <label>Daftar Kamar Tersedia</label>
                                <select class="form-control flat" name="kamar_tersedia">
                                  <option value="Tidak ada kamar yang tersedia"> Tidak ada kamar yang tersedia </option>
                                </select>
                                <?php   } else { ?>

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
                            <div class="form-row">
                              <div class="col-md-6">
                                <?php                         
                                foreach ($kamar_penuh as $kp) {
                                  foreach ($jml_semua_kamar as $j) {
                                    if ($kp->total_penuh == $j->total_kamar) { ?>
                                      <input class="btn btn-success" type="submit" value="Terima" disabled="disabled">
                                      <?php   } else { ?>
                                        <input class="btn btn-success terima_pasien" type="submit" value="Terima">
                                        <?php }
                                      }
                                    } ?>
                                  </form>
                                  <a href="<?php echo base_url('user_adm/tolak_pasien/'); echo $p->id; ?>" class="btn btn-danger tolak_pendaftar">Tolak</a>
                                  <a href="<?php echo base_url('user_adm/pasien_pendaftar'); ?>" class="btn btn-primary">Kembali</a><br>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer small text-muted"></div>
                    </div>
                  </div>

                  <div class="modal fade" id="form-tolak" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Alasan Ditolak</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="<?php echo base_url('user_adm/simpan_alasan_ditolak/'); echo $p->id;?>" method="POST">
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Pilih Alasan Ditolak : </label>
                              <div class="checkbox">
                                <label><input type="checkbox" name="alasan[]" value="Bukan Pasien Kanker">  Bukan Pasien Kanker </label>
                              </div>
                              <div class="checkbox">
                                <label><input type="checkbox" name="alasan[]" value="Bukan Pasien Anak">  Bukan Pasien Anak </label>
                              </div>
                              <div class="checkbox">
                                <label><input type="checkbox" name="alasan[]" value="Bukan BPJS Kelas 3 Maupun KIS">  Bukan BPJS Kelas 3 Maupun PBI </label>
                              </div>
                              <div class="checkbox">
                                <label><input type="checkbox" name="alasan[]" value="Kamar Penuh">  Kamar Penuh </label>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                          </div>
                        </form>
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
                  <!-- Page level plugin JavaScript-->
                  <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
                  <!-- Custom scripts for all pages-->
                  <script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>
                  <!-- Custom scripts for this page-->
                  <script src="<?php echo base_url(); ?>assets/js/sb-admin-charts.min.js"></script>
                </div>
              </body>

              </html>
