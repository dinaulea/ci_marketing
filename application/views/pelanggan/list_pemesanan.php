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
  <title>List Pembayaran</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/bootstrap.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/vendors/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/app.css">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/assets/images/logo/icommits.png" type="image/x-icon">
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
                <h4 class="card-title">Tabel List Pembayaran</h4>
              </div>
              <div class="card-content">
                <!-- table head dark -->
                <div class="table-responsive">
                  <table class="table mb-0" id="rupiah">
                    <thead class="thead-dark">
                      <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Produk</th>
                        <th>Price</th>
                      </tr>
                    </thead>
                    <?php $no = 1;
                    foreach ($pemesanan->result_array() as $d) { ?>
                      <tbody>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $d['nama_pelanggan'] ?></td>
                          <td><?php echo $d['produk'] ?></td>
                          <td>
                            <?php echo rupiah($d['total'])
                            ?>
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

      <section class="section">
        <div class="row" id="table-head">
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Total Pembayaran</h4>
              </div>
              <div class="card-content">
                <!-- table head dark -->
                <div class="table-responsive">
                <table class="table mb-0" id="rupiah">
                    <thead class="thead-dark">
                      <tr>
                        <th>No</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <?php $no = 1;
                    foreach ($totalbeli->result_array() as $e) { ?>
                      <tbody>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <?php
                    }
                      ?>
                          <?php
                              $sum = $this->db->query("select sum(total) as totalbiaya from invoice where no_invoice = '$d[no_invoice]'")->row();
                              $total=$sum->totalbiaya;
                          ?>
                          <td>
                            <?php echo rupiah($total);?>
                          </td>
                          <?php $no = 1;
                          foreach ($totalbeli->result_array() as $e) { ?>
                          <td>
                            <a href="<?php echo base_url()."index.php/Pelanggan/bayar/".$e['pelanggan_id'];?>" target="_blank"><span class="btn btn-sm btn-info rounded-pill waves-effect waves-light">Bayar</span></a>
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
  <script src="<?php echo base_url(); ?>assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/assets/js/mazer.js"></script>


</body>

</html>