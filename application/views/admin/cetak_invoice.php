<?php
function rupiah($angka){
    $hasil_rupiah = "Rp ".number_format($angka,2,',','.');
    return $hasil_rupiah;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Invoice CV Icommits Karya Solusi</title>
		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
			<link rel="shortcut icon" href="<?php echo base_url();?>assets/assets/images/logo/icommits.png" type="image/x-icon">
	</head>
    <script>
		window.print();
	</script>
	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="6">
						<table>
							<tr>
								<td class="title">
									<img src="<?php echo base_url();?>assets/assets/images/logo/logo_CVicommits.jpg" style="width: 100%; max-width: 100px" />
								</td> 
								<?php foreach ($invoice->result_array() as $d) {?>
								<td><font size="2">
									<?php
									$sum = $this->db->query("select sum(total) as totalbiaya from invoice where no_invoice = '$d[no_invoice]'")->row();
									$total=$sum->totalbiaya;
									?>

									Invoice: <?=  $d['no_invoice'] ?><br />
									Created: <?=  $d['date'] ?><br />
									Due: <?=  $d['due'] ?>
									</font>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="6">
						<table>
							<tr>
								<td><font size="2">
									<b>Invoice From:</b><br />
									CV Icommits Karya Solusi<br />
									JL. Pasir Subur No. 10, Kel. Ancol, Kec. Regol, Bandung 40254<br />
                                    081 990 300 100
									</font>
								</td>
								<td><font size="2">
                                    <b>Invoice To:</b><br />
									<?=  $d['nama_pelanggan'] ?><br />
									</font>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<?php }?>

				<table border="1">
				<tr>
					<th><font size="2">Kategori Produk</font></th>
					<th><font size="2">produk</font></th>
					<th><font size="2">Jenis Sistem</font></th>
                    <th><font size="2">Price</font></th>
					<th><font size="2">QTY</font></th>
                    <th><font size="2">Total</font></th>
					<th><font size="2">Uang Muka</font></th>
				</tr>
				<?php foreach ($produk->result_array() as $e) {?>
                <tr>
					<td><font size="2"><?php echo $e['kategori'] ?></font></td>
					<td><center><font size="2">
						<?php
                            if ($e ['produk']==''){
                                echo "-";
                            }
                            else {
                                echo "$e[produk]";
                            } 
                        ?>
					</font></center></td>
					<td><font size="2"><div style='text-align:left;'>
						<?php
                            if ($e ['jenis_sistem']==''){
                                echo "-";
                            }
                            else {
                                echo "$e[jenis_sistem]";
                            } 
                        ?>
					</div></font>
					</td>
                    <td><font size="2"><?php echo rupiah($e['price'])?></font></td>
                    <td><font size="2"><?php echo $e['qty'] ?></font></td>
					<?php
					$total1=$e['price']*$e['qty'];
					$this->db->query("update invoice set total = '$total1' where id='$e[id]'");
					?>
                	<td><font size="2"><?php echo rupiah($total1) ?></font></td>
					<td><font size="2">
						<?php
                            if ($e ['uang_muka']==''){
                                echo "-";
                            }
                            else {
                                echo rupiah("$e[uang_muka]");
                            } 
                        ?>
					</font></td>
            	</tr>
				<?php
                }
				?>
				</table>
				
				<table class="table mb-1">
				<tr class="information">
					<td colspan="6">
						<table>
							<tr>
								<td><font size="2">
									<br/>
									<br/>
									<b>Payment Method:</b><br />
									No. Rek. BCA (4371398834) a.n. Rezha Ranmark<br />
									No. Rek. Mandiri (9000034993577) a.n. Rezha Ranmark<br />
                                    No. Rek. JBJ (007617975100) a.n. Rezha Ranmark <br/>
									<br/>
									<br/>
									Keterangan :<br />
									<a><font size="2">
									<?php
										if ($e ['desk_sistem']==''){
											echo "(Tidak ada keterangan)";
										}
										else {
											echo "$e[desk_sistem]";
										} 
									?>
									</font></a>
									<br />
									<p align="right"> Total : 
									<?php
                                       echo rupiah($total);
                                    ?>
									</p>
									<br/>
									<p align="right"> tertanda, &nbsp; </p>
									<br/>
									<p align="right"><u> Rezha Ranmark, S.Kom.</u>  &nbsp;  </p>
									<p align="right"> Direktur, &nbsp; </p>
									</font>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
				
		</div>
	</body>
</html>