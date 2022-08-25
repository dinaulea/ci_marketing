<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pelanggan</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/assets/images/favicon.svg" type="image/x-icon">
    <script src="<?php echo base_url();?>assets/assets/vendors/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Pelanggan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?php echo base_url()."index.php/Admin/do_tambah_pelanggan";?>" method="post" class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                    <input type="text" id="" class="form-control" name="id"
                                                placeholder="Nama Pelanggan" hidden>
                                        <div class="col-md-4">
                                            <label>ID</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="hidden" name="level" value="pelanggan">
                                        <input type="text" class="form-control" id="" placeholder="" name="id_pelanggan" readonly="" value="<?php
                                        $this->db->order_by('id','desc');
                                        $kode = $this->db->get('login')->row()->id_pelanggan;
                                        $kode_baru = "PLG".(substr($kode, 3, strlen($kode)-3) + 1);
                                        echo $kode_baru;
                                        ?>">  
                                        </div>
                                                
                                        <div class="col-md-4">
                                            <label>Username</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kategori" class="form-control" name="username"
                                                placeholder="Username" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kategori" class="form-control" name="password"
                                                placeholder="Password" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Nama Pelanggan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kategori" class="form-control" name="nama"
                                                placeholder="Nama Pelanggan" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>NIK</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="" class="form-control" name="nik"
                                                placeholder="NIK" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Alamat Pelanggan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea type="text" id="produk" class="form-control" name="alamat"
                                                placeholder="Alamat Pelanggan" required></textarea>
                                        </div>


                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password-vertical">Kecamatan</label>
                                                <select name="kecamatan" id="kecamatan" class="form-control">
                                                <option value="">Pilih Kecamatan</option>
                                                <?php
                                                foreach ($kecamatan as $row) {
                                                    echo '<option value="' . $row->id_kecamatan . '">' . $row->nama_kec . '</option>';
                                                }
                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password-vertical">kelurahan</label>
                                                            <select name="kelurahan" id="kelurahan" class="form-control">
                                                                <option value="">Pilih Kelurahan</option>
                                                                <?php
                                                                ?>
                                                            </select>
                                                </div>
                                            </div>

                                        <div class="col-md-4">
                                            <label>Nomor HP</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="" class="form-control" name="nomor_hp"
                                                placeholder="Nomor HP" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="" class="form-control" name="email"
                                                placeholder="Email" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nama Perusahaan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" class="form-control" name="nama_perusahaan"
                                                placeholder="Nama Perusahaan">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Alamat Perusahaan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea type="text" class="form-control" name="alamat_perusahaan"
                                                placeholder="Alamat Perusahaan"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jabatan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"  class="form-control" name="jabatan"
                                                placeholder="Jabatan">
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1" onclick="return confirm('Hapus data yang telah dimasukan?')">Hapus</button>
                                        </div>
                                    </div>
                                </div>

    <script src="<?php echo base_url();?>assets/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>

    <script>
    $(document).ready(function() {

        //request data kabupaten
        $('#kecamatan').change(function() {
            var id_kecamatan = $('#kecamatan').val(); //ambil value id dari provinsi

            if (id_kecamatan != '') {
                $.ajax({
                    url: '<?= base_url(); ?>Admin/get_kelurahan',
                    method: 'POST',
                    data: {
                        id_kecamatan: id_kecamatan
                    },
                    success: function(data) {
                        $('#kelurahan').html(data)
                    }
                });
            }
        });
    

        //jika tombol kirim di klik
        $('#btnKirim').click(function() {
           
            var kecamatan = $('#kecamatan').val();
            var desa = $('#kelurahan').val();
            $('#dataprov').html(dataprov);
            $('#datakab').html(kabupaten);
            $('#datakec').html(kecamatan);
            $('#datades').html(desa);
        });

    });
</script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- // Basic Horizontal form layout section end -->
</div>

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