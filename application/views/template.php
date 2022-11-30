<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>APPENDEKS</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="<?= base_url('dashboard') ?>" class="logo">
                    <span class="logo-mini"><b>APE</b></span>
                    <span class="logo-lg"><b>APPENDEKS</b></span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-s"><?= $this->session->userdata('user_type') ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        <p><?= $this->session->userdata('user_name') ?></p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left"><a href="<?= base_url('profile') ?>" class="btn btn-default">Profile</a></div>
                                        <div class="pull-right"><a href="<?= base_url('auth/logout') ?>" class="btn btn-default">Sign out</a></div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?= ucfirst($this->session->userdata('user_name')); ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <div class="sidebar-menu">
                        <li>
                            <a href="<?= site_url('dashboard') ?>">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <?php if ($this->session->userdata('user_type') == 'admin') { ?>
                            <li class="header">MENU UTAMA</li>
                            <li>
                                <a href="<?= site_url('siswa') ?>">
                                    <i class="fa fa-user"></i>
                                    <span>Data Siswa</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('pembina') ?>">
                                    <i class="fa fa-user"></i>
                                    <span>Data Pembina</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('ekstrakurikuler') ?>">
                                    <i class="fa fa-pie-chart"></i>
                                    <span>Data Ekskul</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('berita') ?>">
                                    <i class="fa fa-file"></i>
                                    <span>Data Berita</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($this->session->userdata('user_type') == 'pembina') { ?>
                            <li class="header">MENU UTAMA</li>
                            <li>
                                <a href="<?= site_url('pendaftaran') ?>">
                                    <i class="fa fa-file-o"></i>
                                    <span>Data Pendaftar</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('presensi') ?>">
                                    <i class="fa fa-file"></i>
                                    <span>Data Presensi</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('nilai') ?>">
                                    <i class="fa fa-file"></i>
                                    <span>Data Nilai</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($this->session->userdata('user_type') == 'siswa') { ?>
                            <li class="header">MENU UTAMA</li>
                            <li>
                                <a href="<?= site_url('pendaftaran') ?>">
                                    <i class="fa fa-file-o"></i>
                                    <span>Data Ekskul</span>
                                </a>
                            </li>
                            <?php $id_siswa = $this->session->userdata('user_id');
                                  $cek_eskul = $this->session->userdata('cek_eskul');
                                  if ( $id_siswa == $cek_eskul) : ?>
                                <li>
                                    <a href="<?= site_url('presensi') ?>">
                                        <i class="fa fa-file"></i>
                                        <span>Absensi</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= site_url('nilai') ?>">
                                        <i class="fa fa-file"></i>
                                        <span>Nilai Akhir</span>
                                    </a>
                                </li>
                            <?php else : ?>
                                <li>
                                    <a href="#" onclick="return confirm('Silahkan daftar eskul terlebih dahulu!')">
                                        <i class="fa fa-file"></i>
                                        <span> Absensi</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onclick="return confirm('Silahkan daftar eskul terlebih dahulu!')">
                                        <i class="fa fa-file"></i>
                                        <span>Nilai Akhir</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php } ?>
                </section>
            </aside>
            <div class="content-wrapper"> <?php echo $contents ?> </div>
            <footer class="main-footer">
                <strong>Copyright &copy; <a href="http://smanmoyoutara.sch.id/">SMAN 1 Moyo Utara</a>.</strong> All rights reserved.
            </footer>
        </div>

        <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.css"></script>
        <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
        <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
        <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

        <script> $(document).ready(function() { $('.sidebar-menu').tree() }) </script>
        <script> $(document).ready(function() { $('#datatable').DataTable() }) </script>
        <script>
            function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.firstElementChild.className += " w3-border-red";
            }
        </script>
    </body>
</html>