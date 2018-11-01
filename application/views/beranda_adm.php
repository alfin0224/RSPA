<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Beranda Admin</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/Chart.js"></script>

</head>
<?php 
$wils = array();
foreach ($statistik_pasien as $s) {
  array_push($wils, $s->nama_kab);
} 

$jml_kab = array();

foreach ($jml_kab_pasien as $j) {
  array_push($jml_kab, $j->jml_kab_pasien);
}
$tot_kab = array();

foreach ($total_kab as $t) {
  array_push($tot_kab, $t->total_kab);
}
$kamar = array();
$kuota = array();
foreach ($kamar_RSPA as $k) {
  array_push($kamar, $k->nama_kamar);
  array_push($kuota, $k->sisa_kuota_kamar);
} 

$jml_penyakit = array();
foreach ($count_penyakit as $jp) {
  array_push($jml_penyakit, $jp->jml_penyakit);
} 
$nama_penyakit = array();
foreach ($nama_penyakit_pasien as $np) {
  array_push($nama_penyakit, 'Pasien '.$np->jenis_penyakit);

} 

foreach ($m_penyakit as $mp) {
  $maks_penyakit = $mp->maks_penyakit;

} 
foreach ($maks_wil_pasien as $mwp) {
  $maks_kab = $mwp->maks_kab;

} 
          // var_dump($nama_penyakit);
          // var_dump($maks_penyakit); exit(o);
?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">

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
      <div class="col-lg-12">
        <!-- Example Bar Chart Card-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-bar-chart"></i> Statistik Jumlah Pasien Sedang Inap Berdasarkan Jenis Penyakit</div>
            <div class="card-body">
              <div class="row">
                <canvas id="myChart" width="100" height="50"></canvas>
              </div>
            </div>
            <div class="card-footer small text-muted"></div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-7">
            <!-- Example Pie Chart Card-->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i> Statistik Jumlah Pasien Sedang Inap Dan Telah Keluar Berdasarkan Daerahnya</div>
                <div class="card-body">
                  <canvas id="wilayahPasienChart" width="100%" height="70"></canvas>
                </div>
                <div class="card-footer small text-muted"></div>
              </div>
            </div>
            <div class="col-lg-5">
              <!-- Example Pie Chart Card-->
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-pie-chart"></i> Kuota Kamar Tersedia</div>
                  <div class="card-body">
                    <canvas id="myPieChart" width="100%" height="103"></canvas>
                  </div>
                  <div class="card-footer small text-muted"></div>
                </div>
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
        <script type="text/javascript">

          var labels = <?php echo json_encode($wils); ?>;
          var values = <?php echo json_encode($jml_kab); ?>;
          var total_warna = <?php echo json_encode($tot_kab); ?>;
          var kamar = <?php echo json_encode($kamar); ?>;
          var kuota = <?php echo json_encode($kuota); ?>;
          var jml_penyakit = <?php echo json_encode($jml_penyakit); ?>;
          var nama_penyakit = <?php echo json_encode($nama_penyakit); ?>;
          var maks_penyakit = parseInt( <?php echo json_encode($maks_penyakit); ?>);
          var maks_kab = parseInt( <?php echo json_encode($maks_kab); ?>);

          function getRandomColorHex() {
            var hex = "0123456789ABCDEF",
            color = "#";
            for (var i = 1; i <= 6; i++) {
              color += hex[Math.floor(Math.random() * 16)];
            }
            return color;
          }

          function getDiffColor(){
            var i;
            for (i = 1; i <= total_warna; i++) { 
             if (i < total_warna) {
               diffColor = getRandomColorHex() + ",";
             }else{
              diffColor = getRandomColorHex()
            };
          }
          return diffColor;
        }

        window.onload = function() {
          var ctx = document.getElementById("myChart");
          var lineChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: nama_penyakit,
              datasets: [{
                label: "Jumlah Pasien",
                backgroundColor: [
                getRandomColorHex(),
                getRandomColorHex(),
                getRandomColorHex(),
                getRandomColorHex(),
                getRandomColorHex(),
                getRandomColorHex(),
                getRandomColorHex(),
                getRandomColorHex(),
                getRandomColorHex(),
                getRandomColorHex(),
                getRandomColorHex(),
                getRandomColorHex(),
                getRandomColorHex(),
                getRandomColorHex(),
                getRandomColorHex(),
                getRandomColorHex()
                ],
                borderColor: 'rgb(150, 200, 100)',
                data: jml_penyakit
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    min: 0,
                    max: maks_penyakit
                  },
                  gridLines: {
                    display: true
                  }
                }]
              },
              legend: {
                display: false,
                usePointStyle: true
              },
              tooltips: {
                callbacks: {
                 label: function(tooltipItem) {
                  return tooltipItem.yLabel;
                }
              }
            }
          }
        })
}

var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: kamar,
    datasets: [{
      data: kuota,
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
    }],
  },
  options: {
    legend: {
      display: true,
      position: 'right'
    }
  }
});

var ctx = document.getElementById("wilayahPasienChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: labels,
    datasets: [{
      data: values,
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
    }],
  },
  options: {
    legend: {
      display: true,
      position: 'right'
    }
  }
});
</script>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->

</body>
</html>
