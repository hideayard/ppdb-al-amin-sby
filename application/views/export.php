<!DOCTYPE html>
<html>
<head>
	<title>Export Data Excel</title>
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
			<th>Username</th>
			<th>Password</th>
			<th>Nama</th>
			<th>Panggilan</th>
			<?php if(intval($level) + 3 == 6):?>
			<th>Jurusan</th>
			<?php endif;?>
			<?php if(intval($level) + 3 == 5):?>
			<th>Gelombang</th>
			<?php endif;?>
			<th>NISN</th>
			<th>Cita-cita</th>
			<th>Hobi</th>
			<th>Alamat Domisili</th>
			<th>Kelurahan</th>
			<th>Kecamatan</th>
			<th>Kabupaten</th>
			<th>Rt / Rw</th>
			<th>Tempat - Tanggal Lahir</th>
			<th>Agama</th>
			<th>Jenis Kelamin</th>
			<th>No. HP</th>
			<th>Nama Ayah</th>
			<th>Nama Ibu</th>
			<th>Nama Wali</th>
			<th>No. Akta Kelahiran</th>
			<th>Status Anak</th>
			<th>Kegemaran Siswa</th>
			<th>Berat Badan - Tinggi Badan</th>
			<th>Golongan darah</th>
			<th>Tempat / Tanggal Lahir Ayah</th>
			<th>Pekerjaan Ayah</th>
			<th>Agama Ayah</th>
			<th>Penghasilan Ayah</th>
			<th>Tempat / Tanggal Lahir Ibu</th>
			<th>Pekerjaan Ibu</th>
			<th>Agama Ibu</th>
			<th>Penghasilan Ibu</th>
			<th>No. Telp Ayah</th>
			<th>No. Telp Ibu</th>
			<th>Pekerjaan Wali</th>
			<th>Alamat Wali</th>
			<th>Hubungan Siswa dengan Wali</th>
			<th>No. Telp Wali</th>
			<th>No. Kartu Keluarga</th>
			<th>NIK</th>
			<th>Kewarganegaraan</th>
			<th>Jumlah Saudara Kandung</th>
			<th>Jumlah Saudara Tiri</th>
			<th>Jumlah Saudara Angkat</th>
			<th>Asal Sekolah</th>
			<th>Bahasa Seharian</th>
			<th>Alamat KK</th>
			<th>RT / RW KK</th>
			<th>Kelurahan KK</th>
			<th>Kecamatan KK</th>
			<th>Kabupaten / Kota KK</th>
			<th>Kode Pos</th>
			<th>Kode Pos KK</th>
			<th>Status Tinggal</th>
			<th>Jarak Ke Sekolah</th>
			<th>Lama Belajar</th>
			<th>Riwayat Penyakit</th>
			<th>Kelainan Jasmani</th>
			<th>Alamat Ayah</th>
			<th>Alamat Ibu</th>
			<th>Pendidikan Ayah</th>
			<th>Pendidikan Ibu</th>
			<th>Pindahan Dari</th>
			<th>Alasan Pindah</th>
			<th>Anak ke</th>
			<th>Validasi</th>
			<th>Verifikasi</th>
			<th>Status Diterima</th>
		</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach($pendaftar as $p) :?>
				<tr>
					<td><?= $no++;?></td>
					<td><?= $p['username'] ?></td>
					<td><?=$p['password']?></td>
					<td><?= $p['nama']?></td>
					<td><?= $p['panggilan']?></td>
					<?php if($p['level'] == '6'):?>
					<td><?= $p['jurusan']?></td>
					<?php endif;?>
					<?php if($p['level'] == '5'):?>
					<td><?= $p['gelombang']?></td>
					<?php endif;?>
					<td><?= $p['nisn']?></td>
					<td><?= $p['citacita']?></td>
					<td><?= $p['hobi']?></td>
					<td><?= $p['alamat']?></td>
					<td><?= $p['kelurahan']?></td>
					<td><?= $p['kecamatan']?></td>
					<td><?= $p['kabupaten']?></td>
					<td><?= $p['rt']?> , <?= $p['rw']?></td>
					<td><?= $p['tempatlahir']?> / <?= $p['tanggallahir']?></td>
					<td><?= $p['agama']?></td>
					<td><?= $p['kelamin']?></td>
					<td><?= $p['no_hp']?></td>
					<td><?= $p['namaayah']?></td>
					<td><?= $p['namaibu']?></td>
					<td><?= $p['namawali']?></td>
					<td><?= $p['noakta']?></td>
					<td><?= $p['statusanak']?></td>
					<td><?= $p['kegemaransiswa']?></td>
					<td><?= $p['beratbadan']?>kg / <?= $p['tinggibadan']?>cm</td>
					<td><?= $p['golongandarah']?></td>
					<td><?= $p['tempatlahirayah']?> / <?= $p['tanggallahirayah']?></td>
					<td><?= $p['pekerjaanayah']?></td>
					<td><?= $p['agamaayah']?></td>
					<td><?= $p['penghasilanayah']?></td>
					<td><?= $p['tempatlahiribu']?> / <?= $p['tanggallahiribu']?></td>
					<td><?= $p['pekerjaanibu']?></td>
					<td><?= $p['agamaibu']?></td>
					<td><?= $p['penghasilanibu']?></td>
					<td><?= $p['notelayah']?></td>
					<td><?= $p['notelibu']?></td>
					<td><?= $p['pekerjaanwali']?></td>
					<td><?= $p['alamatwali']?></td>
					<td><?= $p['hubunganwali']?></td>
					<td><?= $p['notelwali']?></td>
					<td><?= $p['nokk']?></td>
					<td><?= $p['nik']?></td>
					<td><?= $p['kewarganegaraan']?></td>
					<td><?= $p['jumlahsaudarakandung']?></td>
					<td><?= $p['jumlahsaudaratiri']?></td>
					<td><?= $p['jumlahsaudaraangkat']?></td>
					<td><?= $p['asalsekolah']?></td>
					<td><?= $p['bahasa']?></td>
					<td><?= $p['alamatkk']?></td>
					<td><?= $p['rtkk']?> , <?= $p['rwkk']?></td>
					<td><?= $p['kelurahankk']?></td>
					<td><?= $p['kecamatankk']?></td>
					<td><?= $p['kabupatenkk']?></td>
					<td><?= $p['kodepos']?></td>
					<td><?= $p['kodeposkk']?></td>
					<td><?= $p['statustinggal']?></td>
					<td><?= $p['jaraksekolah']?></td>
					<td><?= $p['lamabelajar']?></td>
					<td><?= $p['riwayatpenyakit']?></td>
					<td><?= $p['kelainanjasmani']?></td>
					<td><?= $p['alamatayah']?></td>
					<td><?= $p['alamatibu']?></td>
					<td><?= $p['pendidikanayah']?></td>
					<td><?= $p['pendidikanibu']?></td>
					<td><?= $p['pindahan']?></td>
					<td><?= $p['alasanpindah']?></td>
					<td><?= $p['anakke']?></td>
					<td><?= $p['validasi']?></td>
					<td><?= $p['verifikasi']?></td>
					<td><?= $p['diterima']?></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</body>
</html>