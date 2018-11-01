<!DOCTYPE html>
<html>
<head>
	<title>CHART</title>
</head>
<body>
	<canvas id="myChart"></canvas>
</body>

<script src="<?php echo base_url(); ?>assets/js/Chart.js"></script>
<script type="text/javascript">

	var labels = <?php echo $labels ?>;
	var values = <?php echo $values ?>;

	window.onload = function() {
	var ctx = document.getElementById("myChart");
	var lineChart = new Chart(ctx, {
	type: 'bar',
	data: {
	  labels: labels,
	  datasets: [{
	    label: "2015",
	    data: values
	  }]
	}
	})
	}
</script>
</html>