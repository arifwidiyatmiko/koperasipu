<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem Koperasi">
    <meta name="author" content="Arif Widiyatmiko, Riffan Alfarizie">
    <meta name="keywords" content="koperasi, sistem koperasi">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="<?php echo base_url();?>assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url();?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url();?>assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url();?>assets/css/theme.css" rel="stylesheet" media="all">
     <!-- Jquery JS-->
    <script src="<?php echo base_url();?>assets/vendor/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        function isNumber(evt) {
                                    evt = (evt) ? evt : window.event;
                                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                                    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                                        return false;
                                    }
                                    return true;
                                }
    </script>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="<?php echo base_url();?>assets/index.html">
                            <img src="<?php echo base_url();?>assets/images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <?php 
                        if ($this->session->userdata('users_koperasi')->role == 'ANGGOTA') {
                            ?>
                        <li class="<?php if(strtoupper($this->uri->segment(1)) == 'WELCOME'){echo "active";}?>">
                            <a href="<?php echo base_url();?>Welcome">
                                <i class="fas fa-tachometer-alt"></i>Beranda</a>
                        </li>
                            <?php
                        }else{
                            ?>
                        <li class="<?php if(strtoupper($this->uri->segment(1)) == 'PENGURUS'){echo "active";}?>">
                            <a href="<?php echo base_url();?>Pengurus">
                                <i class="fas fa-tachometer-alt"></i>Beranda</a>
                        </li>
                            <?php
                        }
                        ?>
                        
                        <li class="<?php if(strtoupper($this->uri->segment(1)) == 'PEMINJAMAN'){echo "active";}?>">
                            <a href="<?php echo base_url();?>Peminjaman">
                                <i class="fas fa-map-marker-alt"></i>Peminjaman</a>
                        </li>
                        <?php 
                        if ($this->session->userdata('users_koperasi')->role == 'PENGURUS') {
                            ?>
                        <li class="<?php if(strtoupper($this->uri->segment(1)) == 'ANGGOTA'){echo "active";}?>">
                            <a href="<?php echo base_url();?>Anggota">
                                <i class="fas fa-users"></i>Anggota</a>
                        </li>
                            <?php
                        }
                        ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="<?php echo base_url();?>assets/#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="<?php echo base_url();?>assets/login.html">Login</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>assets/register.html">Register</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>assets/forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <h3>Koperasi</h3>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                         <?php 
                        if ($this->session->userdata('users_koperasi')->role == 'ANGGOTA') {
                            ?>
                        <li class="<?php if(strtoupper($this->uri->segment(1)) == 'WELCOME'){echo "active";}?>">
                            <a href="<?php echo base_url();?>Welcome">
                                <i class="fas fa-tachometer-alt"></i>Beranda</a>
                        </li>
                            <?php
                        }else{
                            ?>
                        <li class="<?php if(strtoupper($this->uri->segment(1)) == 'PENGURUS'){echo "active";}?>">
                            <a href="<?php echo base_url();?>Pengurus">
                                <i class="fas fa-tachometer-alt"></i>Beranda</a>
                        </li>
                            <?php
                        }
                        ?>
                        <li class="<?php if(strtoupper($this->uri->segment(1)) == 'PEMINJAMAN'){echo "active";}?>">
                            <a href="<?php echo base_url();?>Peminjaman">
                                <i class="fas fa-edit"></i>Peminjaman</a>
                        </li>
                        <?php 
                        if ($this->session->userdata('users_koperasi')->role == 'PENGURUS') {
                            ?>
                        <li class="<?php if(strtoupper($this->uri->segment(1)) == 'ANGGOTA'){echo "active";}?>">
                            <a href="<?php echo base_url();?>Anggota">
                                <i class="fas fa-users"></i>Anggota</a>
                        </li>
                            <?php
                        }
                        ?>
                        <?php 
                        if ($this->session->userdata('users_koperasi')->role == 'PENGURUS') {
                            ?>
                        <li class="<?php if(strtoupper($this->uri->segment(1)) == 'JAMINAN'){echo "active";}?>">
                            <a href="<?php echo base_url();?>Jaminan">
                                <i class="fas fa-flag"></i>Jaminan</a>
                        </li>
                            <?php
                        }
                        ?>
                        <?php 
                        if ($this->session->userdata('users_koperasi')->role == 'PENGURUS') {
                            ?>
                        <li class="<?php if(strtoupper($this->uri->segment(1)) == 'PEMINJAMAN'){echo "active";}?>">
                            <a href="<?php echo base_url();?>Peminjaman/PengajuanAdmin">
                                <i class="fas fa-handshake-o"></i>Pengajuan Pinjaman</a>
                        </li>
                            <?php
                        }
                        ?>
                        <?php 
                        if ($this->session->userdata('users_koperasi')->role == 'PENGURUS') {
                            ?>
                        <li class="<?php if(strtoupper($this->uri->segment(1)) == 'SIMPANAN'){echo "active";}?>">
                            <a href="<?php echo base_url();?>Simpanan">
                                <i class="fas fa-bank"></i>Simpanan</a>
                        </li>
                            <?php
                        }
                        ?>
                        <?php 
                        if ($this->session->userdata('users_koperasi')->role == 'PENGURUS') {
                            ?>
                        <li class="has-sub">
                            <a class="js-arrow <?php if(strtoupper($this->uri->segment(1)) == 'REPORT'){echo "active";}?>" href="#">
                                <i class="fas fa-copy"></i>Laporan</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="<?php echo base_url();?>Report/Peminjaman">Peminjaman</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>Report/Simpanan">Simpanan</a>
                                </li>
                            </ul>
                        </li>
                            <?php
                        }
                        ?>
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="<?php echo base_url();?>assets/#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="<?php echo base_url();?>assets/login.html">Login</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>assets/register.html">Register</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>assets/forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap pull-right">
                            
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <!-- <div class="image">
                                            <img src="<?php echo base_url();?>assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div> -->
                                        <div class="content">
                                            <a class="js-acc-btn" href="<?php echo base_url();?>assets/#"><?= $this->session->userdata('users_koperasi')->namaLengkap; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <!-- <div class="image">
                                                    <a href="<?php echo base_url();?>assets/#">
                                                        <img src="<?php echo base_url();?>assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div> -->
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="<?php echo base_url();?>assets/#"><?= $this->session->userdata('users_koperasi')->namaLengkap; ?></a>
                                                    </h5>
                                                    <span class="email"><?= $this->session->userdata('users_koperasi')->no_hp; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?php echo base_url();?>Auth/logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
          <?php 
          if ($this->uri->segment(2) == strtolower('pengajuan')) {
              # code...
            ?>
             <!-- modal small -->
            <div class="modal fade" id="konfirmasiPengajuan" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Konfirmasi Pengajuan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <span class="col-sm-6">Nama</span>
                                <span class="col-sm-6"> : <?php echo $this->session->userdata('users_koperasi')->namaLengkap;?></span>
                            </div>
                            <div class="col-sm-12">
                                <span class="col-sm-6">Jumlah Peminjaman</span>
                                <span class="col-sm-6"> : <b id="modal_jumlahPeminjaman"></b></span>
                            </div>
                            <div class="col-sm-12">
                                <span class="col-sm-6">Jenis Peminjaman</span>
                                <span class="col-sm-6"> : <b id="modal_jenisPeminjaman"></b></span>
                            </div>
                            <div class="col-sm-12">
                                <span class="col-sm-6">Biaya Jaminan</span>
                                <span class="col-sm-6"> : <b id="modal_jaminanPeminjaman"></b></span>
                            </div>
                            <div class="col-sm-12">
                                <span class="col-sm-6">Provisi</span>
                                <span class="col-sm-6"> : <b id="modal_provisiPeminjaman"></b></span>
                            </div>
                            <div class="col-sm-12">
                                <span class="col-sm-6">Pelunasan Kredit</span>
                                <span class="col-sm-6"> : <b id="modal_pelunasanKredit"></b></span>
                            </div>
                            <div class="col-sm-12">
                                <span class="col-sm-6">Kekurangan Jasa</span>
                                <span class="col-sm-6"> : <b id="modal_kekuranganJasa"></b></span>
                            </div>
                            <div class="col-sm-12">
                                <span class="col-sm-6">Uang akan Diterima</span>
                                <span class="col-sm-6"> : <b id="modal_uangDiterima"></b></span>
                            </div>
                            <div class="col-sm-12">
                                <span class="col-sm-6">Jumlah Angsuran</span>
                                <input type="text" name="nominalAngsuran" id="nominalAngsuran" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" id="btn_pengajuanPeminjaman_konfirmasi" class="btn btn-primary">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php
          }
          // if ($this->uri->segment(1) == strtolower('jaminan')) {
              # code...
            ?>
             <!-- modal small -->
            <div class="modal fade" id="tambahJaminan" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Tambah Data Jaminan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url();?>Jaminan/tambah" method="post" class="">
                                            <div class="form-group">
                                                <!-- <div class="input-group"> -->
                                                    <label>Umur : </label>
                                                    <input type="number" id="umur" name="umur" placeholder="umur" class="form-control">
                                                <!-- </div> -->
                                            </div>
                                            <div class="form-inline">
                                                <div class="form-group col-sm-6">
                                                    <label>10 Bulan : </label>
                                                    <div class="input-group">
                                                        <input type="text" id="10bulan" name="10bulan" placeholder="0.00" class="form-control">
                                                        <div class="input-group-addon">
                                                            %
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>15 Bulan : </label>
                                                    <div class="input-group">
                                                        <input type="text" id="15bulan" name="15bulan" placeholder="0.00" class="form-control">
                                                        <div class="input-group-addon">
                                                            %
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline">
                                                <div class="form-group col-sm-6">
                                                    <label>20 Bulan : </label>
                                                    <div class="input-group">
                                                        <input type="text" id="username" name="20bulan" placeholder="0.00" class="form-control">
                                                        <div class="input-group-addon">
                                                            %
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>24 Bulan : </label>
                                                    <div class="input-group">
                                                        <input type="text" id="24bulan" name="24bulan" placeholder="0.00" class="form-control">
                                                        <div class="input-group-addon">
                                                            %
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions form-group">
                                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                            </div>
                                        </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
          // }
          ?>
            <!-- HEADER DESKTOP-->