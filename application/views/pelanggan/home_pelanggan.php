<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sistem Informasi Sales and Distribution</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="sidenav-header-inner text-center"><img src="<?php echo base_url(); ?>assets/assets/images/logo/logo_CVicommits.jpg" alt="person" class="img-fluid rounded-circle">
                            <h3 class="h5">SISTEM INFORMASI SALES AND DISTRIBUTION</h3>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>


                        <li class="sidebar-item ">
                            <a href="<?php echo base_url() . "index.php/Pelanggan/index"; ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="<?php echo base_url() . "index.php/Pelanggan/status_produkweb"; ?>" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Pemesanan Website</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="<?php echo base_url() . "index.php/Pelanggan/status_produkpel"; ?>" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Pembelian Produk</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="<?php echo base_url() . "index.php/Pelanggan/list_pemesanan"; ?>" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>List Pemesanan</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="<?php echo base_url() . "index.php/Welcome/logout"; ?>" class='sidebar-link'>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            </nav>
                        </div>
                    </div>
                </div>

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Welcome</h4>
                        </div>
                        <?php if(isset($_SESSION['nama'])){?>
                        <div class="card-body">
                            Selamat datang di dashboard Pelanggan, <?php echo $_SESSION['nama'];?>!
                        </div>
                        <?php }?>
                    </div>
                </section>

            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets/js/pages/dashboard.js"></script>

    <script src="<?php echo base_url(); ?>assets/assets/js/mazer.js"></script>
</body>

</html>