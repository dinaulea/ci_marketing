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
    <title>Tabel Data Pelanggan</title>
    
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
    <section class="section">
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Data Pelanggan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        <a href="<?php echo base_url()."index.php/Admin/tambah_pelanggan/";?>" class="btn btn-primary rounded-pill">Tambah</a>
                        <a href="<?php echo base_url()."index.php/Admin/cetak_pelanggan/";?>" class="btn btn-primary rounded-pill">Cetak Data</a>
                        </div>
                        <!-- table head dark -->
                        <div class="table-responsive">
                            <table class="table mb-0" id = "rupiah">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>ID Pelanggan</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Nama Pelanggan</th>
                                        <th>NIK</th>
                                        <th>Alamat Pelanggan</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan</th>
                                        <th>Nomor HP</th>
                                        <th>Email</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Alamat Perusahaan</th>
                                        <th>Jabatan</th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                                <?php $no = 1; foreach ($data as $d) {?>
                                <tbody>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['id_pelanggan'] ?></td>
                                    <td><?php echo $d['username'] ?></td>
                                    <td><?php echo $d['password'] ?></td>
                                    <td><?php echo $d['nama'] ?></td>
                                    <td><?php echo $d['nik'] ?></td>
                                    <td><?php echo $d['alamat'] ?></td>
                                    <td><?php echo $d['nama_kec'] ?></td>
                                    <td><?php echo $d['nama_kelurahan'] ?></td>
                                    <td><?php echo $d['nomor_hp'] ?></td>
                                    <td><?php echo $d['email'] ?></td>
                                    <td>
                                        <?php
                                            if ($d ['nama_perusahaan']==''){
                                                echo "-";
                                            }
                                            else {
                                                echo "$d[nama_perusahaan]";
                                            } 
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($d ['alamat_perusahaan']==''){
                                                echo "-";
                                            }
                                            else {
                                                echo "$d[alamat_perusahaan]";
                                            } 
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($d ['jabatan']==''){
                                                echo "-";
                                            }
                                            else {
                                                echo "$d[jabatan]";
                                            } 
                                        ?>
                                    </td>

                                    <?php
                                    $sql=$this->db->query("select * from kecamatan ")->row();
                                    $kec=$sql->nama_kec;
                                 
                                    $this->db->query("update login set kecamatan='$kec' where kecamatan='$d[id_kecamatan]' and id='$d[id]'");

                                    $sql2=$this->db->query("select * from kelurahan ")->row();
                                    $kel=$sql2->nama_kelurahan;
                   
                                    $this->db->query("update login set kelurahan='$kel' where kelurahan='$d[id_kelurahan]' and id='$d[id]'");
                                    ?>

                                    <?php
                                    $nomor_hp = hp($d['nomor_hp']);
                                    $message = '&text=' . urlencode('Untuk melanjutkan login ke website, silahkan akses link berikut dengan akun yang sudah disediakan. LINK : localhost/ci_marketing/ (contoh). Gunakan Username dan Password berikut = Username : ' . $d['username'] . ' dan Password : ' . $d['password']);

                                    if ($this->agent->is_mobile()) $linkWA = 'https://api.whatsapp.com//send?phone=' . $nomor_hp . $message;

                                    else $linkWA = 'https://api.whatsapp.com//send?phone=' . $nomor_hp . $message;
                                    ?>

                                    <td><center>
                                        <a href="<?php echo base_url()."index.php/Admin/edit_pelanggan/".$d['id_pelanggan'];?>" ><span class="btn btn-sm btn-warning rounded-pill waves-effect waves-light">Edit</span></a>&nbsp; 
                                        <a target="_blank" href="<?php echo $linkWA ?>" target="_blank"><span class="btn btn-sm btn-info rounded-pill waves-effect waves-light">Kirim Akun</span></a> &nbsp;
                                        <a href="<?php echo base_url()."index.php/Admin/hapus_pelanggan/".$d['id_pelanggan'];?>" ><span class="btn btn-sm btn-danger rounded-pill waves-effect waves-light">Hapus</span></a>
                                        <!--<a href="<?php echo base_url()."index.php/Admin/do_edit_kemas/".$d['id_pelanggan'];?>" ><span class="btn btn-sm btn-primary waves-effect waves-light text-white">Pengemasan</span></a>-->
                                        </center>
                                    </td>
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
    <script src="<?php echo base_url();?>assets/assets/js/mazer.js"></script>

                            
</body>

</html>
