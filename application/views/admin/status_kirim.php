<?php
function rupiah($angka){
    $hasil_rupiah = "Rp ".number_format($angka,2,',','.');
    return $hasil_rupiah;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk dan Layanan</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
<div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
        <div class="sidenav-header-inner text-center"><img src="<?php echo base_url();?>assets/assets/images/logo/logo_CVicommits.jpg" alt="person" class="img-fluid rounded-circle">
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
            
            <li
                class="sidebar-item ">
                <a href="<?php echo base_url()."index.php/Admin/index";?>" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Supplier</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="<?php echo base_url()."index.php/Admin/data_supplier";?>">Daftar Supplier</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="<?php echo base_url()."index.php/Admin/pembelian_produk";?>">Pemesanan</a>
                    </li>
                </ul>
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="<?php echo base_url()."index.php/Admin/tabel_dataproduk";?>" class='sidebar-link'>
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Data Produk & Layanan</span>
                </a>
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="<?php echo base_url()."index.php/Admin/tabel_datapelanggan";?>" class='sidebar-link'>
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    <span>Data Pelanggan</span>
                </a>
            </li>

            <li
                class="sidebar-item  ">
                <a href="<?php echo base_url()."index.php/Admin/data_invoice";?>" class='sidebar-link'>
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    <span>Laporan Penjualan</span>
                </a>
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="<?php echo base_url()."index.php/Admin/data_insight";?>" class='sidebar-link'>
                    <i class="bi bi-bar-chart-fill"></i>
                    <span>Grafik Penjualan</span>
                </a>
            </li>

            <li
                class="sidebar-item  ">
                <a href="<?php echo base_url()."index.php/Admin/pemesanan_web";?>" class='sidebar-link'>
                    <i class="bi bi-image-fill"></i>
                    <span>Pemesanan Website</span>
                </a>
            </li>

            <li
                class="sidebar-item  ">
                <a href="<?php echo base_url()."index.php/Admin/status_produkadm";?>" class='sidebar-link'>
                    <i class="bi bi-image-fill"></i>
                    <span>Status Bukti</span>
                </a>
            </li>

            <li
                class="sidebar-item  ">
                <a href="<?php echo base_url()."index.php/Welcome/logout";?>" class='sidebar-link'>
                    <span>Logout</span>
                </a>
            </li>
            
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

    <!-- Table head options start -->

    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="#" method="post" class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                                <a class="nav-link " id="general_detail_tab" data-toggle="pill" href="<?php echo base_url()."index.php/Admin/status_produkadm";?>">Order</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="activity_detail_tab" data-toggle="pill" href="<?php echo base_url()."index.php/Admin/status_kemas";?>">Dikemas</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" id="portfolio_detail_tab" data-toggle="pill" href="<?php echo base_url()."index.php/Admin/status_kirim";?>">Dikirim</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="settings_detail_tab" data-toggle="pill" href="<?php echo base_url()."index.php/Admin/status_selesai";?>">Selesai</a>
                                            </li>
                                        </ul>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>



    <section class="section">
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Status Bukti Pembayaran</h4>
                    </div>
                    
                        <!-- table head dark -->
                        <div class="table-responsive">
                            <table class="table mb-0" id = "rupiah">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Nomor Rekening</th>
                                        <th>Produk yang Dibeli</th>
                                        <th>Harga Jual</th>
                                        <th>QTY</th>
                                        <th>Total Pembayaran</th>
                                        <th>Status Pengiriman</th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                                <?php $no = 1; foreach ($data_kirim->result_array() as $d) {?>
                                <tbody>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['nama_lengkap'] ?></td>
                                    <td><?php echo $d['no_rek'] ?></td>
                                    <td>
                                        <?php
                                            if ($d ['produk']==''){
                                                echo "-";
                                            }
                                            else {
                                                echo "$d[produk]";
                                            } 
                                        ?>
                                    </td>
                                    <td><?php echo rupiah($d['price']) ?></td>
                                    <td><?php echo $d['qty'] ?></td>
                                    <td><?php echo rupiah($d['total']) ?></td>
                                    <td><?php echo $d['status'] ?></td>
                                    <td><center>
                                        <a href="<?php echo base_url()."index.php/Admin/do_edit_selesai/".$d['id_pelanggan'];?>" ><span class="btn btn-sm btn-danger rounded-pill waves-effect waves-light">Selesai</span></a>
                                        <!--<a href="<?php echo base_url()."index.php/Admin/do_edit_kemas/".$d['id_pelanggan'];?>" ><span class="btn btn-sm btn-primary waves-effect waves-light text-white">Pengemasan</span></a>-->
                                        </center>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Table head options end -->

                        <!--........-->

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                </div>
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url();?>assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/mazer.js"></script>

                            
</body>

</html>
