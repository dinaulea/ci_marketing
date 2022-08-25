<?php
$tgl=date('dmyHi');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Invoice</title>
    
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

    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Invoice</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?php echo base_url()."index.php/Admin/do_input_invoice_it";?>" method="post" class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                    <input type="date" id="" class="form-control" name="id" hidden>

                                        <div class="col-md-4">
                                            <label>No Invoice</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="" class="form-control" name="no_invoice"  value="<?php
                                            $this->db->order_by('id','desc');
                                            $kode = $this->db->get('invoice')->row()->no_invoice;
                                            $kode_baru = "INV".(substr($kode, 3, strlen($kode)-3) + 1);
                                            echo $kode_baru;
                                              
                                            ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>NIK</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select class="form-control" id="nik" name="nik[]">
                                                    <option value="">--</option>
                                                    <?php foreach($idpelanggan as $l){ ?>
                                                    <option value="<?php echo $l['nik']; ?>"><?php echo $l['nik']; ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nama Pelanggan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama" class="form-control" name="nama_pelanggan">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>ID Pelanggan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="id_pelanggan" class="form-control" name="pelanggan_id">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Alamat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="alamat" class="form-control" name="alamat">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="email" class="form-control" name="email">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Tanggal Mulai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" id="" class="form-control" name="date">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Tanggal Akhir</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" id="" class="form-control" name="due"> 
                                        </div>
                                    </div>
                                    
 
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Jenis Sistem Informasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select class="form-control" name="jenis_sistem">
                                                    <option value="">--</option>
                                                    <option value="mobile">Mobile</option>
                                                    <option value="website">Website</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                                <label>Deskripsi Sistem Informasi</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <textarea type="text" id="" class="form-control" name="desk_sistem"></textarea>
                                            </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Kategori</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="" class="form-control" name="kategori" value="IT" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                                <label>QTY</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="" class="form-control" name="qty">  
                                            </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Price</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="" class="form-control" name="price">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Uang Muka</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="" class="form-control" name="uang_muka">
                                        </div>
                                    </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1" onclick="return confirm('Hapus data yang telah dimasukan?')">Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <script src="<?php echo base_url();?>assets/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- <script src="<?php echo base_url();?>assets/assets/jquery/jquery.min.js"></script> -->

    <script src="<?php echo base_url();?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/mazer.js"></script>
    
    <script>
     $(document).ready(function(){
       var nextform = 0;
       // tambah isian form
       $("#btn-tambah-form").click(function(){
         nextform++;
        
         $("#insert-form").append(
           "<div id='row"+nextform+"'>" +
        "<input type='hidden' name='no_invoice[]'  value='<?php
                                            $this->db->order_by('id','desc');
                                            $kode = $this->db->get('invoice')->row()->no_invoice;
                                            $kode_baru = 'INV'.(substr($kode, 3, strlen($kode)-3) + 1);
                                            echo $kode_baru;
                                            ?>'  required> " +
        "<input type='hidden' name='nama_pelanggan[]'  placeholder='nama_pelanggan'  required> " +
        "<input type='hidden' name='nik[]'  placeholder='nik'  required> " +
        "<input type='hidden' name='email[]'  placeholder='email'  required> " +
        "<input type='hidden' name='alamat[]'  placeholder='alamat'  required> " +
        "<input type='hidden' name='date[]'  placeholder='date'  required> " +
        "<input type='hidden' name='due[]'  placeholder='due'  required> " +
        "<input type='hidden' name='kategori[]' value='Non IT'  required> " +
        "<select  name='produk[]'><?php foreach($idproduk as $l){ ?><option value='<?php echo $l['produk']; ?>'><?php echo $l['produk']; ?> </option><?php } ?> </select>" +
        "<input type='text' name='qty[]'  placeholder='qty'  required> " +
        "<input type='text' name='price[]'  placeholder='price'  required> "  +
      
   

        //   
            
        '<button type="button"  id="'+nextform+'" class="btn_remove btn btn-outline-secondary">Hapus</button>'
         );
         $("#jumlah-form").val(nextform);
       });

       // menghapus form tertentu
       $(document).on('click', '.btn_remove', function(){
         var button_id = $(this).attr("id");
         $('#row'+button_id+'').remove();
       });

       // menghapus semua form
       $("#btn-reset-form").click(function(){
         $("#insert-form").html("");
         });
     });
   </script>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- // Basic Horizontal form layout section end -->
</div>


            <footer>
                <script>
                    $("#nik").change(function(){
                        var nik = $(this).val();
                        $.ajax({
                            type: "POST",
                            url: '<?php echo base_url()."index.php/Admin/tes";?>',
                            data: {nik:nik},
                            dataType: 'text',
                            success: function(result){
                                console.log("tes",result)
                                var data = JSON.parse(result);
                                var id_pelanggan = data.id_pelanggan;
                                var nama = data.nama;
                                var email = data.email;
                                var alamat = data.alamat;
                                $('#id_pelanggan').val(id_pelanggan);
                                $('#nama').val(nama);
                                $('#email').val(email);
                                $('#alamat').val(alamat);
                            }, error:function(xhr, ajaxOptions,thrownError){
                                console.log(xhr);
                                console.log(ajaxOptions);
                                console.log(thrownError);
                            }
                        });
                    });
                </script>

<!--
                <script>
                    $("#produk").change(function(){
                        var produk = $(this).val();
                        $.ajax({
                            type: "POST",
                            url: '<?php echo base_url()."index.php/Admin/tes2";?>',
                            data: {produk:produk},
                            dataType: 'text',
                            success: function(result){
                                console.log("tes",result)
                                var data = JSON.parse(result);
                                var price = data.price;
                                console.log("tes id",price);
                                $('#price').val(price);
                            }, error:function(xhr, ajaxOptions,thrownError){
                                console.log(xhr);
                                console.log(ajaxOptions);
                                console.log(thrownError);
                            }
                        });
                    });
                </script>
                -->
            </footer>
        </div>
    </div>
    

    



   




   
</body>

</html>
