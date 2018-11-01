<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Jadwal Berobat Pasien</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/gijgo.min.js" type="text/javascript"></script>
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
    <!-- Breadcrumbs-->

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Jadwal Berobat Pasien</div>
        <div class="card-body">
        </br>
        <?php if ($jadwal_berobat_pasien == NULL) {?>
        <label><b>Nama Pasien: </b> Belum ada jadwal yang dimasukkan </label>
        <?php } else{  foreach(array_slice($jadwal_berobat_pasien, 0,1) as $jb){ ?>
        <label><b>Nama Pasien: </b> <?php echo $jb->nama; ?> </label>
        <?php } } ?>
        <div class="table-responsive">
        </br>
        <table class="table table-bordered data" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
          <tr>
            <th>Minggu Ke</th>
            <th>Tanggal Berobat</th>
            <th>Status Berobat</th>
            <th>Alasan Terlambat</th>
            <th>Kestabilan Kondisi</th>
            <th>Aksi</th>
          </tr>
          <?php foreach($jadwal_berobat_pasien as $jb){ ?>
          <tr>
            <td><?php echo $jb->minggu_ke; ?></td>
            <?php if ($jb->tgl_berobat == NULL) { ?>
            <td> Belum ada jadwal </td>
            <td> - </td>
            <td> - </td>
            <td> - </td>
            <?php }else { ?>
            <td><?php echo date('d F Y', strtotime($jb->tgl_berobat)); ?></td>
            <?php if ($jb->status_berobat == 'terlambat') { ?>
            <td class="text-danger"><b><?php echo $jb->status_berobat; ?></b></td>
            <?php } else {?>
            <td class="text-success"><?php echo $jb->status_berobat; ?></td>
            <?php } ?>
            <td><?php if ($jb->alasan_terlambat == NULL && $jb->status_berobat == 'terlambat') { ?>
              <button class="btn btn-primary" data-toggle="modal" data-target="#form-alasan-<?php echo $jb->id_jadwal; ?>">Tambah Alasan</button>
              <?php  } else if ($jb->alasan_terlambat == NULL && $jb->status_berobat == 'tepat waktu') { ?>
              -
              <?php } else {
                echo $jb->alasan_terlambat;
              }  ?></td>
              <?php if ($jb->kestabilan_kondisi == 'turun' || $jb->kestabilan_kondisi == 'naik') { ?>
              <td class="text-danger"><b><?php echo $jb->kestabilan_kondisi; ?></b></td>
              <?php 
            } else { ?>
            <td class="text-success"><b><?php echo $jb->kestabilan_kondisi; ?></b></td>
            <?php  }
          } ?>
          <td><a href="<?php echo base_url('user_adm/ubah_jadwal_berobat/'); echo $jb->id_jadwal; ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
          <?php foreach($minggu_ke_sekian as $m){
            $minggu_akhir = $m->minggu_ke;
          }
          if ($jb->minggu_ke < $minggu_akhir) { ?>
            <button class="btn btn-sm btn-danger hapus" disabled=""><i class="fa fa-trash"></i></button></td>
          <?php } else { ?>
          <a href="<?php echo base_url('user_adm/hapus_data_jadwal_berobat/'); echo $jb->id_jadwal; ?>" class="btn btn-sm btn-danger hapus"><i class="fa fa-trash"></i></a></td>
          <?php } ?>
        </tr>
        <?php } ?>

        <?php foreach($jadwal_berobat_pasien as $jb){ ?>
        <div class="modal fade" id="form-alasan-<?php echo $jb->id_jadwal; ?>" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Alasan Terlambat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="<?php echo base_url('user_adm/simpan_alasan_terlambat/'); echo $jb->id_pasien;?>" method="POST">
                <div class="modal-body">
                  <div class="form-group">
                    <label>Masukkan Alasan Keterlambatan</label>
                    <input type="hidden" name="id_jadwal" value="<?php echo $jb->id_jadwal; ?>"> 
                    <select name="alasan_terlambat" class="form-control">
                      <option value="Alasan medis">Alasan medis</option>
                      <option value="alasan agenda orangtua">Alasan agenda orangtua</option>
                    </select>
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

        <?php } ?>
      </table>
      <form class="form-horizontal" action="<?php foreach($minggu_ke_sekian as $m){
        if ($m->minggu_ke == 1 && $m->tgl_berobat == NULL) { 
          echo base_url('user_adm/simpan_tgl_awal_berobat');
        } else {
          echo base_url('user_adm/simpan_jadwal_berobat');
        }?>" method="post" enctype="multipart/form-data" role="form">
        <br>
        <label><b>Tambah Jadwal Berobat</b></label></br>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <?php  
              if ($m->minggu_ke == 1 && $m->tgl_berobat == NULL) { ?>
              <label>Minggu Ke-  <b><?php echo $m->minggu_ke; ?></b> </label>
              <?php } else { ?>
              <label>Minggu Ke-  <b><?php echo $m->minggu_ke+1; ?></b> </label>
              <input type="hidden" name="minggu_ke" value="<?php echo  $m->minggu_ke+1 ; ?>">
              <?php }
            } ?>
            <?php foreach($jadwal_berobat_pasien as $jb){ ?>
            <input type="hidden" name="id_pasien" value="<?php echo $jb->id_pasien; ?>">
            <?php } ?>
            <div class="form-group row">
              <div class="col-md-7">
               <input id="datepicker" name="tgl_berobat_pasien" class="form-control datetimepicker-input">
             </div>
             </div>
             <?php foreach($minggu_ke_sekian as $m){
              if ($m->minggu_ke == 1 && $m->tgl_berobat == NULL) {  ?>
            <div class="form-group row">
              <div class="col-md-7">
                <label>Status Berobat</label>
                <select class="form-control flat" name="status_berobat">
                  <option value="tepat waktu"> Tepat Waktu</option>
                  <option value="terlambat"> Terlambat</option>
                </select>
              </div>
            </div>
              <?php  }
              } ?>
            <div class="form-group row">
              <div class="col-md-7">
                <label>Kestabilan Kondisi</label>
                <select class="form-control flat" name="kestabilan_kondisi">
                  <option value="stabil"> Stabil</option>
                  <option value="naik"> Naik</option>
                  <option value="turun"> Turun</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <input class="btn btn-success" type="submit" value="Simpan">
            <input class="btn btn-danger" type="reset" value="Reset">
            <a href="<?php echo base_url('user_adm/profil_pasien/'); echo $this->uri->segment(3); ?>" class="btn btn-primary">Kembali</a><br>
          </div>
        </div>
      </div>
    </form>
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

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>
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
<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>
</div>
</body>

</html>
