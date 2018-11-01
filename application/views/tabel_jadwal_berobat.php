<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','peter','abc123','my_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
	<table>
		<?php foreach($jadwal_berobat_pasien as $jb){ ?>
		<tr>
			<th>Nama Pasien</th>
		</tr>
		<tr>
			<td><?php echo $jb->nama; ?></td> 
		</tr>
		<?php } ?>
	</table>
</body>
</html>