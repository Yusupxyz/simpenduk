<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/css/adminlte.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/skins/_all-skins.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
    <!-- JavaScript -->
    <script src="<?php echo base_url(); ?>assets/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminlte/js/adminlte.js"></script>
    <script src="<?php echo base_url(); ?>assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/datepicker/js/bootstrap-datepicker.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="<?php echo base_url('beranda'); ?>" class="logo">
                <span class="logo-mini"><b>S</b></span>
                <span class="logo-lg"><img src="<?php echo base_url('assets/images/logo_barsel.png'); ?>" width="27"
                        alt="SIMPENDUK"><b>SIMPENDUK</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>

                </a>


                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Selamat datang <?php echo $this->session->userdata('nama_petugas'); ?>
                            </a>

                        </li>
                    </ul>
                </div>
            </nav>
        </header>



        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                    

                    <li><a href="<?php echo base_url('beranda'); ?>"><i class="fa fa-home"></i> <span>Beranda</span></a>
                    </li>


                    <li><a href="<?php echo base_url('penduduk/tampil'); ?>"><i class="fa fa-address-card-o"></i>
                            <span>Data Penduduk</span></a></li>

               
                    <li><a href="<?php echo base_url('Kelahiran/tampil'); ?>"><i class="fa fa-book"
                                aria-hidden="true"></i> <span>Data Kelahiran</span></a></li>
                    <li><a href="<?php echo base_url('Kematian/tampil'); ?>"><i class="fa fa-history"
                                aria-hidden="true"></i> <span>Data Kematian</span></a></li>
                    <li><a href="<?php echo base_url('pindah/tampil'); ?>"><i class="fa fa-arrow-up"
                                aria-hidden="true"></i> <span>Data Pindah</span></a>
                    </li>
                    <li><a href="<?php echo base_url('kedatangan/tampil'); ?>"><i class="fa fa-arrow-down"
                                aria-hidden="true"></i> <span>Data Kedatangan</span></a>
                    </li>



                    <?php
                                                
                                                //jika admin
                                                if ($this->session->userdata('level') == 'admin') {
                                                        ?>
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-envelope-o"></i>
                            <span>Layanan Surat</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url('surat/surat_kelahiran'); ?>"><i
                                        class="fa fa-envelope-o"></i> <span>Surat Kelahiran</span></a></li>
                            <li><a href="<?php echo base_url('surat/surat_kematian'); ?>"><i
                                        class="fa fa-envelope-o"></i> <span>Surat Kematian</span></a></li>
                            <li><a href="<?php echo base_url('surat/domisili'); ?>"><i class="fa fa-envelope-o"></i>
                                    <span>SK Domisili</span></a></li>
                            <li><a href="<?php echo base_url('surat/sktm_kesehatan'); ?>"><i
                                        class="fa fa-envelope-o"></i> <span>SKTM Kesehatan</span></a></li>
                            <li><a href="<?php echo base_url('surat/sktm_pendidikan'); ?>"><i
                                        class="fa fa-envelope-o"></i> <span>SKTM Pendidikan</span></a></li>
                            <li><a href="<?php echo base_url('surat/skck'); ?>"><i class="fa fa-envelope-o"></i>
                                    <span>SKCK</span></a></li>
                            <li><a href="<?php echo base_url('surat/menikah'); ?>"><i class="fa fa-envelope-o"></i>
                                    <span>SK Menikah</span></a></li>
                            <li><a href="<?php echo base_url('surat/belum_menikah'); ?>"><i
                                        class="fa fa-envelope-o"></i> <span>SK Belum Menikah</span></a></li>
                            <li><a href="<?php echo base_url('surat/cerai_mati'); ?>"><i class="fa fa-envelope-o"></i>
                                    <span>SK Cerai Mati</span></a></li>
                            <li><a href="<?php echo base_url('surat/penghasilan'); ?>"><i class="fa fa-envelope-o"></i>
                                    <span>SK Penghasilan</span></a></li>
                    </li>
                </ul>
                </li>
                <?php
                        }
                        //jika admin atau sekertaris
                        if ($this->session->userdata('level') == 'admin') {
                                ?>
                <li><a href="<?php echo base_url('pengguna/'); ?>"><i class="fa fa-users"></i>
                <span>Pengguna</span></a></li>
                <?php
                        }
                        ?>
                
                <li><a href="<?php echo base_url('pengguna/edit_profil/' . $this->session->userdata('id')); ?>"><i class="fa fa-user"
                                aria-hidden="true"></i> <span>Edit Profil</span></a>
                    </li>
                <li><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-power-off"></i> <span>Logout</span></a>
                </li>
                </ul>
            </section>
        </aside>