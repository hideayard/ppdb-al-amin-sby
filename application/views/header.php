<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <!-- Primary Meta Tags -->
    <?php if($this->session->userdata('role')) {?>
    <title>Welcome | <?= $this->session->userdata('role')?></title>
    <?php } ?>
    <title>PPDB Al Amin Surabaya</title>
    <meta name="title" content="PPDB Al Amin Surabaya">
    <meta name="description" content="Pendaftaran peserta didik baru al amin surabaya, ppdb al amin sby, ppdb al amin surabaya, pendaftaran smp al amin surabaya, pendaftaran smk al amin surabaya ">
    <meta property="og:title" content="PPDB Al Amin Surabaya">
    <meta property="og:description" content="Pendaftaran peserta didik baru al amin surabaya, ppdb al amin sby, ppdb al amin surabaya, pendaftaran smp al amin surabaya, pendaftaran smk al amin surabaya ">
    <meta property="twitter:title" content="PPDB Al Amin Surabaya">
    <meta property="twitter:description" content="Pendaftaran peserta didik baru al amin surabaya, ppdb al amin sby, ppdb al amin surabaya, pendaftaran smp al amin surabaya, pendaftaran smk al amin surabaya ">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?= base_url()?>assets/img//favicon.ico" type="image/x-icon">
    <!--<title>PPDB AL AMIN SURABAYA</title>-->

    <!-- script -->
    <script src="https://kit.fontawesome.com/876ace64f6.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
    html{
      scroll-behavior: smooth;
    }
    body {
    font-family: 'Poppins', sans-serif;
    }
    .container {
      padding-left: 50px;
      padding-right: 50px;
      margin-left: auto;
      margin-right: auto;
    }
    #kontak {
      padding-left: 0;
    }
    #kontak > li{
      list-style: none;
      padding-bottom: 12px;
      padding-top: 12px;
    }


    /* table */
.table-container {
    height: 50vh;
}
table {
    display: flex;
    flex-flow: column;
    height: 100%;
    width: 100%;
}
table thead {
    /* head takes the height it requires, 
    and it's not scaled when table is resized */
    flex: 0 0 auto;
    width: calc(100% - 1.05em);
    display: table;
    table-layout: fixed;
}
table tbody {
    /* body takes all the remaining available space */
    flex: 1 1 auto;
    display: block;
    overflow-y: scroll;
    width: 100%;
}
table tbody tr {
    width: 100%;
}

table tbody tr {
    display: table;
    width: 100%;
    table-layout: fixed;
}

.form-group > label {
  text-transform : capitalize;
}
    </style>
  </head>
  <body>
