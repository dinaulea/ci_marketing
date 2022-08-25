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
    <title>Data Produk Supplier</title>
    
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
                <a href="<?php echo base_url()."index.php/Supplier/pembelian_produk";?>" class='sidebar-link'>
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

    <!-- Table head options start -->
    <section class="section">
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Data Produk Supplier</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        <a href="<?php echo base_url()."index.php/Supplier/tambah_produk";?>" class="btn btn-primary rounded-pill">Tambah</a>
                        </div>
                        <!-- table head dark -->
                        <div class="table-responsive">
                            <table class="table mb-0" id = "">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Produk</th>
                                        <th>Foto Produk</th>
                                        <th>Satuan</th>
                                        <th>Harga Jual</th>
                                        <th><center>Status Produk</center></th>
                                        <!--
                                        <th><center>Status Validasi</center></th>
                                        -->
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                                <?php $no = 1; foreach ($data as $d) {?>
                                <tbody>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['kategori'] ?></td>
                                    <td><?php echo $d['produk'] ?></td>
                                    <td><img src="<?php echo base_url() . 'assets/file_produksup/' . $d['foto_produk']; ?>" height="100px" width="100px">
                                        <br><a href="<?php echo base_url().'assets/file_produksup/' .$d['foto_produk']; ?>" download><i class="icon-trash"></i>&nbsp; Download</a></br>
                                    </td>
                                    <td><?php echo $d['satuan'] ?></td>
                                    <td><?php echo rupiah($d['harga_jual']) ?></td>
                                    <td><center>
                                    <?php
                                    if ($d['satuan'] > 0) {
                                        echo "Tersedia";
                                    }else{
                                        echo "Tidak Tersedia";
                                    }
                                    ?>
                                    </center>
                                    </td>
                                    <td><center>
                                        <a href="<?php echo base_url()."index.php/Supplier/edit_produk/".$d['id_produk'];?>" onClick="return confirm('Apakah Anda ingin mengedit data?');"><i class="icon-trash"></i>Edit</a> &nbsp;&nbsp;&nbsp; 
                                        <a href="<?php echo base_url()."index.php/Supplier/hapus_produk/".$d['id_produk'];?>" onClick="return confirm('Apakah Anda ingin menghapus data dengan nama produk : <?php echo $d['produk'];?>');"><i class="icon-trash"></i> Hapus</a>
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
