<?php 
	$level = intval($this->session->userdata('level'));
    $value = $level + 3;
    $username = $this->session->userdata('username');
?>
<header>
<nav class="navbar navbar-expand-lg navbar-dark shadow bg-dark">
<div class="container">
  <a class="navbar-brand d-flex align-items-center" href="<?= $level > 3 ? base_url('Pendaftaran') : base_url() ?>">
  <img src="<?= base_url()?>/assets/img/yysn.png" style="width: 30px; height:30px;" alt="" class="mr-2 rounded-lg">
	<bold>PPDB AL-AMIN 2021</bold>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto text-center">
      <?php if($level > 3) {?>
        <li class="nav-item active"><a href class="nav-link mr-2 text-white px-4" data-toggle="modal" data-target="#modalstatus">Cek Status Pendaftaran</a></li>
      <?php } else { ?>
        <li class="nav-item active"><a href="<?= base_url('Operator')?>" class="nav-link mr-2 text-white px-4" >Dashboard</a></li>
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
  <div class="modal fade" id="modalstatus" tabindex="-1" role="dialog" aria-labelledby="modalstatus" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-left">
                    <h4 class="modal-title h5 font-weight-normal" id="exampleModalLabel">Status Pendaftaran Calon Siswa <br> <?php 
						switch ($level) {
                            case 4:
                                $stts = 'SDI KYAI AMIN SURABAYA';
                                break;
                            case 5:
                                $stts = 'SMP AL AMIN SURABAYA';
                                break;
                            case 6:
                                $stts = 'SMK AL AMIN SURABAYA';
                                break;
		            }
						                            echo $stts;
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
								<td><?php                             switch ($level) {
                                case 4:
                                    echo 'SDI KYAI AMIN SURABAYA';
                                    break;
                                    case 5:
                                        echo 'SMP AL AMIN SURABAYA';
                                        break;
                                        case 6:
                                            echo 'SMK AL AMIN SURABAYA';
                                            break;
                            }?></td>
							</tr>
							<?php if($level == 6) { ?>
							<tr>
								<th>Jurusan</th>
								<td><?= $datapendaftar->jurusan ?? '' ?></td>
							</tr>
							<?php }?>
							<?php if($level == 5) { ?>
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
	<!-- <?php if($level == 5) { ?>
	<div class="container-fluid" style="height: 40vh;background-repeat: no-repeat; background-size: cover; background-image: url('http://ppdbalaminsby.web.id//assets/img/bannersmp.jpeg')">
	</div>
    <img src="<?= base_url()?>/assets/img/bannersmp.jpeg" class="img-fluid" style="max-height: 40vh; width: 100%" alt="" srcset="">
<?php } elseif($level == 6) {?>
    <img src="<?= base_url()?>/assets/img/bannersmp.jpeg" class="img-fluid" style="max-height: 40vh; width: 100%" alt="" srcset="">
<?php }?> -->
<img src="<?= base_url()?>/assets/img/<?= $level == 5 ? 'bannersmp.jpeg' : ($level == 6 ? 'bannersmk.jpeg' : '') ?>" class="img-fluid" style="max-height: 40vh; width: 100%" alt="" srcset="">
<div class="py-5">
    <div class="container py-2">
        <h1 class="text-center h3 font-weight-normal">
        <?php $isi = ($this->uri->segment('2') === 'edit') ? 'Formulir Ubah Data' : 'Formulir Pendaftaran' ; echo $isi; ?>
        </h1>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-10">
            <?php if ($this->uri->segment('2') === 'edit'  ) { ?>
                <form action="<?= base_url('Operator/edit/'.$detail->id)?>" method="post" class="text-center my-3 mx-3 py-4" >
                  	<div class="form-group input-group shadow">
                        <div class="input-group-prepend">
                        <?php if ($this->uri->segment('3')) : ?>
                        <input name="id" type="hidden" value="<?= $this->uri->segment('3');?>">
                        <?php endif; ?>
                           <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="nama" class="form-control"  autofocus placeholder="Nama" value="<?= $detail->nama?>" type="text">
                        </div>
                        <div class="row">
                            <div class="col form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
                                </div>
                                <input type="text" class="form-control shadow" value="<?= $detail->tempatlahir?>" placeholder="Tempat Lahir" name="tempatlahir" id="tempatlahir" >
                            </div>
                            <div class="col form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
                                </div>
                                <input type="date" class="form-control shadow" value="<?= $detail->tanggallahir?>"  name="tanggallahir" id="tanggallahir" >
                            </div>
                        </div>
                        <div class="form-group input-group shadow">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                </div>
                                <input name="no_hp" required value="<?= $detail->no_hp?>" class="form-control" placeholder="No Telepon" type="number">
                        </div>
                        <?php if($level != 1) {?>
                        <div class="form-group input-group shadow">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-school"></i> </span>
                                </div>
                                <input name="asalsekolah" required value="<?= $detail->asalsekolah ?? 'Nan'?>" class="form-control" placeholder="Asal Sekolah" type="text">
                        </div>
                        <?php }?>
                        <input name="level" type="hidden" value="<?= $value?>">
                            <button type="submit" class="btn btn-outline-success px-5">Simpan</button>
                </form>
            <?php } else {?>
                <form method="post" action="<?= base_url('Pendaftaran/Simpan')?>">
                    <div class="row d-flex justify-content-between">
                        <div class="col">
                            <h3 class="h5 text-left font-weight-bold">Data Diri Pendaftar</h3>
                        </div>
                        <?php if($datapendaftar->gelombang) {?>
                        <div class="col">
                        <h3 class="h5 font-weight-normal">GELOMBANG <?= $datapendaftar->gelombang?></h3>
                        </div>
                            <?php }?>
                        <div class="col align-self-end">
                        <h5 class="h6 py-2 px-2 text-center font-weight-light border rounded shadow">No : <?= $datapendaftar->username?></h3>
                        </div>
                    </div>
                        <input type="hidden" value="sudah" name="statusformulir">
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" required class="form-control shadow" value="<?= $nama = ($datapendaftar->nama) ?? '';?>" name="nama" id="Nama" >
                            <input type="hidden" value="<?= $nama = ($datapendaftar->id_biodata) ?? '';?>" name="id_biodata">
                        </div>
                        <?php if($this->session->userdata('level') == 3 || $this->session->userdata('level') == 6) {?>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" required class="shadow form-control">
                                <option value="<?= $jurusan = ($datapendaftar->jurusan) ?? '';?>"><?= $jurusan = ($datapendaftar->jurusan) ?? 'Pilih Jurusan';?></option>
                                <option value="Multimedia">Multimedia</option>
                                <option value="Tata Boga">Tata Boga</option>
                            </select>
                        </div>
                        <?php }?>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="number" required class="form-control shadow" value="<?= $nik = ($datapendaftar->nik) ?? '';?>" name="nik" id="nik" >
                        </div>
                        <div class="form-group">
                            <label for="nokk">No Kartu Keluarga</label>
                            <input type="number" required class="form-control shadow" value="<?= $nokk = ($datapendaftar->nokk) ?? '';?>" name="nokk" id="nokk" >
                        </div>
                        <div class="form-group">
                            <label for="noakta">No Akta Kelahiran</label>
                            <input type="number" required class="form-control shadow" value="<?= $noakta = ($datapendaftar->noakta) ?? '';?>" name="noakta" id="noakta" >
                        </div>
                        <?php if ($this->session->userdata('level') != 4 && $this->session->userdata('level') != 1) {?>
                        <div class="form-group">
                            <label for="nisn">No Induk Siswa Nasional ( NISN )</label>
                            <input type="number" required class="form-control shadow" value="<?= $nisn = ($datapendaftar->nisn) ?? '';?>" name="nisn" id="nisn" >
                        </div>
                        <?php }?>
                        <div class="form-group">
                            <label for="kelamin">Kelamin</label>
                            <select name="kelamin" required  class="shadow form-control">
                                <option value="<?= $kelamin = ($datapendaftar->kelamin) ?? '';?>"><?= $kelamin = ($datapendaftar->kelamin) ?? 'Pilih Jenis Kelamin';?></option>
                                <option value="laki-laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="tempatlahir">Tempat</label>
                                <input type="text" required class="form-control shadow" value="<?= $tempatlahir = ($datapendaftar->tempatlahir) ?? '';?>" name="tempatlahir" id="tempatlahir" >
                            </div>
                            <span>/</span>
                            <div class="col form-group">
                                <label for="tanggallahir">Tanggal Lahir</label>
                                <input type="date" required class="form-control shadow" value="<?= $tanggallahir = ($datapendaftar->tanggallahir) ?? '';?>" name="tanggallahir" id="tanggallahir" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kewarganegaraan">Kewarganegaraan</label>
                            <input type="text" required class="form-control shadow" value="<?= $kewarganegaraan = ($datapendaftar->kewarganegaraan) ?? '';?>" name="kewarganegaraan" id="kewarganegaraan" >
                        </div>
                        <div class="form-group">
                            <label for="anakke">Anak ke - </label>
                            <input type="number" required class="form-control shadow" value="<?= $anakke = ($datapendaftar->anakke) ?? '';?>" name="anakke" id="anakke" >
                        </div>
                        <div class="form-group">
                            <label for="jumlahsaudarakandung">Jumlah Saudara Kandung</label>
                            <input type="number" required class="form-control shadow" value="<?= $jumlahsaudarakandung = ($datapendaftar->jumlahsaudarakandung) ?? '';?>" name="jumlahsaudarakandung" id="jumlahsaudarakandung" >
                        </div>
                        <div class="form-group">
                            <label for="jumlahsaudaratiri">Jumlah Saudara Tiri</label>
                            <input type="number" required class="form-control shadow" value="<?= $jumlahsaudaratiri = ($datapendaftar->jumlahsaudaratiri) ?? '';?>" name="jumlahsaudaratiri" id="jumlahsaudaratiri" >
                        </div>
                        <div class="form-group">
                            <label for="jumlahsaudaraangkat">Jumlah Saudara Angkat</label>
                            <input type="number" required class="form-control shadow" value="<?= $jumlahsaudaraangkat = ($datapendaftar->jumlahsaudaraangkat) ?? '';?>" name="jumlahsaudaraangkat" id="jumlahsaudaraangkat" >
                        </div>
                        <div class="form-group">
                            <label for="statusanak">Status Anak</label>
                            <select name="statusanak" required class="shadow form-control" >
                                <option value="<?= $statusanak = ($datapendaftar->statusanak) ?? '';?>"><?= $statusanak = ($datapendaftar->statusanak) ?? 'Pilih Status';?></option>
                                <option value="Bersama Orang Tua">Bersama Orang Tua</option>
                                <option value="Anak Yatim">Anak Yatim</option>
                                <option value="Anak Piatu">Anak Piatu</option>
                                <option value="Anak Yatim & Piatu">Anak Yatim & Piatu</option>
                                <option value="Anak Angkat">Anak Angkat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bahasa">Bahasa Sehari - hari</label>
                            <input type="text" required class="form-control shadow" value="<?= $bahasa = ($datapendaftar->bahasa) ?? '';?>" name="bahasa" id="bahasa" >
                        </div>
                        <div class="form-group">
                            <label for="citacita">Cita - cita</label>
                            <input type="text" required class="form-control shadow" value="<?= $citacita = ($datapendaftar->citacita) ?? '';?>" name="citacita" id="citacita" >
                        </div>
                        <div class="form-group">
                            <label for="hobi">Hobi</label>
                            <input type="text" required class="form-control shadow" value="<?= $hobi = ($datapendaftar->hobi) ?? '';?>" name="hobi" id="hobi" >
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Sesuai Domisili</label>
                            <input type="text" required class="form-control shadow" value="<?= $alamat = ($datapendaftar->alamat) ?? '';?>" name="alamat" id="alamat" >
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="rt">RT</label>
                                <input type="number" required class="form-control shadow" value="<?= $rt = ($datapendaftar->rt) ?? '';?>" name="rt" id="rt" >
                            </div>
                            <div class="col form-group">
                                <label for="rw">RW</label>
                                <input type="number" required class="form-control shadow" value="<?= $rw = ($datapendaftar->rw) ?? '';?>" name="rw" id="rw" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan">Kelurahan</label>
                            <input type="text" required class="form-control shadow" value="<?= $kelurahan = ($datapendaftar->kelurahan) ?? '';?>" name="kelurahan" id="kelurahan" >
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" required class="form-control shadow" value="<?= $kecamatan = ($datapendaftar->kecamatan) ?? '';?>" name="kecamatan" id="kecamatan" >
                        </div>
                        <div class="form-group">
                            <label for="kabupaten">Kabupaten</label>
                            <input type="text" required class="form-control shadow" value="<?= $kabupaten = ($datapendaftar->kabupaten) ?? '';?>" name="kabupaten" id="kabupaten" >
                        </div>
                        <div class="form-group">
                            <label for="kodepos">Kode Pos</label>
                            <input type="number" required class="form-control shadow" value="<?= $kodepos = ($datapendaftar->kodepos) ?? '';?>" name="kodepos" id="kodepos" >
                        </div>
                        <div class="form-group">
                            <label for="alamatkk">Alamat Sesuai Kartu Keluarga</label>
                            <input type="text" required class="form-control shadow" value="<?= $alamatkk = ($datapendaftar->alamatkk) ?? '';?>" name="alamatkk" id="alamatkk" >
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="rtkk">rt</label>
                                <input type="number" required class="form-control shadow" value="<?= $rtkk = ($datapendaftar->rtkk) ?? '';?>" name="rtkk" id="rtkk" >
                            </div>
                            <div class="col form-group">
                                <label for="rwkk">rw</label>
                                <input type="number" required class="form-control shadow" value="<?= $rwkk = ($datapendaftar->rwkk) ?? '';?>" name="rwkk" id="rwkk" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kelurahankk">Kelurahan</label>
                            <input type="text" required class="form-control shadow" value="<?= $kelurahankk = ($datapendaftar->kelurahankk) ?? '';?>" name="kelurahankk" id="kelurahankk" >
                        </div>
                        <div class="form-group">
                            <label for="kecamatankk">kecamatan</label>
                            <input type="text" required class="form-control shadow" value="<?= $kecamatankk = ($datapendaftar->kecamatankk) ?? '';?>" name="kecamatankk" id="kecamatankk" >
                        </div>
                        <div class="form-group">
                            <label for="kabupatenkk">kabupaten</label>
                            <input type="text" required class="form-control shadow" value="<?= $kabupatenkk = ($datapendaftar->kabupatenkk) ?? '';?>" name="kabupatenkk" id="kabupatenkk" >
                        </div>
                        <div class="form-group">
                            <label for="kodeposkk">Kode Pos</label>
                            <input type="number" class="form-control shadow" value="<?= $kodeposkk = ($datapendaftar->kodeposkk) ?? '';?>" name="kodeposkk" id="kodeposkk" >
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomor Handphone</label>
                            <input type="number" required class="form-control shadow" value="<?= $no_hp = ($datapendaftar->no_hp) ?? '';?>" name="no_hp" id="no_hp" >
                        </div>
                        <div class="form-group">
                            <label for="statustinggal">status tinggal</label>
                            <select name="statustinggal" required class=" shadow form-control" >
                                <option value="<?= $statustinggal = ($datapendaftar->statustinggal) ?? '';?>"><?= $statustinggal = ($datapendaftar->statustinggal) ?? 'Pilih Status Tinggal';?></option>
                                <option value="Bersama Orang Tua">Bersama Orang Tua</option>
                                <option value="Asrama">Asrama</option>
                                <option value="Menumpang">Menumpang</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jaraksekolah">jarak sekolah</label>
                            <input type="text" required class="form-control shadow" value="<?= $no_hp = ($datapendaftar->jumlahsaudaraangkat) ?? '';?>" name="jaraksekolah" id="jaraksekolah" >
                        </div>
                        <div class="form-group">
                            <label for="golongandarah">golongan darah</label>
                            <input type="text" required class="form-control shadow" value="<?= $golongandarah = ($datapendaftar->golongandarah) ?? '';?>" name="golongandarah" id="golongandarah" >
                        </div>
                        <div class="form-group">
                            <label for="riwayatpenyakit">riwayat penyakit</label>
                            <input type="text" required class="form-control shadow" value="<?= $riwayatpenyakit = ($datapendaftar->riwayatpenyakit) ?? '';?>" name="riwayatpenyakit" id="riwayatpenyakit" >
                        </div>
                        <div class="form-group">
                            <label for="kelainanjasmani">kelainan jasmani</label>
                            <input required type="text" class="form-control shadow" value="<?= $kelainanjasmani = ($datapendaftar->kelainanjasmani) ?? '';?>" name="kelainanjasmani" id="kelainanjasmani" >
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="beratbadan">berat badan</label>
                                <input type="number" required class="form-control shadow" value="<?= $beratbadan = ($datapendaftar->beratbadan) ?? '';?>" name="beratbadan" id="beratbadan" >
                            </div>
                            <div class="col form-group">
                                <label for="tinggibadan">tinggi badan</label>
                                <input type="number" required class="form-control shadow" value="<?= $tinggibadan = ($datapendaftar->tinggibadan) ?? '';?>" name="tinggibadan" id="tinggibadan" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="asalsekolah">asal sekolah</label>
                            <input type="text" required class="form-control shadow" value="<?= $asalsekolah = ($datapendaftar->asalsekolah) ?? '';?>" name="asalsekolah" id="asalsekolah" >
                        </div>
                        <div class="form-group">
                            <label for="lamabelajar">lama belajar</label>
                            <input type="text" required class="form-control shadow" value="<?= $lamabelajar = ($datapendaftar->lamabelajar) ?? '';?>" name="lamabelajar" id="lamabelajar" >
                        </div>
                                                <div class="form-group">
                            <label for="pindahan">pindahan dari sekolah</label>
                            <input type="text" class="form-control shadow" value="<?= $pindahan = ($datapendaftar->pindahan) ?? '';?>" placeholder="Hanya Di isi oleh calon siswa mutasi" name="pindahan" id="pindahan" >
                        </div>
                                                <div class="form-group">
                            <label for="alasanpindah">alasan pindah</label>
                            <input type="text"  class="form-control shadow" value="<?= $alasanpindah = ($datapendaftar->alasanpindah) ?? '';?>" placeholder="Hanya Di isi oleh calon siswa mutasi" name="alasanpindah" id="alasanpindah" >
                        </div>
                        <h3 class="h5 py-3 text-right font-weight-bold">Data Orang Tua / Wali</h3>
                        <div class="form-group">
                            <label for="namaayah">nama ayah</label>
                            <input type="text" required class="form-control shadow" value="<?= $namaayah = ($datapendaftar->namaayah) ?? '';?>" name="namaayah" id="namaayah" >
                        </div>
					 <div class="form-group">
                            <label for="nik">NIK Ayah</label>
                            <input type="number" required class="form-control shadow" value="<?= $nik = ($datapendaftar->nikayah) ?? '';?>" name="nikayah" id="nikayah" >
                        </div>
                                                <div class="form-group">
                            <label for="notelayah">no telepon / Handphone ayah</label>
                            <input type="number" required class="form-control shadow" value="<?= $notelayah = ($datapendaftar->notelayah) ?? '';?>" name="notelayah" id="notelayah" >
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="tempatlahirayah">Tempat </label>
                                <input type="text" required class="form-control shadow" value="<?= $tempatlahirayah = ($datapendaftar->tempatlahirayah) ?? '';?>" name="tempatlahirayah" id="tempatlahirayah" >
                            </div>
                            <span>/</span>
                            <div class="col form-group">
                                <label for="tanggallahirayah">Tanggal Lahir ayah</label>
                                <input type="date" required class="form-control shadow" value="<?= $tanggallahirayah = ($datapendaftar->tanggallahirayah) ?? '';?>" name="tanggallahirayah" id="tanggallahirayah" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamatayah">alamat ayah</label>
                            <input type="text" required class="form-control shadow" value="<?= $alamatayah = ($datapendaftar->alamatayah) ?? '';?>" name="alamatayah" id="alamatayah" >
                        </div>
                                                <div class="form-group">
                            <label for="pendidikanayah">pendidikan ayah</label>
                            <input type="text" class="form-control shadow" required value="<?= $pendidikanayah = ($datapendaftar->pendidikanayah) ?? '';?>" name="pendidikanayah" id="pendidikanayah" >
                        </div>
                                                <div class="form-group">
                            <label for="pekerjaanayah">pekerjaan ayah</label>
                            <input type="text" required class="form-control shadow" value="<?= $pekerjaanayah = ($datapendaftar->pekerjaanayah) ?? '';?>" name="pekerjaanayah" id="pekerjaanayah" >
                        </div>
                                                <div class="form-group">
                            <label for="penghasilanayah">penghasilan ayah</label>
                            <select name="penghasilanayah" required class="shadow form-control" >
                                <option value="<?= $penghasilanayah = ($datapendaftar->penghasilanayah) ?? '';?>"><?= $penghasilanayah = ($datapendaftar->penghasilanayah) ?? 'Pilih Penghasilan ..';?></option>
                                <option value="Tidak ada penghasilan">Tidak ada penghasilan</option>
                                <option value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                <option value="Rp. 1.000.000 - Rp.2.000.000">Rp. 1.000.000 - Rp.2.000.000</option>
                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                <option value="Rp. 3.000.000 - Rp. 4.000.000">Rp. 3.000.000 - Rp. 4.000.000</option>
                                <option value="Lebih dari Rp. 4.000.000">Lebih dari Rp. 4.000.000</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="namaibu">Nama ibu</label>
                            <input type="text" required class="form-control shadow" value="<?= $namaibu = ($datapendaftar->namaibu) ?? '';?>" name="namaibu" id="namaibu" >
                        </div>
					 <div class="form-group">
                            <label for="nik">NIK Ibu</label>
                            <input type="number" required class="form-control shadow" value="<?= $nik = ($datapendaftar->nikibu) ?? '';?>" name="nikibu" id="nikibu" >
                        </div>
                                                <div class="form-group">
                            <label for="notelibu">no telepon / handphone ibu</label>
                            <input type="number" required class="form-control shadow" value="<?= $notelibu = ($datapendaftar->notelibu) ?? '';?>" name="notelibu" id="notelibu" >
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="tempatlahiribu">Tempat </label>
                                <input type="text" required class="form-control shadow" value="<?= $tempatlahiribu = ($datapendaftar->tempatlahiribu) ?? '';?>" name="tempatlahiribu" id="tempatlahiribu" >
                            </div>
                            <span>/</span>
                            <div class="col form-group">
                                <label for="tanggallahiribu">Tanggal Lahir ibu</label>
                                <input type="date" required class="form-control shadow" value="<?= $tanggallahiribu = ($datapendaftar->tanggallahiribu) ?? '';?>" name="tanggallahiribu" id="tanggallahiribu" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamatibu">alamat ibu</label>
                            <input type="text" required class="form-control shadow" value="<?= $alamatibu = ($datapendaftar->alamatibu) ?? '';?>" name="alamatibu" id="alamatibu" >
                        </div>
                                                <div class="form-group">
                            <label for="pendidikanibu">pendidikan ibu</label>
                            <input type="text" required class="form-control shadow" value="<?= $pendidikanibu = ($datapendaftar->pendidikanibu) ?? '';?>" name="pendidikanibu" id="pendidikanibu" >
                        </div>
                                                <div class="form-group">
                            <label for="pekerjaanibu">pekerjaan ibu</label>
                            <input type="text" required class="form-control shadow" value="<?= $pekerjaanibu = ($datapendaftar->pekerjaanibu) ?? '';?>" name="pekerjaanibu" id="pekerjaanibu" >
                        </div>
                                                <div class="form-group">
                            <label for="penghasilanibu">penghasilan ibu</label>
                            <select name="penghasilanibu" required class="shadow form-control" >
                                <option value="<?= $penghasilanibu = ($datapendaftar->penghasilanibu) ?? '';?>"><?= $penghasilanibu = ($datapendaftar->penghasilanibu) ?? 'Pilih Penghasilan Ibu';?></option>
                                <option value="Tidak ada penghasilan">Tidak ada penghasilan</option>
                                <option value="Kurang dari Rp. 500.000">Kurang dari Rp. 500.000</option>
                                <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                <option value="Rp. 1.000.000 - Rp.2.000.000">Rp. 1.000.000 - Rp.2.000.000</option>
                                <option value="Rp. 2.000.000 - Rp. 3.000.000">Rp. 2.000.000 - Rp. 3.000.000</option>
                                <option value="Rp. 3.000.000 - Rp. 4.000.000">Rp. 3.000.000 - Rp. 4.000.000</option>
                                <option value="Lebih dari Rp. 4.000.000">Lebih dari Rp. 4.000.000</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="namawali">nama wali</label>
                            <input type="text" <?= $level == 6 ? 'required': ''?> class="form-control shadow" value="<?= $namawali = ($datapendaftar->namawali) ?? '';?>" name="namawali" id="namawali" >
                        </div>
                                                <div class="form-group">
                            <label for="notelwali">no telepon / handphone wali</label>
                            <input type="number" <?= $level == 6 ? 'required': ''?> class="form-control shadow" value="<?= $notelwali = ($datapendaftar->notelwali) ?? '';?>" name="notelwali" id="notelwali" >
                        </div>
                        <div class="form-group">
                            <label for="alamatwali">alamat wali</label>
                            <input type="text" <?= $level == 6 ? 'required': ''?>  class="form-control shadow" value="<?= $alamatwali = ($datapendaftar->alamatwali) ?? '';?>" name="alamatwali" id="alamatwali" >
                        </div>
                        <div class="form-group">
                            <label for="pekerjaanwali">pekerjaan wali</label>
                            <input type="text"  <?= $level == 6 ? 'required': ''?> class="form-control shadow" value="<?= $pekerjaanwali = ($datapendaftar->pekerjaanwali) ?? '';?>" name="pekerjaanwali" id="pekerjaanwali" >
                        </div>
                        <div class="form-group">
                            <label for="hubunganwali">hubungan calon siswa dengan wali</label>
                            <input type="text" class="form-control shadow" value="<?= $hubunganwali = ($datapendaftar->hubunganwali) ?? '';?>" name="hubunganwali" id="hubunganwali" >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn form-control btn-outline-success ">Simpan</button>
                        </div>
                    </form>
                    <hr>
                        <?php }?>
            </div>
        </div>
    </div>
</div>
</main>