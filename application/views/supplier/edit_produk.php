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
    <title>Edit Data Produk</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/bootstrap.css">
    
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
                <a href="<?php echo base_url()."index.php/Supplier/index";?>" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            
            <li
                class="sidebar-item  ">
                <a href="<?php echo base_url()."index.php/Supplier/data_produk";?>" class='sidebar-link'>
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Data Produk</span>
                </a>
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    <span>Data Pemesanan</span>
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
                        <h4 class="card-title">Tambah Data Produk dan Layanan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?php echo base_url()."index.php/Supplier/do_edit_produk";?>" method="post" class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                            <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
                                        <div class="col-md-4">
                                            <label>Kategori</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kategori" class="form-control" name="kategori" value="<?php echo $kategori; ?>"
                                                placeholder="Kategori">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Produk</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="produk" class="form-control" name="produk" value="<?php echo $produk; ?>"
                                                placeholder="Produk">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Satuan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="satuan" class="form-control" name="satuan" value="<?php echo $satuan; ?>"
                                                placeholder="Satuan">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Harga Jual</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="" class="form-control" name="harga_jual" value="<?php echo $harga_jual; ?>"
                                                placeholder="Harga jual">
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Edit Data</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1" onclick="return confirm('Hapus data yang telah dimasukan?')">Hapus</button>
                                        </div>
                                    </div>
                                </div>
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
