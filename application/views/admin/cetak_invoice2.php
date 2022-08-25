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
    <title>Data Laporan Penjualan</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>

    <script>
		window.print();
	</script>

    <br />
    <div align="center"><h4><b> DATA LAPORAN PENJUALAN </b></h4></div>
    <div align="center"><h4><b> CV ICOMMITS KARYA SOLUSI </b></h4></div>
    <br />
    <br />

                        <!-- table head dark -->
                        <div class="table-responsive">
                            <table class="table mb-1" border="1">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No Invoice</th>
                                        <th>Waktu Pemesanan</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Produk</th>
                                        <th>QTY</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Batas Waktu</th>
                                    </tr>
                                </thead>
                                <?php  $no = 1; foreach ($data_invoice->result_array() as $d) {?>
                                <tbody>
                                <tr>
                                    <td><font size="2"><?php echo $d['no_invoice'] ?></font></td>
                                    <td><font size="2"><?php echo $d['date'] ?></font></td>
                                    <td><font size="2"><?php echo $d['nama_pelanggan'] ?></font></td>
                                    <td><font size="2"><?php echo $d['produk'] ?></font></td>
                                    <td><font size="2"><?php echo $d['qty'] ?></font></td>
                                    <td><font size="2"><?php echo rupiah($d['price'])?></font></td>
                                    <td><font size="2"><?php echo rupiah($d['price'] * $d['qty']) ?></font></td>
                                    <td><font size="2"><?php echo $d['due'] ?></font></td>
                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>

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
