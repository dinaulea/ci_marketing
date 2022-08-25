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
    <title>Data Invoice</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link src="<?php echo base_url();?>assets/assets/vendors/fontawesome/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/assets/images/logo/icommits.png" type="image/x-icon">
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
    <section class="section">
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Invoice</h4>
                    </div>


                    
                    <div class="card-content">
                        <div class="card-body">
                        <a href="<?php echo base_url()."index.php/Admin/input_invoice";?>" class="btn btn-primary rounded-pill">Invoice Produk Jadi</a>
                        <a href="<?php echo base_url()."index.php/Admin/input_invoice_it";?>" class="btn btn-primary rounded-pill">Invoice Pembuatan Website</a>
                        
                    </div>

                        <section id="basic-horizontal-layouts">
                        <div class="card-content">
                        <div class="card-body">
                        <div align="right">
                            <?php echo form_open("Admin/cari"); ?>
                            <input type="text" name="cari" placeholder="">
                            <button class="btn btn-primary rounded-pill" type="submit"><i class="icon-search icon-black"></i> Search </button>
                            <?php echo form_close(); ?>
                        </div>
                        </div>
                        </div>
                        </section>

                        <section id="basic-horizontal-layouts">
                        <div class="card-content">
                        <div class="card-body">
                        <div align="left">
                            <?php echo form_open("Admin/cetak_cari"); ?>
                            <input type="text" name="cari" placeholder="">
                            <button class="btn btn-success rounded-pill" type="submit"><i class="icon-search icon-black"></i> Print </button>
                            <?php echo form_close(); ?>
                        </div>
                        </div>
                        </div>
                        </section>

                        <!-- table head dark -->
                        <div class="table-responsive">
                            <table class="table mb-0" id = "rupiah">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>No Invoice</th>
                                        <th>Batas Waktu</th>
                                        <th>ID Pelanggan</th>
                                        <th>Nama Pelanggan</th>
                                        <th>NIK</th>
                                        <th>Email</th>
                                        <th>Kategori</th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                                <?php  $no = 1; foreach ($data_invoice->result_array() as $d) {?>
                                <tbody>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['no_invoice'] ?></td>
                                    <td><?php echo $d['date'] ?> -- <?php echo $d['due'] ?> </td>
                                    <td><?php echo $d['pelanggan_id'] ?></td>
                                    <td><?php echo $d['nama_pelanggan'] ?></td>
                                    <td><?php echo $d['nik'] ?></td>
                                    <td><?php echo $d['email'] ?></td>
                                    <td><?php echo $d['kategori'] ?></td>
                                    
                                    <td>
                                        <center>
                                            <?php 
                                            if ($d['kategori'] == "IT")
                                            {
                                                echo anchor('Admin/data_it/'.$d['no_invoice'],'Detail');
                                            } elseif  ($d['kategori'] == "Non IT")  {
                                                echo anchor('Admin/data_nonit/'.$d['no_invoice'],'Detail');
                                            }
                                            ?>
                                            <?php
                                            
                                    $this->db->query("update invoice set pelanggan_id='$d[pelanggan_id]',nama_pelanggan='$d[nama_pelanggan]',date='$d[date]',due='$d[due]',ekspedisi='$d[ekspedisi]' where no_invoice='$d[no_invoice]' and pelanggan_id=''");
                                        
                                            ?>
                                            &nbsp; &nbsp;
                                        <a href="<?php echo base_url()."index.php/Admin/hapus_invoice/".$d['no_invoice'];?>" onClick="return confirm('Apakah Anda ingin menghapus data Invoice ini?');">Hapus</a> &nbsp; &nbsp;
                                        <a href="<?php echo base_url()."index.php/Admin/print_invoice1/".$d['no_invoice'];?>" onClick="return confirm('Apakah Anda ingin mencetak data Invoice ini?');">Cetak</a> &nbsp; &nbsp;
                                        <a href="<?php echo base_url()."index.php/Admin/do_tambah_report/".$d['no_invoice'];?>" >Kirim</a>
                                        

                                        </center>
                                    </td>
                                    <td></td>
                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Table head options end -->

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                </div>
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url();?>assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/vendors/fontawesome/all.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/mazer.js"></script>
    
    <script type="text/javascript">
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e){
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        })

        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g,  '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp.  ' + rupiah : '');
        }
    </script>
                            
</body>

</html>
