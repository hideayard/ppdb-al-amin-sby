<?php 
    // $value = intval($this->session->userdata('level')) + 3;
    // print_r($this->session->userdata);
    $level = intval($this->session->userdata('level'));
    $value = $level + 3;
    $total = count($pendaftar) + 1;
    $total = str_pad($total, 3, '0', STR_PAD_LEFT);
    $datenow = date("d-m-Y");
    $tanggal = date("Y");
    $tanggalsek = date("Ymd");
    switch($level){
        case "1":
            $pen = "SD";
        break;
        case "2":
            $pen = "SMP";
        break;
        case "3":
            $pen = "SMK";
        break;
    }
    // echo $level;
    // echo $pen;
    function valtodate($val)
    {
        $date = strtotime($val);
        $date = date('Ymd', $date);
        return intval($date);
    }
    
    //var_dump($tanggalsek);
    if(count($jadwal) > 1){   
        $tanggalbuka1 = valtodate($jadwal[0]['tanggalbuka']);
        $tanggaltutup1 = valtodate($jadwal[0]['tanggaltutup']);
        $tanggalbuka2 = valtodate($jadwal[1]['tanggalbuka']);
        $tanggaltutup2 = valtodate($jadwal[1]['tanggaltutup']);
        if(intval($tanggalsek) < $tanggaltutup1+1){
            $gelombang = 1; 
        }
		elseif(intval($tanggalsek) < $tanggaltutup2+1) {
          $gelombang = 2;
        } else {
            $gelombang = 1;
        }
    }
    if(intval($level) == 2){
        $username = [$tanggal,$pen,$gelombang,$total];
        $username = implode('/',$username);
        // echo $username;
        // echo '  ';
        // echo $gelombang;
        $password = rand(10000000,99999999);
    } else {
    $username = [$tanggal,$pen,$total];
    $username = implode('/',$username);
    $password = rand(10000000,99999999);
    }
    
?>
<header>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow bg-dark">
<div class="container">
  <a class="navbar-brand d-flex align-item-center" href="<?= base_url()?>">
  <img src="<?= base_url()?>/assets/img/yysn.png" style="width: 30px; height:30px;" alt="" class="mr-2 rounded-lg">
	<bold>PPDB AL-AMIN 2021</bold>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto text-center">
      <li class="nav-item">
        <a  href class="nav-link text-light" data-toggle="modal" data-target="#exampleModal">Ubah Jadwal</a>
      </li>
		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bg-primary rounded mx-2 text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ml-3 fa fa-bold fa-file-excel-o"></i> Export Pendaftar
        </a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<?php if($level == 1) {?>
          <a class="dropdown-item" href="<?= base_url('Operator/exportpd/')?>sd">Export Pendaftar</a>
			<?php } elseif($level == 2){?>
          <a class="dropdown-item" href="<?= base_url('Operator/exportpd/')?>smp1">Gelombang 1</a>
          <a class="dropdown-item" href="<?= base_url('Operator/exportpd/')?>smp2">Gelombang 2</a>
			<?php } else {?>
			<a class="dropdown-item" href="<?= base_url('Operator/exportpd/')?>smk">Token</a>
          <!--<a class="dropdown-item" href="<?= base_url('Operator/exportpd/')?>smk1">Multimedia</a>-->
          <!--<a class="dropdown-item" href="<?= base_url('Operator/exportpd/')?>smk2">Tata Boga</a>-->
			<?php }?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bg-info rounded mx-2 text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ml-3 fa fa-bold fa-file-excel-o"></i> Export Form. Pendaftar
        </a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<?php if($level == 1) {?>
          <a class="dropdown-item" href="<?= base_url('Operator/export/')?>sd">Export Pendaftar</a>
			<?php } elseif($level == 2){?>
          <a class="dropdown-item" href="<?= base_url('Operator/export/')?>smp1">Gelombang 1</a>
          <a class="dropdown-item" href="<?= base_url('Operator/export/')?>smp2">Gelombang 2</a>
			<?php } else {?>
          <a class="dropdown-item" href="<?= base_url('Operator/export/')?>smk1">Multimedia</a>
          <a class="dropdown-item" href="<?= base_url('Operator/export/')?>smk2">Tata Boga</a>
			<?php }?>
        </div>
      </li>
		<!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bg-success rounded mx-2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ml-3 fa fa-bold fa-file-excel-o"></i>
        </a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<?php if($level == 1) {?>
          <a class="dropdown-item" href="<?= base_url('Operator/export/')?>sd">Export Pendaftar</a>
			<?php } elseif($level == 2){?>
          <a class="dropdown-item" href="<?= base_url('Operator/export/')?>smp1">Gelombang 1</a>
          <a class="dropdown-item" href="<?= base_url('Operator/export/')?>smp2">Gelombang 2</a>
			<?php } else {?>
          <a class="dropdown-item" href="<?= base_url('Operator/export/')?>smk1">Multimedia</a>
          <a class="dropdown-item" href="<?= base_url('Operator/export/')?>smk2">Tata Boga</a>
			<?php }?>
        </div>
      </li> -->
      <li class="nav-item active">
            </a>
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

<main role="main">
<!-- Button trigger modal -->

<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title h3 font-weight-normal" id="exampleModalLabel">Ubah Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Operator/jadwal')?>" method="post">
                        <?php if(count($jadwal) > 1) {?>
                        <div class="form-group">
                                <label for="tanggalbuka">Tanggal Buka Gelombang 1</label>
                                <input type="hidden" value="<?= $gelombang;?>">
                                <input type="date" class="form-control shadow" value="<?= $jadwal[0]['tanggalbuka']?>" name="tanggalbuka1" id="tanggalbuka" >
                        </div>
                        <div class="form-group">
                                <label for="tanggaltutup">Tanggal Tutup Gelombang 1</label>
                                <input type="date" class="form-control shadow" value="<?= $jadwal[0]['tanggaltutup']?>" name="tanggaltutup1" id="tanggaltutup" >
                        </div>
                        <div class="form-group">
                                <label for="tanggaltes">Tanggal tes Gelombang 1</label>
                                <input type="date" class="form-control shadow" value="<?= $jadwal[0]['tanggaltes']?>" name="tanggaltes1" id="tanggaltes" >
                        </div>
                        <div class="form-group">
                                <label for="pengumumanhasiltes">Tanggal pengumuman hasil tes gelombang 1</label>
                                <input type="date" class="form-control shadow" value="<?= $jadwal[0]['pengumumanhasiltes']?>" name="pengumumanhasiltes1" id="pengumumanhasiltes" >
                        </div>
                        <div class="form-group">
                                <label for="tanggalbuka">Tanggal Buka Gelombang 2</label>
                                <input type="date" class="form-control shadow" value="<?= $jadwal[1]['tanggalbuka']?>" name="tanggalbuka2" id="tanggalbuka" >
                        </div>
                        <div class="form-group">
                                <label for="tanggaltutup">Tanggal Tutup Gelombang 2</label>
                                <input type="date" class="form-control shadow" value="<?= $jadwal[1]['tanggaltutup']?>" name="tanggaltutup2" id="tanggaltutup" >
                        </div>
                        <div class="form-group">
                                <label for="tanggaltes">Tanggal tes Gelombang 2</label>
                                <input type="date" class="form-control shadow" value="<?= $jadwal[1]['tanggaltes']?>" name="tanggaltes2" id="tanggaltes" >
                        </div>
                        <div class="form-group">
                                <label for="pengumumanhasiltes">Tanggal pengumuman hasil tes Gelombang 2</label>
                                <input type="date" class="form-control shadow" value="<?= $jadwal[1]['pengumumanhasiltes']?>" name="pengumumanhasiltes2" id="pengumumanhasiltes" >
                        </div>
                        <?php } else {?>
                        <div class="form-group">
                                <label for="tanggalbuka">Tanggal Buka</label>
                                <input type="date" class="form-control shadow" value="<?= $jadwal[0]['tanggalbuka']?>" name="tanggalbuka" id="tanggalbuka" >
                        </div>
                        <div class="form-group">
                                <label for="tanggaltutup">Tanggal Tutup</label>
                                <input type="date" class="form-control shadow" value="<?= $jadwal[0]['tanggaltutup']?>" name="tanggaltutup" id="tanggaltutup" >
                        </div>
                        <?php }?>
                        <div class="form-group">
                                <button type="submit" class="form-control btn btn-success shadow" >Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="py-3" id="Pendaftar">
        <div class="container py-3">
    		<h1 class="text-center">Informasi Pendaftar</h1>
            <div class="row justify-content-center">
            <div class="col-md-6 col-sm-10 col-xs-12 py-3">
                 <h3 class="h5 font-weight-normal text-center mb-2">Registrasi <?= $this->session->userdata('res')?> <?php echo $value == 5 ? 'Gelombang '. $gelombang.'' : ''?></h3>
                 <?php if ($this->session->flashdata('peringatan')) { echo '<div class="alert alert-danger">'.$this->session->flashdata('peringatan').'</div>'; }?>
                 <?php if ($this->session->flashdata('message')) { echo '<div class="alert alert-success">'.$this->session->flashdata('message').'</div>'; }?>
                    <form action="<?= base_url('Operator/insert')?>" method="post" class="text-center my-3" >
                        	<div class="form-group input-group shadow">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="nama" required class="form-control" placeholder="Nama" type="text">
                            </div>
                            <div class="row justify-content-center">
                            <div class="col-md-6 col-sm-10 col-xs-12 form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
                                </div>
                                <input type="text" class="form-control shadow" value="" placeholder="Tempat Lahir" name="tempatlahir" id="tempatlahir" >
                            </div>
                            <div class="col-md-6 col-sm-10 col-xs-12 form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
                                </div>
                                <input type="date" class="form-control shadow" value=""  name="tanggallahir" id="tanggallahir" >
                            </div>
                            </div>
                        	<div class="form-group input-group shadow">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                </div>
                                <input name="no_hp" required class="form-control" placeholder="No Telepon" type="text">
                            </div>
                            <?php if($level != 1) {?>
                        	<div class="form-group input-group shadow">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-school"></i> </span>
                                </div>
                                <input name="asalsekolah" required class="form-control" placeholder="Asal Sekolah" type="text">
                            </div>
                            <?php }?>
                            <div class="form-group input-group shadow">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-at"></i> </span>
                                </div>
                                <input name="username" value="<?= $username?>" class="form-control" placeholder="Username" type="text">
                            </div>
                            <div class="form-group input-group shadow">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-unlock-alt"></i> </span>
                                </div>
                                <input name="password" value="<?= $password?>" class="form-control" placeholder="Password" type="text">
                            </div>
                                <input name="level" type="hidden" value="<?= $value?>">
                                <?php if($value == 5) {?>
                                    <input name="gelombang" type="hidden" value="<?= $gelombang ?>">
                                <?php }?>
                            <button type="submit" class="btn btn-outline-primary px-5">Submit</button>
                    </form>
                </div>
                <div class="col-md-6 col-sm-10 col-xs-12 py-3">
                    <h3 class="h5 font-weight-normal text-center mb-2"><?= $this->session->userdata('res')?></h3>
                    <form action="" method="post" class="my-3 shadow">
                        <div class="input-group">
                            <input type="text" id="search" name="search" placeholder="Cari Pendaftar" class="form-control">
                        </div>
                    </form>
                    <div style=" max-height: 60vh;  overflow: auto;  display:inline-block;" class="border shadow text-center">
                        <table class="table table-sm table-hover" style="font-size: .9rem">
                            <thead >
                                <tr>
                                    <th scope="col" >No</th>
                                    <th scope="col" >Nama</th>
                                    <?= $value == 5 ? '<th  scope="col">Gel.</th>': ''?>
                                    <th scope="col" ">Action</th>
                                </tr>
                            </thead>
                            <tbody id="list" style="overflow-y:hidden;">
                            <?php $no=1; foreach ( $pendaftar as $p) : ?>
                                <tr>
                                    <th scope="row"  ><?= $no++;?></th>
                                    <td ><?= $p['nama']?></td>
                                    <?php if($value == 5) {?>
                                    <td  ><?= $p['gelombang']?></td>
                                    <?php }?>
                                    <td >
                                        <div class="btn-group" role="group">
                                            <a href="<?= base_url('Operator/edit/'.$p['id']);?>" class="btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="<?= base_url('Operator/cetak/'.$p['id']);?>" class="btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Formulir">
                                                <i class="fas fa-print"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger" data-toggle="tooltip" onclick="return confirm('Data Pendaftar Tidak Dapat Dihapus!');" data-placement="bottom" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- <div class="py-3 bg-secondary" id="FormulirPendaftar">
        <div class="container py-3">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                	<h1 class="text-center text-light">Validasi Formulir Pendaftar</h1>
             <form action="" method="post" class="my-3 shadow">
                        <div class="input-group">
                            <input type="text" id="search" placeholder="Cari Pendaftar" class="form-control">
                        </div>
             </form>
            <div class=" table-container bg-light  border shadow text-center">
                <table class="table table-responsive-md">
                            <thead >
                                <tr >
                                    <th width="30">Nama</th>
                                    <?php if($value == 5) {?>
                                    <th width="20">Gelombang</th>
                                    <?php }?>
                                    <th width="20">Status Formulir</th>
                                    <th width="20">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach ( $formulirpendaftar as $p) : ?>
                                <tr class="text-center">
                                    <td width="30"><?= $p['nama']?></td>
                                    <?php if($value == 5) {?>
                                    <td width="20"><?= $p['gelombang']?></td>
                                    <?php }?>
                                    <td width="20">
                                        <?php $badge = ($p['validasi'] == TRUE) ? '<span class="badge text-center badge-success">Validated</span>' : '<span class="badge text-center badge-warning">Belum Valid</span>'; echo $badge; ?>
                                    </td>
                                    <td width="30">
                                        <div class="btn-group" role="group">
                                            <a href="<?= base_url('Operator/edit/'.$p['id']);?>" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Formulir">
                                                <i class="fas fa-print"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                </table>
            </div>                        
            </div>
        </div>
        </div>
    </div> -->
     <div class="py-3 bg-dark" id="VerifikasiPendaftar">
        <div class="container py-3">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                	<h1 class="text-center text-light">Verifikasi dan Penerimaan Pendaftar</h1>
             <form action="" method="post" class="my-3 shadow">
                        <div class="input-group">
                            <input type="text" id="searchver" name="searchver" placeholder="Cari Pendaftar" class="form-control">
                        </div>
             </form>
            <div style="max-height: 60vh;  overflow: auto;  display:inline-block;" class=" bg-light  border shadow text-center">
            <table class="table table-sm table-hover" style="font-size: .9rem">
                            <thead >
                                <tr >
                                    <!-- <th width="10">No</th> -->
                                    <th scope="col" >Nama</th>
                                    <?= $value == 5 ? '<th scope="col" >Gel.</th>' : ''?>
                                    <!-- <?php if($value == 5) {?>
                                    <th scope="col" >Gelombang</th>
                                    <?php }?> -->
                                    <th scope="col" >Status</th>
                                    <th scope="col" >Action</th>
                                </tr>
                            </thead>
                            <tbody id="listver" style="overflow-y: hidden;">
                            <?php $no=1; foreach ( $verifikasipendaftar as $p) : ?>
                                <tr class="text-center">
                                    <!-- <td  ><?= $no++;?></td> -->
                                    <td ><?= $p['nama']?></td>
                                    <?php if($value == 5) {?>
                                    <td ><?= $p['gelombang']?></td>
                                    <?php }?>
                                    <td >
                                        <?php $badge = ($p['verifikasi'] == TRUE) ? '<span class="badge text-center badge-success">Lolos / Diterima</span>' : '<span class="badge text-center badge-warning">Belum terverifikasi</span>'; echo $badge; ?>
                                    </td>
                                    <td >
                                        <div class="btn-group" role="group">
                                            <?php if($p['verifikasi'] != TRUE) {?>
                                                <a href="<?= base_url('Operator/verifikasi/'.$p['id']);?>" class="btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Terima Pendaftar">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                            <?php } else { ?>
                                                <a href="<?= base_url('Operator/unverifikasi/'.$p['id']);?>" onclick="return confirm('Anda Yakin Untuk Membatalkan Verifikasi ?');" class="btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Tolak Pendaftar">
                                                    <i class="fas fa-ban"></i>
                                                </a>
                                            <?php }?>
                                            <a href="<?= base_url('Operator/editformulir/'.$p['id']);?>" class="btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="<?= base_url('Operator/cetakformulir/'.$p['id']);?>" class="btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Cetak Formulir">
                                                <i class="fas fa-print"></i>
                                            </a>
                                            <!--<button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Formulir">-->
                                            <!--    <i class="fas fa-print"></i>-->
                                            <!--</button>-->
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
            </div>                        
            </div>
        </div>
        </div>
    </div>
</main>
<script>
		var search = document.getElementById('search')
		search.addEventListener('keyup', function(args){
      $.ajax({
			url:'<?php echo base_url("Operator/search/"); ?>',
			type:'POST',
			dataType:'JSON',
			data:{
				data: this.value
				},
				success: function(res){
          let data = []
          let table_cont = ''
          for (let i = 0; i < res.length; i++) {
            data[i] = {}
            data[i]["nama"] = res[i]["nama"]
            data[i]["id_biodata"] = res[i]["id_biodata"]
            data[i]["gelombang"] = res[i]["gelombang"]
            if (data[i]["gelombang"] != null) {
              table_cont += `
                <tr>
                  <th scope="row">${i+1}</th>
                  <td >${data[i]["nama"]}</td>
                  <td >${data[i]["gelombang"]}</td>
                  <td >
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo base_url('Operator/edit/${data[i]["id_biodata"]}');?>" class="btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="<?php echo base_url('Operator/cetak/${data}[i]["id_biodata"]');?>" class="btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Formulir">
                                                <i class="fas fa-print"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger" data-toggle="tooltip" onclick="return confirm('Data Pendaftar Tidak Dapat Dihapus!');" data-placement="bottom" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                </tr>
              `
            } else {
               table_cont += `
                <tr>
                  <th scope="row" >${i+1}</th>
                  <td >${data[i]["nama"]}</td>
                  <td >
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo base_url('Operator/edit/${data[i]["id_biodata"]}');?>" class="btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="<?php echo base_url('Operator/cetak/${data[i]["id_biodata"]}');?>" class="btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Formulir">
                                                <i class="fas fa-print"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger" data-toggle="tooltip" onclick="return confirm('Data Pendaftar Tidak Dapat Dihapus!');" data-placement="bottom" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                </tr>
              `
            }
            document.getElementById('list').innerHTML = table_cont
          }
        }
      })				
    })
    var searchver = document.getElementById('searchver')
    searchver.addEventListener('keyup', function(args){
      $.ajax({
			url:'<?php echo base_url("Operator/searchver/"); ?>',
			type:'POST',
			dataType:'JSON',
			data:{
				data: this.value
				},
				success: function(res){
          let data = []
          let table_cont = ''
          for (let i = 0; i < res.length; i++) {
            data[i] = {}
            data[i]["nama"] = res[i]["nama"]
            data[i]["id_biodata"] = res[i]["id_biodata"]
            data[i]["verifikasi"] = parseInt(res[i]["verifikasi"])
            data[i]["gelombang"] = res[i]["gelombang"]
            if (data[i]["gelombang"] != null && data[i]['verifikasi'] == 1)  {
              table_cont += `
                <tr>
                  <td >${data[i]["nama"]}</td>
                  <td >${data[i]["gelombang"]}</td>
                  <td >${data[i]["verifikasi"] == 1 ? '<span class="badge text-center badge-success">Lolos / Diterima</span>' : '<span class="badge text-center badge-warning">Belum terverifikasi</span>'}
                  </td>
                  <td >
                    <div class="btn-group" role="group">
                      <a href="<?php echo base_url('Operator/unverifikasi/${data[i]["id_biodata"]}');?>" onclick="return confirm('Anda Yakin Untuk Membatalkan Verifikasi ?');" class="btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Tolak Pendaftar">
                        <i class="fas fa-ban"></i>
                      </a>
                      <a href="<?php echo base_url('Operator/editformulir/${data[i]["id_biodata"]}');?>" class="btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <button type="button" class="btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Formulir">
                        <i class="fas fa-print"></i>
                      </button>
                      </div>
                    </td>
                </tr>
              `
            } else if(data[i]["gelombang"] != null && data[i]['verifikasi'] != 1){
              table_cont += `
                <tr>
                  <td >${data[i]["nama"]}</td>
                  <td >${data[i]["gelombang"]}</td>
                  <td >${data[i]["verifikasi"] == 1 ? '<span class="badge text-center badge-success">Lolos / Diterima</span>' : '<span class="badge text-center badge-warning">Belum terverifikasi</span>'}
                  </td>
                  <td >
                    <div class="btn-group" role="group">
                      <a href="<?php echo base_url('Operator/verifikasi/${data[i]["id_biodata"]}');?>" class="btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Terima Pendaftar">
                        <i class="fas fa-check"></i>
                      </a>
                      <a href="<?php echo base_url('Operator/editformulir/${data[i]["id_biodata"]}');?>" class="btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <button type="button" class="btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Formulir">
                        <i class="fas fa-print"></i>
                      </button>
                      </div>
                    </td>
                </tr>
              `
            } else if(data[i]["gelombang"] == null && data[i]['verifikasi'] == 1) {
              table_cont += `
                <tr>
                  <td >${data[i]["nama"]}</td>
                  <td >${data[i]["verifikasi"] == 1 ? '<span class="badge text-center badge-success">Lolos / Diterima</span>' : '<span class="badge text-center badge-warning">Belum terverifikasi</span>'}
                  </td>
                  <td >
                    <div class="btn-group" role="group">
                      <a href="<?php echo base_url('Operator/unverifikasi/${data[i]["id_biodata"]}');?>" onclick="return confirm('Anda Yakin Untuk Membatalkan Verifikasi ?');" class="btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Tolak Pendaftar">
                        <i class="fas fa-ban"></i>
                      </a>
                      <a href="<?php echo base_url('Operator/editformulir/${data[i]["id_biodata"]}');?>" class="btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <button type="button" class="btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Formulir">
                        <i class="fas fa-print"></i>
                      </button>
                      </div>
                    </td>
                </tr>
              `
            } else if (data[i]["gelombang"] == null && data[i]['verifikasi'] != 1) {
              table_cont += `
                <tr>
                  <td >${data[i]["nama"]}</td>
                  <td >${data[i]["verifikasi"] == 1 ? '<span class="badge text-center badge-success">Lolos / Diterima</span>' : '<span class="badge text-center badge-warning">Belum terverifikasi</span>'}
                  </td>
                  <td >
                    <div class="btn-group" role="group">
                      <a href="<?php echo base_url('Operator/verifikasi/${data[i]["id_biodata"]}');?>" class="btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Terima Pendaftar">
                        <i class="fas fa-check"></i>
                      </a>
                      <a href="<?php echo base_url('Operator/editformulir/${data[i]["id_biodata"]}');?>" class="btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <button type="button" class="btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Formulir">
                        <i class="fas fa-print"></i>
                      </button>
                      </div>
                    </td>
                </tr>
              `
            }
              document.getElementById('listver').innerHTML = table_cont
            }
        }
      })				
    })
    </script>