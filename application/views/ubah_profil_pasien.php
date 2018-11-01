<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Tambah Daftar Pasien</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax_daerah_ubah_profil.js"></script>
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
          foreach($biodata_pasien as $b){
            ?>
            <form id="form-ubah-profil-pasien" class="form-horizontal" action="<?php echo base_url('user_adm/simpan_ubah_profil_pasien')?>" method="post" enctype="multipart/form-data" role="form">
              <input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="nama_pasien">Nama Pasien</label>
                  <input class="form-control" name="nama_pasien" type="text" value="<?php echo $b->nama; ?>">
                </div>
                <div class="col-md-4">
                  <label for="tanggal_lahir">Tanggal Lahir</label>
                  <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker" name="tgl_lahir" value="<?php echo $b->tgl_lahir; ?>" />
                    <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-5">
                  <div style="border: 1px solid LightGray;padding:2%">
                    <label>Jenis Kelamin</label><br>
                    <input type="radio" name="jenis_kelamin" value="laki-laki"> <label>Laki-Laki</label> &nbsp;
                    <input type="radio" name="jenis_kelamin" value="perempuan"> <label>Perempuan</label><br>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10">
                    <label>Jenis Penyakit</label>
                    <select class="form-control flat" name="jenis_penyakit">
                      <option value="<?php echo $b->jenis_penyakit; ?>"><?php echo $b->jenis_penyakit; ?></option>
                      <option disabled="">------------------------------------------------------</option>
                      <option value="Kanker Darah"> Kanker Darah (Leukimia) </option>
                      <option value="Kanker Mata">Kanker Mata</option>
                      <option value="Kanker Kulit">Kanker Kulit</option>
                      <option value="Kanker Hati">Kanker Hati</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <label for="tanggal_lahir">Tanggal Butuh Inap</label>
                  <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="tgl_dibutuhkan" value="<?php echo $b->tgl_dibutuhkan; ?>" />
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10">
                    <label>Nomor KTP Ayah/Ibu</label>
                    <input class="form-control" name="no_ktp" type="text" value="<?php echo $b->no_ktp; ?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-10">
                    <label>Nama Ayah Kandung</label>
                    <input class="form-control" name="nama_ayah" type="text" value="<?php echo $b->nama_ayah; ?>">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-10">
                  <label>Nama Ibu Kandung</label>
                  <input class="form-control" name="nama_ibu" type="text" value="<?php echo $b->nama_ibu; ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-10">
                  <label>Pekerjaan Orangtua</label>
                  <input class="form-control" name="pekerjaan" type="text" value="<?php echo $b->pekerjaan_ortu; ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-10">
                  <label for="no_telp">Nomor telepon</label>
                  <input class="form-control" name="no_telp" type="text"  value="<?php echo $b->no_telp; ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-5">
                  <label>Provinsi</label>
                  <select class="form-control flat" name="prop" id="prop" onchange="ajaxkota(this.value)">
                    <option value="<?php echo $b->id_prov; ?>"><?php echo $b->nama_prov; ?></option>
                    <option value="" disabled="">----------------------------------------</option>
                    <?php 
                    foreach($provinsi as $data){ ?>
                    <option value="<?php echo $data->id_prov; ?>"><?php echo $data->nama_prov; ?></option>';
                    <?php  }
                    ?>
                  </select>
                </div>
                <div class="col-md-5" id="kab_box">
                  <label>Kabupaten/Kota</label>
                  <select class="form-control flat" name="kota" id="kota" onchange="ajaxkec(this.value)">
                    <option value="<?php echo $b->id_kab; ?>"><?php echo $b->nama_kab; ?></option>
                    <option value="" disabled="">----------------------------------------------</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-5" id="kec_box">
                  <label>Kecamatan</label>
                  <select class="form-control flat" name="kec" id="kec" onchange="ajaxkel(this.value)">
                    <option value="<?php echo $b->id_kec; ?>"><?php echo $b->nama_kec; ?></option>
                    <option disabled="">--------------------------------------------------</option>
                  </select>
                </div>
                <div class="col-md-5" id="kel_box">
                 <label>Kelurahan/Desa</label>
                 <select class="form-control flat" name="kel" id="kel">
                  <option value="<?php echo $b->id_kel; ?>"><?php echo $b->nama_kel; ?></option>
                  <option disabled="">----------------------------------------------</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-10">
                <label>Fasilitas Kesehatan</label>
                <select class="form-control flat" name="faskes">
                  <option value="<?php echo $b->faskes; ?>"><?php echo $b->faskes; ?></option>
                  <option disabled="">--------------------------------------------</option>
                  <option value="Kartu Indonesia Sehat">Kartu Indonesia Sehat</option>
                  <option value="BPJS Kelas 3"> BPJS kelas 3</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-10">
                <label for="nama_ortu">Nomor Kartu Faskes</label>
                <input class="form-control" name="no_kartu" type="text" value="<?php echo $b->no_kartu; ?>">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-3">
                <label>Foto Profil Pasien</label><br>
                <input type="file" name="foto_profil" accept="image/*">
              </div>
              <div class="col-md-3">
                <label>Foto KTP</label><br>
                <input type="file" name="foto_ktp" accept="image/*">
              </div>
              <div class="col-md-3">
                <label>Foto KK</label><br>
                <input type="file" name="foto_kk" accept="image/*">
              </div>
            </div>
            <script>
          //   var b = 1;
          //   $('#tambah-tanggal').click(function(){
          //     $('#tambah-tanggal').before('<div class="form-group row"><div class="col-md-5"><label>Tanggal Masuk</label><br><div class="input-group date" id="tgl_masuk'+b+'" data-target-input="nearest"><input type="text" class="form-control datetimepicker-input" data-target="#tgl_masuk'+b+'" name="tgl_masuk'+b+'" /><div class="input-group-append" data-target="#tgl_masuk'+b+'" data-toggle="datetimepicker"><div class="input-group-text"><i class="fa fa-calendar"></i></div></div></div></div><div class="col-md-5"><label>Tanggal Keluar</label><br><div class="input-group date" id="datetimepicker" data-target-input="nearest"><input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker" name="tgl_lahir'+b+'" /><div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker"><div class="input-group-text"><i class="fa fa-calendar"></i></div></div></div></div></div>');
          //     b++;
          //   });
// </script>
<input class="btn btn-success simpan_ubah_pasien" type="submit" value="Simpan">
<input class="btn btn-danger" type="reset" value="Reset">
<a href="<?php echo base_url('user_adm/profil_pasien/'); echo $b->id; ?>" class="btn btn-primary">Kembali</a><br>
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
  $(function () {
    $('#datetimepicker').datetimepicker({
      format: 'DD-MM-YYYY'
    });
  });
    $(function () {
    $('#datetimepicker1').datetimepicker({
      format: 'DD-MM-YYYY'
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

<script type="text/javascript">
  $('#sudahMenginap').on('change',function(){
    var pilihan = $('#sudahMenginap').val();
    if(pilihan == 'belum'){

    }else{

    }
  });
</script>
</div>
</body>

</html>
