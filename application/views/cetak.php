 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <?php if($this->session->userdata('level') < 4) {?>
     <meta http-equiv="refresh" content="3; url=<?= base_url('Operator')?>">
     <?php } else { ?>
     <meta http-equiv="refresh" content="3; url=<?= base_url('Pendaftaran')?>">
     <?php }?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" media="print">
     
     <?php
     $level = intval($data->level);
     switch($level){
        case 1 :
             $lembaga = "SDI KIYAI AMIN SURABAYA";
        break;
        case 2 :
             $lembaga = "SMP AL-AMIN SURABAYA";
        break;
        case 3 :
             $lembaga = "SMK AL-AMIN SURABAYA";
        break;
        case 4 :
             $lembaga = "SDI KIYAI AMIN SURABAYA";
        break;
        case 5 :
             $lembaga = "SMP AL-AMIN SURABAYA";
        break;
        case 6 :
             $lembaga = "SMK AL-AMIN SURABAYA";
        break;
     }
    
         function valtodate($val)
            {
                $date = strtotime($val);
                $date = date('d-m-Y', $date);
                return $date;
            }
            function tgl_indo($tanggal){
                                $tanggal = strtotime($tanggal);
                $tanggal = date('Y-m-d', $tanggal);
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
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
     ?>
     <title><?= $data->username?></title>
     <style>
     body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        /* background-color: #FAFAFA; */
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    /* .kop{
        padding: 12mm 10mm;
        margin: 20px auto;
    } */
    .formpage {
        width: 210mm;
        min-height: 297mm;
        margin: 0;
        padding: 0;
        font-size: 12px;
        /* margin: 10mm auto; */
    }
        
    .page {
        width: 210mm;
        min-height: 148mm;
        padding: 20mm;
        margin: 10mm auto;
        /* border: 1px #D3D3D3 solid;
        border-radius: 5px; */
        /* background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); */
    }
    .subpage {
        padding: 1cm;
        /* border: 5px red solid; */
        height: 257mm;
        /* outline: 2cm #FFEAEA solid; */
    }
    
    @page {
        size: a4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 148mm;        
        }
        .kop{
            margin: 10mm;
            padding: 10mm 20mm;
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
        .formpage {
        margin: 0 10mm;
        font-family: "Times New Roman", Times, serif;
        }
        .formpage > .container > table.data> tbody> tr{
            line-height: 7mm;
            font-size: 12px;
        }
        .formpage > .container >.row>.col > table.data> tbody> tr{
            line-height: 7mm;
            font-size: 12px;
        }
        hr#form {
            border: 2px solid black;
        }
    }
     </style>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script>
     </script> -->
 </head>
	  <!--<body> -->
  <body onload="this.print()" id="printbody">
	 <!-- data pendaftaran awal -->
	  <?php if(($this->uri->segment('1') === 'Operator') && ($this->uri->segment('2') === 'insert')) {?>
	  <div class="container page">
         <table width="100%">
            <tr>
                <td width="25" style="padding: 0" align="center"><img style="margin: 0 20px;" src="<?= base_url();?>/assets/img/yysn.png" width="80%"></td>
                <td width="75" align="center">
                    <h2 class="h3" style="margin: 0">YAYASAN TAMAN PENDIDIKAN AL-AMIN</h2>
                    <h1 style="margin: 0 auto; padding: 0 auto" class="font-weight-bolder"><?= $lembaga;?></h2>
                    <h5 class="h6 font-weight-normal" style="margin: 0">Jl. Kyai Abdul Karim No.2, Rungkut Menanggal, Gunung Anyar, Surabaya, 60294<br/>Telp. (031) 8709142</h5>
                </td>
            </tr>
        </table>
        <hr id="form">
        <h3 class="mb-3 text-center">Data Pendaftaran <?= $lembaga?></h3>
        <h5 class="text-center">Akses Website Pengsian Formulir di <b><?= base_url()?></b></h5>
         <table width="80%" style="font-size: 1.2rem; line-height: 1.5" class="my-5 mx-auto">
            <tr class="text-left">
                <th width="20">Username </th>
                <td width="5"> : </td>
                <td width="40"> <?= $data->username?> </td>
            </tr>
                                                 <tr class="text-left">
                <th width="20">Nama</th>
                <td width="5"> : </td>
                <td width="40"> <?= $data->nama?> </td>
            </tr>
                                                 <tr class="text-left">
                <th width="20">Password </th>
                <td width="5"> : </td>
                <td width="40"> <?= $data->password?> </td>
            </tr>
                                                 <tr class="text-left">
                <th width="20">No. HP </th>
                <td width="5"> : </td>
                <td width="40"> <?= $data->no_hp?> </td>
            </tr>
                                                 <tr class="text-left">
                <th width="20">Tempat / Tanggal Lahir</th>
                <td width="5"> : </td>
                <td width="40"> <?= $data->tempatlahir?>  / <?= tgl_indo($data->tanggallahir)?></td>
            </tr>
         </table>
         <h4 class="text-center my-5"><?= $data->level == 5 ? 'Alur dan ' : ''?>Informasi Pendaftaran</h4>
         <div class="row justify-content-center align-items-center">
            <div class="col">
                 <img src="<?= base_url();?>/assets/img/<?= $level ==5 ? 'alur-calon.jpeg' : 'infosmk.jpeg' ?>" class="img-fluid" style="width: 100%; height: 100%;" alt="Alur Pendaftaran <?= base_url(); $data->username;?>">
            </div>
            <?php if($data->level == 5) { ?>
            <div class="col" >
                 <img src="<?= base_url();?>assets/img/alur-smp.jpg" class="img-fluid" style="width: 100%; height: 100%;" alt="Pendaftaran <?= $data->username;?>">
            </div>
            <?php }?>
        </div>
     </div>
 <?php } ?>
	  <?php if(($this->uri->segment('1') === 'Operator') && ($this->uri->segment('2') === 'cetak')) {?>
 	<div class="container page">
         <table width="100%">
            <tr>
                <td width="25" style="padding: 0" align="center"><img style="margin: 0 20px;" src="<?= base_url();?>/assets/img/yysn.png" width="80%"></td>
                <td width="75" align="center">
                    <h2 class="h3" style="margin: 0">YAYASAN TAMAN PENDIDIKAN AL-AMIN</h2>
                    <h1 style="margin: 0 auto; padding: 0 auto" class="font-weight-bolder"><?= $lembaga;?></h2>
                    <h5 class="h6 font-weight-normal" style="margin: 0">Jl. Kyai Abdul Karim No.2, Rungkut Menanggal, Gunung Anyar, Surabaya, 60294<br/>Telp. (031) 8709142</h5>
                </td>
            </tr>
        </table>
        <hr id="form">
        <h3 class="mb-3 text-center">Data Pendaftaran <?= $lembaga?></h3>
        <h5 class="text-center">Akses Website Pengsian Formulir di <b><?= base_url()?></b></h5>
         <table width="80%" style="font-size: 1.2rem; line-height: 1.5" class="my-5 mx-auto">
            <tr class="text-left">
                <th width="20">Username </th>
                <td width="5"> : </td>
                <td width="40"> <?= $data->username?> </td>
            </tr>
            <tr class="text-left">
                <th width="20">Nama</th>
                <td width="5"> : </td>
                <td width="40"> <?= $data->nama?> </td>
            </tr>
             <tr class="text-left">
                <th width="20">Password </th>
                <td width="5"> : </td>
                <td width="40"> <?= $data->password?> </td>
            </tr>
            <tr class="text-left">
                <th width="20">No. HP </th>
                <td width="5"> : </td>
                <td width="40"> <?= $data->no_hp?> </td>
            </tr>
            <tr class="text-left">
                <th width="20">Tempat / Tanggal Lahir</th>
                <td width="5"> : </td>
                <td width="40"> <?= $data->tempatlahir?>  / <?= tgl_indo($data->tanggallahir)?></td>
            </tr>
         </table>
         <h4 class="text-center my-5"><?= $data->level == 5 ? 'Alur dan ' : ''?>Informasi Pendaftaran</h4>
         <div class="row justify-content-center align-items-center">
            <div class="col">
                 <img src="<?= base_url();?>/assets/img/<?= $level ==5 ? 'alur-calon.jpeg' : 'infosmk.jpeg' ?>" class="img-fluid" style="width: 100%; height: 100%;" alt="Alur Pendaftaran <?= base_url(); $data->username;?>">
            </div>
            <?php if($data->level == 5) { ?>
            <div class="col" >
                 <img src="<?= base_url();?>assets/img/alur-smp.jpg" class="img-fluid" style="width: 100%; height: 100%;" alt="Pendaftaran <?= $data->username;?>">
            </div>
            <?php }?>
        </div>
     </div>
 <?php } ?>
 <?php if(($this->uri->segment('2') === 'cetakformulir') || ($this->uri->segment('1') === 'Pendaftaran')) {?>
    <div class="container formpage">
        <table width="100%">
            <tr>
                <td width="25" style="padding: 0" align="center"><img style="margin: 0 20px;" src="<?= base_url();?>/assets/img/yysn.png" width="80%"></td>
                <td width="75" align="center">
                    <h2 class="h3" style="margin: 0">YAYASAN TAMAN PENDIDIKAN AL-AMIN</h2>
                    <h1 style="margin: 0 auto; padding: 0 auto" class="font-weight-bolder"><?= $lembaga;?></h2>
                    <h5 class="h6 font-weight-normal" style="margin: 0">Jl. Kyai Abdul Karim No.2, Rungkut Menanggal, Gunung Anyar, Surabaya, 60294<br/>Telp. (031) 8709142</h5>
                </td>
            </tr>
        </table>
        <hr id="form">
         <h2 class="mb-4 h3 text-center">FOMULIR PENERIMAAN PESERTA DIDIK BARU <br><?= $lembaga?> TAHUN AJARAN 2021/2022</h2>
         <div class="container ml-4 mr-4 mb-5">
            <h3 class="h5 font-weight-bold">A. KETERANGAN CALON PESERTA DIDIK</h3>
            <table class="ml-3 mr-3  mb-3 data" width="80%">
                <tr class="text-left">
                    <td width="20">No. Pendaftaran </td>
                    <td width="5"> : </td>
                    <td width="50"> <?= $data->username?> </td>
                </tr>
                <tr class="text-left">
                    <td width="20">Nama Lengkap </td>
                    <td width="5"> : </td>
                    <td width="50"> <?= $data->nama?> </td>
                </tr>
                <?php if($level == 5){?>
                    <tr class="text-left">
                        <td width="20">Gelombang </td>
                        <td width="5"> : </td>
                        <td width="50">Gelombang Pendaftaran <?= $data->gelombang?> </td>
                    </tr>
                <?php }?>
                
                <?php if($level == 6){?>
                    <tr class="text-left">
                        <td width="20">Jurusan </td>
                        <td width="5"> : </td>
                        <td width="50"><?= $data->jurusan?> </td>
                    </tr>
                <?php }?>
                <tr class="text-left">
                    <td width="20">NIK</td>
                    <td width="5"> : </td>
                    <td width="50"> <?= $data->nik?> </td>
                </tr>
                
                <tr class="text-left">
                    <td width="20">No. KK</td>
                    <td width="5"> : </td>
                    <td width="50"> <?= $data->nokk?> </td>
                </tr>
				
                <tr class="text-left">
                    <td width="20">No. Akta Kelahiran </td>
                    <td width="5"> : </td>
                    <td width="50"> <?= $data->noakta?> </td>
                </tr>
				
                <tr class="text-left">
                    <td width="20">Jenis Kelamin </td>
                    <td width="5"> : </td>
                    <td width="50"> <?= $data->kelamin?> </td>
                </tr>
                
                <?php if($level !== 4) {?>
                <tr class="text-left">
                    <td width="20">NISN (Nomor Induk Siswa Nasional) </td>
                    <td width="5"> : </td>
                    <td width="50"> <?= $data->nisn?> </td>
                </tr>
                <?php }?>
                
                <tr class="text-left">
                    <td width="20">Tempat / Tanggal Lahir </td>
                    <td width="5"> : </td>
                    <td width="50"> <?= $data->tempatlahir?> / <?= $tanggal = tgl_indo($data->tanggallahir);?> </td>
                </tr>
                <tr class="text-left">
                    <td width="20">Anak Ke </td>
                    <td width="5"> : </td>
                    <td width="50"> <?= intval($data->anakke)?> dari <?= intval($data->anakke) + intval($data->jumlahsaudarakandung)?> bersaudara </td>
                </tr>
                <tr class="text-left">
                    <td width="20">Status Dalam Keluarga </td>
                    <td width="5"> : </td>
                    <td width="50"> <?= $data->statusanak?> </td>
                </tr>
                <tr class="text-left">
                    <td width="20">Jumlah Saudara </td>
                    <td width="5"> : </td>
                    <td width="50"> Kandung = <?= intval($data->jumlahsaudarakandung)?> , Tiri = <?= intval($data->jumlahsaudaratiri)?> , Angkat = <?= intval($data->jumlahsaudaraangkat)?> </td>
                </tr>
                <tr class="text-left">
                    <td width="20">Alamat Tempat Tinggal </td>
                    <td width="5"> : </td>
                    <td width="50"> <?= $data->alamat?>, RT <?= $data->rt?>, RW <?= $data->rw?>, Kel. <?= $data->kelurahan?>, Kec. <?= $data->kecamatan?>, Kab/Kota. <?= $data->kabupaten?>  </td>
                </tr>
                <tr class="text-left">
                    <td width="20">No Telp. / HP Yang dapat Dihubungi </td>
                    <td width="5"> : </td>
                    <td width="50"> <?= $data->no_hp?> </td>
                </tr>
                <?php if($level !== 4) {?>
                <tr class="text-left">
                    <td width="20">Sekolah Asal </td>
                    <td width="5"> : </td>
                    <td width="50"> <?= $data->asalsekolah?> </td>
                </tr>
                <?php }?>
            </table>
            <h3 class="h5 font-weight-bold">B. KETERANGAN ORANG TUA CALON PESERTA DIDIK</h3>
            <div class="row ml-3 mr-3 mb-3">
                <div class="col" id="ayah">
                <h3 class="text-left h5 font-weight-bold">Data Ayah</h3>
                    <table class="data " width="80%">
                        <tr class="text-left">
                            <td width="20">Nama Lengkap </td>
                            <td width="5"> : </td>
                            <td width="50"> <?= $data->namaayah?> </td>
                        </tr>
						<tr class="text-left">
                            <td width="20">NIK Ayah </td>
                            <td width="5"> : </td>
                            <td width="50"> <?= $data->nikayah?> </td>
                        </tr>
                        <tr class="text-left">
                            <td width="20">Tempat / Tanggal Lahir </td>
                            <td width="5"> : </td>
                            <td width="50"> <?= $data->tempatlahirayah?> / <?= tgl_indo($data->tanggallahirayah)?> </td>
                        </tr>
                        <!-- <tr class="text-left">-->
                        <!--    <td width="20">Agama </td>-->
                        <!--    <td width="5"> : </td>-->
                        <!--    <td width="50"> <?= $data->agamaayah?> </td>-->
                        <!--</tr>-->
                        <tr class="text-left">
                            <td width="20">Pendidikan Terakhir </td>
                            <td width="5"> : </td>
                            <td width="50"> <?= $data->pendidikanayah?> </td>
                        </tr>
                        <tr class="text-left">
                            <td width="20">Pekerjaan Ayah </td>
                            <td width="5"> : </td>
                            <td width="50"> <?= $data->pekerjaanayah?> </td>
                        </tr>
                        <tr class="text-left">
                            <td width="20">Penghasilan Ayah </td>
                            <td width="5"> : </td>
                            <td width="50"> <?= $data->penghasilanayah?> </td>
                        </tr>
                        <tr class="text-left">
                            <td width="20">No. Telp. / HP Yang Dapat Dihubungi </td>
                            <td width="5"> : </td>
                            <td width="50"> <?= $data->notelayah?> </td>
                        </tr>
                    </table>
                </div>
                <div class="col" id="ibu">
                <h3 class="text-left h5 font-weight-bold">Data Ibu</h3>
                    <table class="data " width="80%">
                        <tr class="text-left">
                            <td width="20">Nama Lengkap </td>
                            <td width="5"> : </td>
                            <td width="50"> <?= $data->namaibu?> </td>
                        </tr>
						<tr class="text-left">
                            <td width="20">NIK Ibu </td>
                            <td width="5"> : </td>
                            <td width="50"> <?= $data->nikibu?> </td>
                        </tr>
                        <tr class="text-left">
                            <td width="20">Tempat / Tanggal Lahir </td>
                            <td width="5"> : </td>
                            <td width="50"> <?= $data->tempatlahiribu?> / <?= tgl_indo($data->tanggallahiribu)?> </td>
                        </tr>
                        <!-- <tr class="text-left">-->
                        <!--    <td width="20">Agama </td>-->
                        <!--    <td width="5"> : </td>-->
                        <!--    <td width="50"> <?= $data->agamaibu?> </td>-->
                        <!--</tr>-->
                        <tr class="text-left">
                            <td width="20">Pendidikan Terakhir </td>
                            <td width="5"> : </td>
                            <td width="50"> <?= $data->pendidikanibu?> </td>
                        </tr>
                        <tr class="text-left">
                            <td width="20">Pekerjaan ibu </td>
                            <td width="5"> : </td>
                            <td width="50"> <?= $data->pekerjaanibu?> </td>
                        </tr>
                        <tr class="text-left">
                            <td width="20">Penghasilan ibu </td>
                            <td width="5"> : </td>
                            <td width="50"> <?= $data->penghasilanibu?> </td>
                        </tr>
                        <tr class="text-left">
                            <td width="20">No. Telp. / HP Yang Dapat Dihubungi </td>
                            <td width="5"> : </td>
                            <td width="50"> <?= $data->notelibu?> </td>
                        </tr>
                    </table>
                </div>
            </div>
            <h3 class="h5 font-weight-bold">C. KETERANGAN WALI CALON PESERTA DIDIK</h3>
            <table class="ml-3 mr-3 data  mb-3" width="80%">
                <tr class="text-left">
                    <td width="20">Nama Lengkap </td>
                    <td width="5"> : </td>
                    <td width="50"> <?= $data->namawali?> </td>
                </tr>
                <tr class="text-left">
                    <td width="20">Alamat </td>
                    <td width="5"> : </td>
                    <td width="50"> <?= $data->alamatwali?> </td>
                </tr>
                <tr class="text-left">
                    <td width="20">Pekerjaan </td>
                    <td width="5"> : </td>
                    <td width="50"> <?= $data->pekerjaanwali?> </td>
                </tr>
                <tr class="text-left">
                    <td width="20">Hubungan Perwalian </td>
                    <td width="5"> : </td>
                    <td width="50"> <?= $data->hubunganwali?></td>
                </tr>
                <tr class="text-left">
                    <td width="20">No. Telp. / HP Yang Dapat Dihubungi </td>
                    <td width="5"> : </td>
                    <td width="50"> <?= $data->notelwali?></td>
                </tr>
            </table>
            <!-- <div class="container"> -->
            
         </div>
         
        <div class="row mt-5 justify-content-between">
                        <div class="col text-center">
                            <h5 class="mb-5">Mengetahui <br> Orang Tua / Wali Murid</h5>
                            <br>
                            <h5 class="mt-5">( .............................. )</h5>
                        </div>
                        <div class="col text-center">
                            <div class="border" style="width: 3cm; height: 4cm; margin: 0 20mm;">
                                <h6>Pas Foto 3x4cm Calon Peserta Didik</h6>
                            </div>
                        </div>
                        <div class="col text-center">
                            <h5 class="mb-5">Calon Peserta Didik</h5>
                            <br>
                            <br>
                            <h5 class="mt-5"><?= $data->nama?></h5>
                        </div>
                <!-- </div> -->
            </div>
    </div>
    <!--<hr>-->
 <?php }?>
 
 </body>
 </html>