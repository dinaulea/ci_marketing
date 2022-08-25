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
<script>
	window.print();
	</script>
<body>
     
    <?php  foreach ($data_invoice->result_array() as $d) {?>
    <center><h4>SURAT PERJANJIAN JUAL BELI</h4></center>
    <br/>
    <p align="left"> Bertanda tangan di bawah ini:</p>
    <p align="left"> Nama &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &ensp; : &nbsp; Rezha Ranmark <br/>
    Alamat &nbsp; &nbsp; &nbsp; &nbsp; &ensp; : <br/>
    Nomor HP &nbsp; &nbsp; &nbsp;:</p>
    <p align="left"> Selanjutnya disebut sebagai <b>pihak pertama (penjual)</b>, dan</p>
    <p align="left"> Nama &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &ensp; : &nbsp; <?php echo $d['nama_pelanggan'] ?> <br/>
    Alamat &nbsp; &nbsp; &nbsp; &nbsp; &ensp; : <?php echo $d['alamat'] ?><br/>
    Nomor HP &nbsp; &nbsp; &nbsp;: <?php echo $d['nomor_hp'] ?></p>
    <p align="left"> Selanjutnya disebut sebagai <b>pihak kedua (pembeli)</b>.</p>

    <p align="justify"> Kedua belah pihak telah sepakat melakukan Perjanjian Jual Beli atas Pemesanan Website dengan keterangan sebagai berikut:</p>
    <p align="left"> Kategori &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &ensp; &nbsp; &nbsp; &ensp; &ensp; : &nbsp; <?php echo $d['kategori'] ?> <br/>
    Jenis Sistem &nbsp; &nbsp; &nbsp; &nbsp; &ensp; &nbsp; &ensp; : &nbsp; <?php echo $d['jenis_sistem'] ?> <br/>
    Desk Sistem &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &ensp;: &nbsp;<?php echo $d['desk_sistem'] ?><br/>
    QTY &nbsp; &nbsp; &nbsp; &nbsp; &ensp; &nbsp; &nbsp; &nbsp; &nbsp; &ensp; &nbsp; &nbsp; &nbsp; &nbsp; :  &nbsp; <?php echo $d['qty'] ?><br/>
    Tanggal Pemesanan &nbsp; : &nbsp; <?php echo $d['date'] ?><br/>
    Jatuh Tempo &nbsp; &nbsp; &nbsp; &nbsp; &ensp; &nbsp; &nbsp; : &nbsp; <?php echo $d['due'] ?></p>

    <p align="left"> <b>Isi Perjanjian:</b></p>
    <p align="justify"> 1. Pihak kedua (pembeli) membayar uang senilai <?php echo rupiah ($d['price'] * $d['qty']) ?> <br/>
    2. Pihak pertama (penjual) menyerahkan Link URL Website dan Manual Book kepada pihak kedua (pembeli) <br/>
    Demikian Surat Perjanjian ini dibuat, setelah dibaca, dipahami, dan dimengerti maka para pihak sepakat untuk menandatangani Surat Perjanjian ini dalam keadaan sehat tanpa unsur paksaan dari pihak manapun.</p>

    <?php
    }
    ?>


    <script src="<?php echo base_url();?>assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/mazer.js"></script>
                            
</body>

</html>
