<!DOCTYPE html>
<html>
<head>
	<title>Export Data Pendaftar Excel</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Export.xls");
	
	$level = $this->session->userdata('level');
	switch ($level) {
		case 1: 
		$judul = 'SDI Kyai Amin Surabaya';
		break;
		case 2:
		$judul = 'SMP AL-AMIN SURABAYA';
		break;
		case 3:
		$judul = 'SMK AL-AMIN SURABAYA';
	}
	
	?>
 
	<center>
		<h1>Data Pendaftar <?= $judul?></h1>
	</center>
 
	<table border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Username</th>
			<?php if(intval($level) == 3):?>
			<th>Jurusan</th>
			<?php endif;?>
			<?php if(intval($level) == 2):?>
			<th>Gelombang</th>
			<?php endif;?>
			<th>Password</th>
			<th>Asal Sekolah</th>
		</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach($pendaftar as $p) :?>
				<tr>
					<td><?= $no++;?></td>
					<td><?= $p['nama']?></td>
					<td><?= $p['username'] ?></td>
					<?php if($p['level'] == '6'):?>
					<td><?= $p['jurusan'] ?: '-'?></td>
					<?php endif;?>
					<?php if($p['level'] == '5'):?>
					<td><?= $p['gelombang']?></td>
					<?php endif;?>
					<td><?=$p['password']?></td>
					<td><?=$p['asalsekolah']?></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</body>
</html>