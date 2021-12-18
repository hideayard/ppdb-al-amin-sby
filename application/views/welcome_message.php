<?php 
$total = $um->total();
$diterima = $um->diterima();
$id = $this->session->userdata('id');
if ($this->session->userdata('authenticated')) {
	$value = $this->session->userdata('level');
}

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
<header>
<nav class="navbar navbar-expand-lg navbar-dark shadow bg-dark">
<div class="container">
  <a class="navbar-brand d-flex align-item-center" href="<?= intval($this->session->userdata('level')) > 3 ? base_url('Pendaftaran') : base_url() ?>">
  <img src="<?= base_url()?>/assets/img/yysn.png" alt="yayasan al amin surabaya" style="width: 30px; height:30px;" alt="" class="mr-2 rounded-lg">
	<bold>PPDB AL-AMIN 2021</bold>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto text-center">
	<?php $level = $this->session->userdata('level');
		if (intval($level) > 3) {?>
		<li class="nav-item active">
			<a class="nav-link" href="<?= base_url('Pendaftaran/Formulir')?>"><?= $this->session->userdata('formulir') !== 'sudah' ? 'Isi Formulir' : 'Ubah Data Formulir'?></a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href data-toggle="modal" data-target="#modalstatus">Cek Status Pendaftaran</a>
		</li>
    		 <?php if($this->session->userdata('formulir') === 'sudah') { ?>
        		<li class="nav-item active">
        			<a class="nav-link" href="<?= base_url('Pendaftaran/Cetak/'.$id)?>">Cetak Formulir Pendaftaran</a>
        		</li>
        	<?php } ?>
		<?php }?>
		<?php if($this->session->userdata('authenticated') && intval($level) < 4) {?>
				<li class="nav-item active">
			<a class="nav-link" href="<?= base_url('Operator')?>">Dashboard</a>
		</li>
		<?php }?>
      <li class="nav-item active">
            <?php if (!$this->session->userdata('authenticated')) { ?>
                <a class="btn ml-auto btn-outline-primary text-white px-4" href="<?= base_url('Login')?>">Login</a>	
            <?php } ?>
            <?php if ($this->session->userdata('authenticated')) { ?>
                <a class="btn ml-auto btn-outline-danger text-white px-4" href="<?= base_url('Login/logout')?>">Logout</a>	
            <?php } ?>
      </li>
    </ul>
  </div>
  </div>
</nav>
</header>

<div class="fade modal" id="modalAlur" tabindex="-1" role="dialog" aria-labelledby="modalAlur1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAlur1">Alur Pendaftaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <img src="<?= base_url()?>/assets/img/alur-calon.jpeg" alt="alur pendaftaran Al Amin Surabaya" class="img-fluid" srcset="">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalinfosmp" tabindex="-1" role="dialog" aria-labelledby="modalinfo1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalinfo1">Informasi SMP Al Amin Surabaya</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <img src="<?= base_url()?>/assets/img/infosmp.jpeg" alt="Informasi pendaftaran Al Amin Surabaya" class="img-fluid" srcset="">
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalinfosmk" tabindex="-1" role="dialog" aria-labelledby="modalinfo2" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalinfo2">Informasi SMK Al Amin Surabaya</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <img src="<?= base_url()?>/assets/img/infosmk.jpeg" alt="Informasi pendaftaran Al Amin Surabaya" class="img-fluid" srcset="">
      </div>
    </div>
  </div>
</div>

 <div class="modal fade" id="modalstatus" tabindex="-1" role="dialog" aria-labelledby="modalstatus" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-left">
                    <h4 class="modal-title h5 font-weight-normal" id="exampleModalLabel">Status Pendaftaran Calon Siswa <br><?php
						if($value == 4){
						echo 'SDI KYAI AMIN';
						} elseif($value == 5){
						echo 'SMP AL-AMIN SURABAYA';
						} else {
						echo 'SMK AL-AMIN SURABAYA';
						}
						?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<table>
						<tbody class="text-left">
							<tr>
								<th>No Pendaftaran</th>
								<td><?= $datapendaftar->username?></td>
							</tr>
							<tr>
								<th>Pendaftaran</th>
								<td>
									<?php 
									if($value == 4){
						echo 'SDI KYAI AMIN';
						} elseif($value == 5){
						echo 'SMP AL-AMIN SURABAYA';
						} else {
						echo 'SMK AL-AMIN SURABAYA';
						}
									?>
								</td>
							</tr>
							<?php if($value == 6) { ?>
							<tr>
								<th>Jurusan</th>
								<td><?= $datapendaftar->jurusan ?? '' ?></td>
							</tr>
							<?php }?>
							<?php if($value == 5) { ?>
							<tr>
								<th>Gelombang</th>
								<td><?= $datapendaftar->gelombang?></td>
							</tr>
							<?php }?>
							<tr>
								<th>Pengisian Formulir</th>
								<td><?= $datapendaftar->statusformulir === 'sudah' ? '<span class="badge badge-pill badge-success"><i class="fa fa-check mr-2"></i>Sudah</span>' : '<span class="badge badge-pill badge-danger"><i class="fas fa-ban mr-2"></i>Belum</span>' ?></td>
							</tr>
							<tr>
								<th>Status Pendaftaran</th>
								<td><?= $datapendaftar->statusformulir === 'sudah' && $datapendaftar->verifikasi == true ? '<span class="badge badge-pill badge-success"><i class="fa fa-check mr-2"></i>Lolos</span>' : '<span class="badge badge-pill badge-info"><i class="fa fa-info mr-2"></i>Dalam Proses</span>'?></td>
							</tr>
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>


<main role="main">
<section class="jumbotron text-center" style="margin-bottom:0">
<div class="container">
	<?php if($this->session->flashdata('peringatan')) {?>
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Maaf!</strong> <?= $this->session->flashdata('peringatan')?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
     </div>
    <?php } ?>
	<img src="<?= base_url()?>/assets/img/yysn.png" style="width: 150px" class="my-4 img-fluid	" alt="">
	<h1 class="jumbotron-heading">PPDB AL-AMIN SURABAYA</h1>
	<p class="lead text-muted">Tahun Ajaran 2021 / 2022</p>
</div>
</section>
<div class="album py-5" id="informasi">
	<div class="container py-2">
		<h1 class="text-center">Informasi Pendaftaran</h1>
		<h5 class="text-center my-3 mb-5">PPDB AL-AMIN SURABAYA TAHUN AJARAN 2021 / 2022</h5>
		<div class="row justify-content-center">
			<div class="col-md-6 col-sm-12">
			<div class="card mb-4 shadow rounded-lg">
			<img src="<?= base_url('assets/img/bg-smp.png')?>" alt="" class="card-img-top">
			<div class="card-body">
				<h5 class="card-title text-center">Sekolah Menengah Pertama</h5>
				<ul class="list-group list-group-flush text-left border">
					<li class="list-group-item text-center bg-primary text-white">Jadwal Pendaftaran : Gelombang 1</li>
					<li class="list-group-item">Pembukaan : <span class="float-right font-weight-bold"><?php $date= strtotime($isian[1]['tanggalbuka']); $date = tgl_indo(date('Y-m-d', $date)); echo $date; ?><span/></li>
					<li class="list-group-item">Penutupan : <span class="float-right font-weight-bold"><?php $date= strtotime($isian[1]['tanggaltutup']); $date = tgl_indo(date('Y-m-d', $date)); echo $date; ?><span/></li>
					<li class="list-group-item">Tanggal Tes : <span class="float-right font-weight-bold"><?php $date= strtotime($isian[1]['tanggaltes']); $date = tgl_indo(date('Y-m-d', $date)); echo $date; ?><span/></li>
					<li class="list-group-item">Pengumuman Hasil Tes : <span class="float-right font-weight-bold"><?php $date= strtotime($isian[1]['pengumumanhasiltes']); $date = tgl_indo(date('Y-m-d', $date)); echo $date; ?><span/></li>
				</ul>
				<br>
				<ul class="list-group list-group-flush text-left border">
					<li class="list-group-item text-center bg-info text-white">Jadwal Pendaftaran : Gelombang 2</li>
					<li class="list-group-item">Pembukaan : <span class="float-right font-weight-bold"><?php $date= strtotime($isian[2]['tanggalbuka']); $date = tgl_indo(date('Y-m-d', $date)); echo $date; ?><span/></li>
					<li class="list-group-item">Penutupan : <span class="float-right font-weight-bold"><?php $date= strtotime($isian[2]['tanggaltutup']); $date = tgl_indo(date('Y-m-d', $date)); echo $date; ?><span/></li>
					<li class="list-group-item">Tanggal Tes : <span class="float-right font-weight-bold"><?php $date= strtotime($isian[2]['tanggaltes']); $date = tgl_indo(date('Y-m-d', $date)); echo $date; ?><span/></li>
					<li class="list-group-item">Pengumuman Hasil Tes : <span class="float-right font-weight-bold"><?php $date= strtotime($isian[2]['pengumumanhasiltes']); $date = tgl_indo(date('Y-m-d', $date)); echo $date; ?><span/></li>
				</ul>
				<div class="text-center">
				<a style="text-decoration: none" class="btn btn-sm my-3 btn-outline-dark" href data-toggle="modal" data-target="#modalAlur">Alur Pendaftaran</a>
				<a style="text-decoration: none" class="btn btn-sm my-3 btn-outline-dark" href data-toggle="modal" data-target="#modalinfosmp">Informasi</a>
				<!-- <button class="btn btn-sm btn-outline-dark my-3">Informasi</button> -->
				</div>
			</div>
			</div></div>
			<div class="col-md-6 col-sm-12">
			<div class="card mb-4 shadow rounded-lg">
			<img src="<?= base_url('assets/img/bg-smk.png')?>" alt="" class="card-img-top">
			<div class="card-body">
				<h5 class="card-title text-center">Sekolah Menengah Kejuruan</h5>
				<ul class="list-group list-group-flush text-left border">
					<li class="list-group-item text-center bg-secondary text-white">Jadwal Pendaftaran</li>
					<li class="list-group-item">Pembukaan : <span class="float-right font-weight-bold"><?php $date= strtotime($isian[3]['tanggalbuka']); $date = tgl_indo(date('Y-m-d', $date)); echo $date; ?><span/></li>
					<li class="list-group-item">Penutupan : <span class="float-right font-weight-bold"><?php $date= strtotime($isian[3]['tanggaltutup']); $date = tgl_indo(date('Y-m-d', $date)); echo $date; ?><span/></li>
				</ul>
				<div class="text-center">
				<!-- <button class="btn btn-sm my-3 btn-outline-dark"> -->
				<!--<a style="text-decoration: none" class="btn btn-sm my-3 btn-outline-dark" href data-toggle="modal" data-target="#modalAlur">Alur Pendaftaran</a>-->
				<a style="text-decoration: none" class="btn btn-sm my-3 btn-outline-dark" href data-toggle="modal" data-target="#modalinfosmk">Informasi</a>
				<!-- </button> -->
				<!--<button class="btn btn-sm btn-outline-dark my-3">Informasi</button>-->
				</div>
			</div>
			</div></div>
		</div>
	</div>
</div>
<div class="album py-5 bg-secondary" id="statistik">
<div class="container py-2">
	<h1 class="text-center text-white py-3 mb-5">Statistik Pendaftaran</h1>
	<div class="row justify-content-center">
		<!-- <div class="col-md-6 col-sm-12">
		<div class="card mb-4 shadow rounded-lg">
		<div class="card-header bg-danger text-white">
				<h5 class="card-title text-center">Sekolah Dasar</h5>
		</div>
			<div class="card-body">
				<ul class="list-group list-group-flush text-center">
					<li class="list-group-item d-flex justify-content-between px-5">Pendaftar <strong><?= $total['sd']  ;?></strong></li>
					<li class="list-group-item d-flex justify-content-between px-5">Diterima <strong><?= $diterima['sd']  ;?></strong></li>
				</ul>
			</div>
			</div>
			</div> -->
		<div class="col-md-6 col-sm-12">
		<div class="card mb-4 shadow rounded-lg">
		<div class="card-header bg-primary text-white">
				<h5 class="card-title text-center">Sekolah Menengah Pertama</h5>
		</div>
			<div class="card-body">
				<ul class="list-group list-group-flush text-center">
					<li class="list-group-item">Gelombang <strong>1</strong></li>
					<li class="list-group-item d-flex justify-content-between px-5">Pendaftar <strong><?= $total['smp1']  ;?></strong></li>
					<li class="list-group-item d-flex justify-content-between px-5">Diterima <strong><?= $diterima['smp1'] ;?> </strong></li>
					<li class="list-group-item">Gelombang <strong>2</strong></li>
					<li class="list-group-item d-flex justify-content-between px-5">Pendaftar <strong><?= $total['smp2'] ;?></strong></li>
					<li class="list-group-item d-flex justify-content-between px-5">Diterima <strong><?= $diterima['smp2'] ;?></strong> </li>
				</ul>
			</div>
			</div>
			</div>
		<div class="col-md-6 col-sm-12">
		<div class="card mb-4 shadow rounded-lg">
		<div class="card-header bg-secondary text-white">
				<h5 class="card-title text-center">Sekolah Menengah Kejuruan</h5>
		</div>
			<div class="card-body">
				<ul class="list-group list-group-flush text-center">
					<li class="list-group-item d-flex justify-content-between px-5">Total Pendaftar <strong><?= $total['smk'] ;?></strong></li>
<li class="list-group-item d-flex justify-content-between px-5"><b>Total Diterima :</b></li>
					<li class="list-group-item d-flex justify-content-between px-5">Jurusan Multimedia <strong><?= $diterima['smk1'] ;?></strong></li>
<li class="list-group-item d-flex justify-content-between px-5">Jurusan Tata Boga <strong><?= $diterima['smk2'] ;?></strong></li>
				</ul>
			</div>
			</div>
		</div>
	</div>
</div>
</div>
</main>
<footer class="text-muted bg-dark text-center py-2">
<div class="container pt-3">
	<div class="row justify-content-center mb-3">
	<div class="col-md-4 col-sm-12">
	<h5 class="text-white text-center text-weight-bolder">Yayasan Taman Pendidikan Al-Amin Surabaya</h5>
	<ul class="text-left" id="kontak">
					<li class="text-white">No, Jl. Kyai Abdul Karim No.2, Rungkut Menanggal, Kec. Gn. Anyar, Kota SBY, Jawa Timur 60293</li>
					<li class="text-white">(031) 8712637</li>
				</ul>
	</div>
	<div class="col-md-4 col-sm-12 my-3 mx-auto">
		<h3 class="text-center text-white">KONTAK PANITIA</h3>
		<div style="display: flex; align-items: center; justify-content: center">
			<div class="text-white">Panitia SMP </div>
			<a class="btn btn-success ml-5" href="https://wa.me/6281359448955?text=Informasi%20Pendaftaran%20SMP%20Al-Amin">0813-5944-8955</a>
		</div>
			<!-- <div class="col"> -->
		<div class="mt-3" style="display: flex; align-items: center; justify-content: center">
			<div class="text-white">Panitia SMK </div>
			<a class="btn btn-success ml-5 text-center" href="https://wa.me/6281998903484?text=Informasi%20Pendaftaran%20SMK%20Al-Amin">0819-9890-3484</a> 
			</div>
					<!-- <li class="text-white">Panitia SD : <a class="btn btn-info ml-5" href="https://wa.me/6287811189422?text=Informasi%20Pendaftaran%20SD%20Al-Amin">0878-1118-9422</a> </li> -->
		<!-- <ul class="text-left" id="kontak">
				</ul> -->
	</div>
	<div class="col-md-4 col-sm-12">
	<h3 class="text-center text-white">PETA LOKASI</h3>
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.1348637994042!2d112.76625131437012!3d-7.338747994703957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fad128a2d77d%3A0xa1b61f3a9ee087e6!2sYayasan%20Taman%20Pendidikan%20Al%20Amin!5e0!3m2!1sid!2sid!4v1578164494843!5m2!1sid!2sid" width="290" height="200" frameborder="1" style="border:0;" allowfullscreen=""></iframe>
	</div>
	</div>
	<div class="row justify-content-center justify-content-center">
		<p class="text-white">&copy; Yayasan Taman Pendidikan AL-Amin Surabaya, 2021</p>
	</div>
</div>
</footer>