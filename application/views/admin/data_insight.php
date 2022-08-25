<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Insight</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/assets/images/favicon.svg" type="image/x-icon">

    <script src="<?php echo base_url()?>/assets/js/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Insight Penjualan</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Insight Produk Terbanyak Dibeli</h4>
                    </div>
                    <div class="card-body">
                    <canvas id="myChart"></canvas>
                    <?php
                    //Inisialisasi nilai variabel awal
                    $nama_produk= "";
                    $jumlah=null;
                    foreach ($hasil as $item)
                    {
                        $produk=$item->produk;
                        $nama_produk .= "'$produk'". ", ";
                        $jum=$item->total;
                        $jumlah .= "$jum". ", ";
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Insight Pelanggan Loyal</h4>
                    </div>
                    <div class="card-body">
                    <canvas id="myChart2"></canvas>
                    <?php
                    //Inisialisasi nilai variabel awal
                    $id_pelanggan= "";
                    $jumlah2=null;
                    foreach ($hasil2 as $item2)
                    {
                        $pelanggan=$item2->pelanggan_id;
                        $id_pelanggan .= "'$pelanggan'". ", ";
                        $jum2=$item2->total2;
                        $jumlah2 .= "$jum2". ", ";
                    }
                    ?>
                    </div>
                    <div align="center"> Pelanggan Loyal =
                        <?php
                        $data_max = $this->db->query("SELECT max(qty) as qty From invoice")->row();
                        $data_max = intval($data_max->qty);
                        $data_jumlah = $this->db->query("SELECT * FROM invoice where qty =".$data_max)->num_rows(); 
                        $data_tertinggi = $this->db->query("SELECT * FROM invoice where qty =".$data_max)->row(); 
                        $jml_duplikat = $this->db->query(" SELECT pelanggan_id, count(*) duplikat from invoice GROUP BY pelanggan_id having duplikat >3")->row();
                        $data_duplikat = $this->db->query(" SELECT pelanggan_id, count(*) duplikat from invoice GROUP BY pelanggan_id having duplikat >3")->result();
                        //print_r($jml_duplikat);die;
                       if ($jml_duplikat->duplikat > 2){
                           foreach ($data_duplikat as $res){
                         echo $res->pelanggan_id.' ,';
                         echo " ";
                           }
                        } else if ($data_max > 1)
                            {
                                echo $data_tertinggi->pelanggan_id.' dengan pembelian terbanyak sebanyak '.$data_max.' Produk';
                            } else  {
                                echo 'Belum ada pelanggan loyal';
                            }
                        
                        ?>
                </div>
            </div>

            <!--
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Insight Daerah Penjualan Produk Terbanyak</h4>
                    </div>
                    <div class="card-body">
                    <canvas id="myChart3"></canvas>
                    <?php
                    //Inisialisasi nilai variabel awal
                    $alamat_pelanggan= "";
                    $jumlah3=null;
                    foreach ($hasil3 as $item3)
                    {
                        $alamat=$item3->alamat;
                        $alamat_pelanggan .= "'$alamat'". ", ";
                        $jum3=$item3->total3;
                        $jumlah3 .= "$jum3". ", ";
                    }
                    ?>
                    </div>
                </div>
            </div>
            -->
            
            <?php
                    //Inisialisasi nilai variabel awal
                    $id_pelanggan4= "";
                    $jumlah4=null;
                    foreach ($hasil4 as $i)
                    {
                        $pelanggan=$i->pelanggan_id;
                        $id_pelanggan4 .= "'$pelanggan'". ", ";
                        $jum4=$i->totall;
                        $jumlah4 .= "$jum4". ", ";
                    }
                    ?>     
                    

        </div>
    </section>
</div>

        </div>
    </div>
    <script src="<?php echo base_url();?>assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="<?php echo base_url();?>assets/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/pages/ui-chartjs.js"></script>

    <script src="<?php echo base_url();?>assets/assets/js/mazer.js"></script>

    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo $nama_produk; ?>],
            datasets: [{
                label:'Data Produk CV Icommits ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>


<script>
var xValues = [<?php echo $id_pelanggan4 ?>];
var yValues = [<?php echo $jumlah4 ?>];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];




new Chart("myChart2", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Data Pelanggan CV Icommits"
    }
  }
});
</script>






<!--
<script>
    var ctx = document.getElementById('myChart2').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo $id_pelanggan; ?>],
            datasets: [{
                label:'Data Pelanggan CV Icommits ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah2; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
-->

<script>
    var ctx = document.getElementById('myChart3').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo $alamat_pelanggan; ?>],
            datasets: [{
                label:'Data Alamat Pelanggan CV Icommits ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah3; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>

</body>


</html>
