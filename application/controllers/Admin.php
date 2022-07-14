<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data['data']=$this->admmodel->Total();
		$data['produk_tersedia']=$this->admmodel->ProdukTersedia();
		$data['produk_terjual']=$this->admmodel->ProdukTerjual();
		$data['jumlah_pelanggan']=$this->admmodel->JumlahPelanggan();
		$data['produk_dikemas']=$this->admmodel->ProdukDikemas();
		$data['produk_dikirim']=$this->admmodel->ProdukDikirim();
		$this->load->view('admin/admin_home',$data);
	
	}


	
	public function count_datapelanggan()
	{
		$data=$this->admmodel->JumDataPelanggan();
		$this->load->view('admin/admin_home',array('data'=>$data));
	}

	public function logout()
	{
		$username = $_SESSION['username'];
		$user = $this->db->get_where('user',array('username' => $username))->row_array();
		session_destroy();
		echo "<script>
		alert('Anda telah logout dari sistem informasi proyek akhir');
		</script>";
		header('location:'.base_url().'index.php/Guest/index');
	}

//----------------------------------------------------------------------------------------------------------------------------------------

	//DATA PELANGGAN
	public function tabel_datapelanggan()
	{
		$this->load->helper('nohp_helper');
		$this->load->helper('text');
		$this->load->library('user_agent');

		$data=$this->admmodel->GetPelanggan();
		$this->load->view('admin/tabel_datapelanggan',array('data'=>$data));
	}

	public function tambah_pelanggan()
	{
		$this->load->view('admin/tambah_pelanggan');
	} 

	public function do_tambah_pelanggan()
	{
		$id = $_POST['id'];
		$id_pelanggan = $_POST['id_pelanggan'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$nomor_hp = $_POST['nomor_hp'];
		$nama_perusahaan = $_POST['nama_perusahaan'];
		$alamat_perusahaan = $_POST['alamat_perusahaan'];
		$jabatan = $_POST['jabatan'];
		$level = $_POST['level'];
		
		$data = array('id' => $id,
					  'id_pelanggan' => $id_pelanggan,
					  'username' => $username,
					  'password' => $password,
					  'nama' => $nama,
					  'alamat' => $alamat,
					  'nomor_hp' => $nomor_hp,
					  'nama_perusahaan' => $nama_perusahaan,
					  'alamat_perusahaan' => $alamat_perusahaan,
					  'jabatan' => $jabatan,
					  'level' => $level
					 );
		
		$res = $this->admmodel->InsertData('login',$data);
		if($res >= 1){
			echo "<script>
			alert('Tambah Data Berhasil');
			window.location.href='tabel_datapelanggan';
			</script>
			";
		}else {
			echo "<script>
			alert('Tambah Data Gagal');
			window.location.href='tambah_pelanggan';
			</script>";
		}
	}

	public function hapus_pelanggan($nama_pelanggan)
	{
		$where = array('nama_pelanggan' => $nama_pelanggan);
		$res = $this->admmodel->DeleteData('pelanggan',$where);

		if($res >= 1){
			$this->session->set_flashdata('pesan','Delete data '.$id.' berhasil');
			redirect('Admin/tabel_datapelanggan');
		}
		else{
			echo "<h3>Delete data pelanggan gagal</h3>";
		}
	}

	public function edit_pelanggan($id)
	{
		$pelanggan = $this->admmodel->GetPelanggan("where id = '$id'");
		$data = array(
				'id' => $pelanggan[0]['id'],
				'pelanggan_id' => $pelanggan[0]['pelanggan_id'],
				'nama_pelanggan' => $pelanggan[0]['nama_pelanggan'],
				'alamat_pelanggan' => $pelanggan[0]['alamat_pelanggan'],
		    	'no_hp' => $pelanggan[0]['no_hp'],
				'nama_perusahaan' => $pelanggan[0]['nama_perusahaan'],
				'alamat_perusahaan' => $pelanggan[0]['alamat_perusahaan'],
				'jabatan' => $pelanggan[0]['jabatan']
				);
		$this->load->view('admin/edit_pelanggan',$data);
	} 


	public function do_edit_pelanggan()
	{
		$id = $_POST['id'];
		$pelanggan_id = $_POST['pelanggan_id'];
		$nama_pelanggan = $_POST['nama_pelanggan'];
		$alamat_pelanggan = $_POST['alamat_pelanggan'];
		$no_hp = $_POST['no_hp'];
		$nama_perusahaan = $_POST['nama_perusahaan'];
		$alamat_perusahaan = $_POST['alamat_perusahaan'];
		$jabatan = $_POST['jabatan'];

		$data = array('id'=>$id,'pelanggan_id'=>$pelanggan_id,'nama_pelanggan'=>$nama_pelanggan,'alamat_pelanggan'=>$alamat_pelanggan,'no_hp'=>$no_hp,'nama_perusahaan'=>$nama_perusahaan,'alamat_perusahaan'=>$alamat_perusahaan,'jabatan'=>$jabatan);
		$where = array('id' => $id);

		$res = $this->admmodel->UpdateData('pelanggan',$data,$where);

		if($res >= 1){
			echo "<script>
			alert('Edit Data Pelanggan Berhasil !!');
			window.location.href='tabel_datapelanggan';
			</script>
			";
		}else {
			echo "<script>
			alert('Edit Data Pelanggan Gagal !!');
			window.location.href='tabel_datapelanggan';
			</script>";
		}
	}

	public function cetak_pelanggan()
	{
		$data['id']=$this->admmodel->GetPelanggan();
		$this->load->view('admin/cetak_datapelanggan',$data);
	}

//----------------------------------------------------------------------------------------------------------------------

	//DATA PRODUK
	public function tabel_dataproduk()
	{
		$data=$this->admmodel->GetProduk();
		$this->load->view('admin/tabel_dataproduk',array('data'=>$data));
	}

	public function tambah_produk()
	{
		$data['idsupplier']=$this->admmodel->GetSupplier();
		$data['kategori']=$this->admmodel->GetProduk();
		$this->load->view('admin/tambah_produk', $data);
	}

	public function do_tambah_produk()
	{
		$kategori = $_POST['kategori'];
		$produk = $_POST['produk'];
		$satuan = $_POST['satuan'];
		$harga_dasar = $_POST['harga_dasar'];
		$harga_jual = $_POST['harga_jual'];
		$file_desk = $_POST['file_desk'];
		$validasi = $_POST['validasi'];
		
		$data = array('kategori' => $kategori,
					  'produk' => $produk,
					  'satuan' => $satuan,
					  'harga_dasar' => $harga_dasar,
					  'harga_jual' => $harga_jual,
					  'file_desk' => $file_desk,
					  'validasi' => $validasi
					 );

		$res = $this->admmodel->InsertData('produklayanan',$data);
		if($res >= 1){
			echo "<script>
			alert('Tambah Data Berhasil');
			window.location.href='tabel_dataproduk';
			</script>
			";
		}else {
			echo "<script>
			alert('Tambah Data Gagal');
			window.location.href='tambah_produk';
			</script>";
		}
	}

	public function hapus_produk($id_produk)
	{
		$where = array('id_produk' => $id_produk);
		$res = $this->admmodel->DeleteData('produklayanan',$where);

		if($res >= 1){
			$this->session->set_flashdata('pesan','Delete data '.$id_produk.' berhasil');
			redirect('Admin/tabel_dataproduk');
		}
		else{
			echo "<h3>Delete data Produk gagal</h3>";
		}
	}

	public function edit_produk($id_produk)
	{
		$produk = $this->admmodel->GetProduk("where id_produk = '$id_produk'");
		$data = array(
				'id_produk' => $produk[0]['id_produk'],
				'kategori' => $produk[0]['kategori'],
				'produk' => $produk[0]['produk'],
		    	'satuan' => $produk[0]['satuan'],
				'harga_dasar' => $produk[0]['harga_dasar'],
				'harga_jual' => $produk[0]['harga_jual'],
				'file_desk' => $produk[0]['file_desk']
				);
		$this->load->view('admin/edit_produk',$data);
	} 


	public function do_edit_produk()
	{
		$id_produk = $_POST['id_produk'];
		$kategori = $_POST['kategori'];
		$produk = $_POST['produk'];
		$satuan = $_POST['satuan'];
		$harga_dasar = $_POST['harga_dasar'];
		$harga_jual = $_POST['harga_jual'];
		$file_desk = $_POST['file_desk'];

		$data = array('id_produk'=>$id_produk,'kategori'=>$kategori,'produk'=>$produk,'satuan'=>$satuan,'harga_dasar'=>$harga_dasar,'harga_jual'=>$harga_jual,'file_desk'=>$file_desk);
		$where = array('id_produk' => $id_produk);

		$res = $this->admmodel->UpdateData('produklayanan',$data,$where);

		if($res >= 1){
			echo "<script>
			alert('Edit Data Produk dan Layanan Berhasil !!');
			window.location.href='tabel_dataproduk';
			</script>
			";
		}else {
			echo "<script>
			alert('Edit Data Produk dan Layanan Gagal !!');
			window.location.href='tabel_dataproduk';
			</script>";
		}
	}

	public function cetak_produk()
	{
		$data['id_produk']=$this->admmodel->GetProduk();
		$this->load->view('admin/cetak_dataproduk',$data);
	}

//-----------------------------------------------------------------------------

	//INVOICE
	public function input_invoice()
	{
			
				$data['idproduk']=$this->admmodel->GetProduk();
				$data['idpelanggan']=$this->admmodel->GetPelanggan();
				$this->load->view('admin/input_invoice',$data);
				
	}

	public function do_input_invoice1()
	{
		$id = $_POST['id'];
		$no_invoice = $_POST['no_invoice'];
		$pelanggan_id = $_POST['pelanggan_id'];
		
		$nama_pelanggan = $_POST['nama_pelanggan'];

		$date = $_POST['date'];
		$due = $_POST['due'];
		$produk = $_POST['produk'];
		$price = $_POST['price'];
		$qty = $_POST['qty'];
		$kategori = $_POST['kategori'];
		$ekspedisi = $_POST['ekspedisi'];
   

		$data = array();   
		$index = 0;
		foreach($no_invoice as $d){
		array_push($data, array(
		'no_invoice'=> $d,
		'pelanggan_id'=>  $pelanggan_id,
		'nama_pelanggan'=> $nama_pelanggan[0], 
		'date'=>$date[0],  
		'due'=>$due[0],  
		'produk'=>$produk[$index],  
		'price'=>$price[$index],  
		'qty'=>$qty[$index],
		'kategori'=>$kategori[$index],  
		'ekspedisi'=>$ekspedisi[0]
		));
		
		$index++;
		} // end foreach
		
		$this->db->insert_batch('invoice', $data);
		
		
		redirect('admin/data_invoice');
		}
		
	public function do_input_invoice()
	{
		$id = $_POST['id'];
		$no_invoice = $_POST['no_invoice'];
		$pelanggan_id = $_POST['pelanggan_id'];
		
		$nama_pelanggan = $_POST['nama_pelanggan'];
		$date = $_POST['date'];
		$due = $_POST['due'];
		$produk = $_POST['produk'];
		$price = $_POST['price'];
		$qty = $_POST['qty'];
		$total = $price*$qty;
		$kategori = $_POST['kategori'];
		$ekspedisi = $_POST['ekspedisi'];

		$data = array('id' => $id,
					  'no_invoice' => $no_invoice,
					  'pelanggan_id' => $pelanggan_id,
					  'nama_pelanggan' => $nama_pelanggan,
					  'date' => $date,
					  'due' => $due,
					  'produk' => $produk,
					  'price' => $price,
					  'qty' => $qty,
					  'total' => $total,
					  'kategori' => $kategori,
					  'ekspedisi' => $ekspedisi
					 );

					 $n= array('pelanggan_id' => $pelanggan_id);
					 $d = array ('pelanggan_id' => $pelanggan_id,'produk' => $produk,'date' => $date,
					 'due' => $due, 'price' => $price);
					 $where = array('pelanggan_id' => $pelanggan_id);
		
		$res = $this->admmodel->InsertData('invoice',$data);
		$nid = $this->admmodel->UpdateData('pemesanan_produk',$d,$where);
		$da = $this->admmodel->InsertData('pemesanan_produk',$d);

		if($res >= 1){
			echo "<script>
			alert('Tambah Data Berhasil');
			window.location.href='data_invoice';
			</script>
			";
		}else {
			echo "<script>
			alert('Tambah Data Gagal');
			window.location.href='data_invoice';
			</script>";
		}
	}
   
    public function data_invoice(){

		$d['data_invoice']=$this->db->query("select distinct no_invoice, date, due, pelanggan_id, nama_pelanggan, kategori,ekspedisi from invoice ORDER BY no_invoice ASC");	
		$this->load->view('admin/data_invoice',$d);
	}

    public function edit_invoice ($no_invoice){
		$invoice =$this->admmodel->GetInvoice(" where no_invoice ='$no_invoice'");
		$data=array(
            'no_invoice' =>$invoice[0]['no_invoice'],
		    'pelanggan_id' => $invoice[0]['pelanggan_id'],
			'nama_pelanggan' => $invoice[0]['nama_pelanggan'],
			'produk' => $invoice[0]['produk'],
			'price' => $invoice[0]['price'],
			'qty' => $invoice[0]['qty'],
			'date' => $invoice[0]['date'],
			'due' => $invoice[0]['due']
		);
		$this->load->view('admin/edit_invoice', $data);
	}
	
	
		public function do_edit_invoice()
		{
		$no_invoice =$_POST['no_invoice'];
		$pelanggan_id=$_POST['pelanggan_id'];
		$nama_pelanggan=$_POST['nama_pelanggan'];
		$produk=$_POST['produk'];
		$price=$_POST['price'];
		$qty=$_POST['qty'];
		$date=$_POST['date'];
		$due=$_POST['due'];
			
		$data = array('pelanggan_id'=>$pelanggan_id,'nama_pelanggan'=>$nama_pelanggan,'produk'=>$produk,'price'=>$price,'qty'=>$qty,'date'=>$date,'due'=>$due);
		$where=array('no_invoice'=>$no_invoice);
			
			$res=$this->admmodel->UpdateData('invoice',$data,$where);
			if ($res >= 1){
			echo "
			<script> alert('Edit Data invoice Berhasil');
			window.location.href='data_invoice'; </script>
			";
				
		}else {
			echo "
			<script> alert('Edit Data invoice Gagal');
			window.location.href='data_invoice'; </script>
			";
			
		}
		}

        public function hapus_invoice($no_invoice){
            $where = array ('no_invoice' => $no_invoice);
            $res = $this->admmodel->DeleteData('invoice',$where);
            
            if ($res>=1){
                $this->session->set_flashdata('pesan','Delete Data'.$pelanggan.'Berhasil');
                redirect('admin/data_invoice');
            }else{
                echo "<h3>Delete Data invoice Gagal</h3>";
            }
        }

		public function print_invoice1 ($no_invoice)
		{
		
		

			$data['invoice'] = $this->db->query("select distinct no_invoice,nama_pelanggan,date,due from invoice where no_invoice = '$no_invoice'");
			$data['produk'] = $this->db->query("select * from invoice where no_invoice = '$no_invoice'");
			$this->load->view('admin/cetak_invoice', $data);
		}


		public function print_invoice ($no_invoice){
			$invoice =$this->admmodel->GetInvoice(" where no_invoice ='$no_invoice'");
			$data=array(
				'no_invoice' =>$invoice[0]['no_invoice'],
				'nama_pelanggan' => $invoice[0]['nama_pelanggan'],
				'produk' => $invoice[0]['produk'],
				'price' => $invoice[0]['price'],
				'qty' => $invoice[0]['qty'],
				'date' => $invoice[0]['date'],
				'due' => $invoice[0]['due']
			);
			$this->load->view('admin/cetak_invoice', $data);
		}

		public function cetak_invoice2()
		{
			$data['cetak_invoice2']=$this->admmodel->GetInvoice2();
			$this->load->view('admin/cetak_invoice2',$data);
		}


//-------------------------------------------------------------------------------------------

	//INVOICE
	public function input_invoice_it()
	{
			
				$data['idproduk']=$this->admmodel->GetProduk();
				$data['idpelanggan']=$this->admmodel->GetPelanggan();
				$this->load->view('admin/input_invoice_it',$data);
	}

	public function do_input_invoice_it()
	{
		$id = $_POST['id'];
		$no_invoice = $_POST['no_invoice'];
		$pelanggan_id = $_POST['pelanggan_id'];
		$nama_pelanggan = $_POST['nama_pelanggan'];
		$date = $_POST['date'];
		$due = $_POST['due'];
		$jenis_sistem = $_POST['jenis_sistem'];
		$desk_sistem = $_POST['desk_sistem'];
		$qty = $_POST['qty'];
		$kategori = $_POST['kategori'];
		$price = $_POST['price'];
		$uang_muka = $_POST['uang_muka'];

		$data = array('id' => $id,
					  'no_invoice' => $no_invoice,
					  'pelanggan_id' => $pelanggan_id,
					  'nama_pelanggan' => $nama_pelanggan,
					  'date' => $date,
					  'due' => $due,
					  'jenis_sistem' => $jenis_sistem,
					  'desk_sistem' => $desk_sistem,
					  'qty' => $qty,
					  'kategori' => $kategori,
					  'price' => $price,
					  'uang_muka' => $uang_muka
					 );
		
		$res = $this->admmodel->InsertData('invoice',$data);

		if($res >= 1){
			echo "<script>
			alert('Tambah Data Berhasil');
			window.location.href='data_invoice';
			</script>
			";
		}else {
			echo "<script>
			alert('Tambah Data Gagal');
			window.location.href='data_invoice';
			</script>";
		}
	}

	public function edit_invoice_it ($no_invoice){
		$invoice =$this->admmodel->GetInvoice(" where no_invoice ='$no_invoice'");
		$data=array(
            'no_invoice' =>$invoice[0]['no_invoice'],
		    'pelanggan_id' => $invoice[0]['pelanggan_id'],
			'nama_pelanggan' => $invoice[0]['nama_pelanggan'],
			'date' => $invoice[0]['date'],
			'due' => $invoice[0]['due'],
			'jenis_sistem' => $invoice[0]['jenis_sistem'],
			'desk_sistem' => $invoice[0]['desk_sistem'],
			'qty' => $invoice[0]['qty'],
			'uang_muka' => $invoice[0]['uang_muka'],
			'price' => $invoice[0]['price']
		);
		$this->load->view('admin/edit_invoice_it', $data);
	}
	
	
		public function do_edit_invoice_it()
		{
		$no_invoice =$_POST['no_invoice'];
		$pelanggan_id=$_POST['pelanggan_id'];
		$nama_pelanggan=$_POST['nama_pelanggan'];
		$date=$_POST['date'];
		$due=$_POST['due'];
		$jenis_sistem=$_POST['jenis_sistem'];
		$desk_sistem=$_POST['desk_sistem'];
		$qty=$_POST['qty'];
		$uang_muka=$_POST['uang_muka'];
		$price=$_POST['price'];
			
		$data = array('pelanggan_id'=>$pelanggan_id,'nama_pelanggan'=>$nama_pelanggan,'date'=>$date,'due'=>$due,'jenis_sistem'=>$jenis_sistem,'desk_sistem'=>$desk_sistem,'qty'=>$qty,'uang_muka'=>$uang_muka,'price'=>$price);
		$where=array('no_invoice'=>$no_invoice);
			
			$res=$this->admmodel->UpdateData('invoice',$data,$where);
			if ($res >= 1){
			echo "
			<script> alert('Edit Data invoice Berhasil');
			window.location.href='data_invoice'; </script>
			";
				
		}else {
			echo "
			<script> alert('Edit Data invoice Gagal');
			window.location.href='data_invoice'; </script>
			";
			
		}
		}

		
        public function print_invoice_it ($no_invoice)
		{
			$data['invoice'] = $this->db->query("select distinct no_invoice,pelanggan_id,nama_pelanggan,date,due from invoice where no_invoice = '$no_invoice'");
			$data['produk'] = $this->db->query("select * from invoice where no_invoice = '$no_invoice'");
			$this->load->view('admin/cetak_invoice_it', $data);
		}

		public function print_invoice_it1 ($no_invoice){
			$invoice =$this->admmodel->GetInvoice(" where no_invoice ='$no_invoice'");
			$data=array(
				'no_invoice' =>$invoice[0]['no_invoice'],
				'nama_pelanggan' => $invoice[0]['nama_pelanggan'],
				'kategori' => $invoice[0]['kategori'],
				'desk_sistem' => $invoice[0]['desk_sistem'],
				'jenis_sistem' => $invoice[0]['jenis_sistem'],
				'uang_muka' => $invoice[0]['uang_muka'],
				'price' => $invoice[0]['price'],
				'qty' => $invoice[0]['qty'],
				'date' => $invoice[0]['date'],
				'due' => $invoice[0]['due']
			);
			$this->load->view('admin/cetak_invoice_it', $data);
		}

		public function print_surat_it ($no_invoice){
			$d['data_invoice']=$this->db->query("select * from invoice left join produklayanan on invoice.produk = produklayanan.produk left join login on invoice.pelanggan_id=login.id_pelanggan  where invoice.no_invoice ='$no_invoice' ORDER BY no_invoice ASC");
			
			$this->load->view('admin/cetak_surat_it', $d);
		}



//-------------------------------------------------------------------------------------------
		
	//STATUS PRODUK
	public function status_produkadm()
	{
		$data=$this->db->query("select * from bukti where kategori='Non IT'");
		$this->load->view('admin/status_produkadm',array('data'=>$data));
	}

	public function cek_status()
	{
		$id_pelanggan=$_SESSION['id_pelanggan'];
		$data['bukti'] = $this->db->query("select * from bukti where id_pelanggan=$id_pelanggan");
		$this->load->view('admin/cek_status', $data);
	}

	public function do_edit_kirim($id_pelanggan)
	{
		$status="Produk Dikirim";

		$data = array('status' =>$status);
		$where = array('id_pelanggan' =>$id_pelanggan);

		$res=$this->admmodel->UpdateData('bukti',$data,$where);
		if ($res>=1)
		{
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
			Pesanan Berhasil di Proses/Dikemas!.</div>');
			redirect('admin/status_kirim');
		} 
		else
		{
			echo "<h3>gagal</h3>";
		}
	}

	public function status_kirim()
	{
		
		$data['data_kirim']=$this->db->query("SELECT * FROM bukti LEFT JOIN invoice ON invoice.pelanggan_id = bukti.id_pelanggan WHERE bukti.status='Produk Dikirim' ");
		$this->load->view('admin/status_kirim',$data);
		
	}

	public function do_edit_kemas($id_pelanggan)
	{
		$status="Produk Dikemas";

		$data = array('status' =>$status);
		$where = array('id_pelanggan' =>$id_pelanggan);

		$res=$this->admmodel->UpdateData('bukti',$data,$where);
		if ($res>=1)
		{
			$this->session->set_flashdata('pesan','Pengemasan Produk','Berhasil!');
			redirect('admin/status_kemas');
		} else
		{
			echo "<h3>gagal</h3>";
		}
	}

	public function status_kemas()
	{
		
		$data['data_kemas']=$this->db->query("SELECT * FROM bukti LEFT JOIN invoice ON invoice.pelanggan_id = bukti.id_pelanggan WHERE bukti.status='Produk Dikemas' ");
		$this->load->view('admin/status_kemas',$data);
		
	}

	public function do_edit_selesai($id_pelanggan)
	{
		$status="Produk Sampai";

		$data = array('status' =>$status);
		$where = array('id_pelanggan' =>$id_pelanggan);

		$res=$this->admmodel->UpdateData('bukti',$data,$where);
		if ($res>=1)
		{
			$this->session->set_flashdata('pesan','Produk Telah Sampai');
			redirect('admin/status_selesai');
		} else
		{
			echo "<h3>gagal</h3>";
		}
	}

	public function status_selesai()
	{
		
		$data['data_selesai']=$this->db->query("select distinct bukti.nama_lengkap, bukti.no_rek, invoice.produk, invoice.price, invoice.qty, invoice.total, bukti.status FROM bukti LEFT JOIN invoice ON invoice.pelanggan_id = bukti.id_pelanggan WHERE bukti.status='Produk Sampai' ");
		$this->load->view('admin/status_selesai',$data);
		
	}


//-------------------------------------------------------------------------------------------

	//INSIGHT PENJUALAN

	function __construct(){
        parent::__construct();
        $this->load->model('admmodel');
    }

	public function data_insight()
	{
		$data['hasil']=$this->admmodel->JumProduk();
		$data['hasil2']=$this->admmodel->JumPelanggan();
		$data['hasil3']=$this->admmodel->JumAlamat();
		$this->load->view('admin/data_insight',$data);
	}
	
//-------------------------------------------------------------------------------------------

	//LAPORAN PENJUALAN
	
	public function laporan_penjualan(){

		$page = $this->uri->segment(4);
		$limit=5;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$d['tot'] = $offset;
		$tot_hal = $this->db->get("invoice");
		$config['base_url'] = base_url() .'index.php/admin/laporan_penjualan/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page']=$limit;
		$config['uri_segment']=4;
		$config['first_link']='Awal';
		$config['last_link']='Akhir';
		$config['next_link']='Next';
		$config['prev_link']='Back';
		$this->pagination->initialize($config);
		$d["paginator"] = $this->pagination->create_links();
		$d['data_penjualan']=$this->db->query("select * from invoice join produklayanan on invoice.produk = produklayanan.produk limit ".$offset.",".$limit."");
		$this->load->view('admin/laporan_penjualan',$d);
	}

	public function cari()//diubah
	{
		if($this->input->post("cari")=="")
		{
			$kata = $this->session->userdata('kata');
		}
		else
		{
			$sess_data['kata'] = $this->input->post("cari");
			$this->session->set_userdata($sess_data);
			$kata = $this->session->userdata('kata');
		}
		$page=$this->uri->segment(4);
		$limit=5;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

		$d['tot'] = $offset;
		$tot_hal = $this->db->query("select * from invoice join produklayanan on invoice.produk = produklayanan.produk where invoice.produk  like '%".$kata."%' or invoice.pelanggan_id like '%".$kata."%' ");
		$config['base_url'] = base_url() . 'index.php/Admin/cari_invoice/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Back';
		$this->pagination->initialize($config);
		$d["paginator"] = $this->pagination->create_links();
		$d['data_invoice'] = $this->db->query("select * from invoice join produklayanan on invoice.produk = produklayanan.produk where invoice.produk  like '%".$kata."%' or invoice.pelanggan_id like '%".$kata."%' limit ".$offset.",".$limit."");
		$this->load->view('admin/cari_invoice',$d);
	}

//----------------------------------------------------------------------------------------------------------------------------------

	public function data_supplier()
	{
		$this->load->helper('nohp_helper');
		$this->load->helper('text');
		$this->load->library('user_agent');
		
		$data=$this->admmodel->GetSupplier();
		$this->load->view('admin/data_supplier',array('data'=>$data));
	}

	public function tambah_supplier()
	{
		$this->load->view('admin/tambah_supplier');
	}

	public function do_tambah_supplier()
	{
		$id_supplier = $_POST['id_supplier'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nama_perusahaan = $_POST['nama_perusahaan'];
		$alamat_perusahaan = $_POST['alamat_perusahaan'];
		$nomor_hp = $_POST['nomor_hp'];
		$email = $_POST['email'];
		$level = $_POST['level'];
		
		$data = array('id_supplier' => $id_supplier,
					  'username' => $username,
					  'password' => $password,
					  'nama_perusahaan' => $nama_perusahaan,
					  'alamat_perusahaan' => $alamat_perusahaan,
					  'nomor_hp' => $nomor_hp,
					  'email' => $email,
					  'level' => $level
					 );
		
		$res = $this->admmodel->InsertData('supplier',$data);
		if($res >= 1){
			echo "<script>
			alert('Tambah Data Berhasil');
			window.location.href='data_supplier';
			</script>
			";
		}else {
			echo "<script>
			alert('Tambah Data Gagal');
			window.location.href='data_supplier';
			</script>";
		}
	}

//--------------------------------------------------------------------------

	public function data_it($no_invoice)
	{
		$where = array('no_invoice' => $no_invoice);
		$res = $this->admmodel->GetInvoice('invoice', $where);
		
		if ($res >= 1){

			$data['data_invoice'] = $this->db->query("select * from invoice left join produklayanan on invoice.produk = produklayanan.produk left join login on invoice.pelanggan_id=login.id_pelanggan where invoice.no_invoice='$no_invoice' and invoice.kategori='IT' ORDER BY no_invoice ASC");
			$this->load->view('admin/data_it',$data);
		} else {
			echo"Gagal load";
		}
		
	}

	public function data_nonit($no_invoice)
	{
		$where = array('no_invoice' => $no_invoice);
		$res = $this->admmodel->GetInvoice('invoice', $where);
		
		if ($res >= 1){

			$data['data_invoice'] = $this->db->query("select * from invoice left join produklayanan on invoice.produk = produklayanan.produk left join login on invoice.pelanggan_id=login.id_pelanggan where invoice.no_invoice='$no_invoice' and invoice.kategori='Non IT' ORDER BY no_invoice ASC");
			
			$this->load->view('admin/data_nonit',$data);
		}
		
	}

//-------------------------------------------------------------------------------------------

	//PEMESANAN WEBSITE
	public function pemesanan_web()
	{
		$data=$this->db->query("select * from bukti where kategori='IT'");
		$this->load->view('admin/pemesanan_web',array('data'=>$data));
	}

	public function edit_web($id_pelanggan)
	{
		$web = $this->db->query("select * from bukti where id_pelanggan = '$id_pelanggan'")->result_array();
		$data = array(
				'id_pelanggan' => $web[0]['id_pelanggan'],
				'nama_lengkap' => $web[0]['nama_lengkap'],
				'url_web' => $web[0]['url_web'],
		    	'manual_book' => $web[0]['manual_book']
				);
		$this->load->view('admin/edit_web',$data);
	} 


	public function do_edit_web()
	{
		$id_pelanggan = $_POST['id_pelanggan'];
		$nama_lengkap = $_POST['nama_lengkap'];
		$url_web = $_POST['url_web'];
		$manual_book = $_POST['manual_book'];

		$data = array('id_pelanggan'=>$id_pelanggan,'nama_lengkap'=>$nama_lengkap,'url_web'=>$url_web,'manual_book'=>$manual_book);
		$where = array('id_pelanggan' => $id_pelanggan);

		$res = $this->admmodel->UpdateData('bukti',$data,$where);

		if($res >= 1){
			echo "<script>
			alert('Edit Data Web Berhasil !!');
			window.location.href='pemesanan_web';
			</script>
			";
		}else {
			echo "<script>
			alert('Edit Data Web Gagal !!');
			window.location.href='pemesanan_web';
			</script>";
		}
	}

	//PEMESANAN WEBSITE SELESAI
	public function pemesanan_selesai()
	{
		$data=$this->db->query("select * from bukti where status='Selesai'");
		$this->load->view('admin/pemesanan_selesai',array('data'=>$data));
	}

//--------------------------------------------------------------------------------------------

	//PEMESANAN WEBSITE
	public function detail_sup()
	{
		$data=$this->admmodel->GetDetail();
		$this->load->view('admin/detail_sup',array('data'=>$data));
	}

	public function data_produksup($id_supplier)
	{
		$where = array('id_supplier' => $id_supplier);
		$data['produksup'] = $this->db->query("select * from produk_sup where id_supplier='$id_supplier'");
		$this->load->view('admin/data_produksup', $data,$where);
	}

//--------------------------------------------------------------------------------------------

	public function do_tambah_pembelian()
	{
		$id_supplier = $_POST['id_supplier'];
		$jumlah = $_POST['jumlah'];
		$produk = $_POST['produk'];
		$id_produk = $_POST['id_produk'];

		$data = array('id_supplier' => $id_supplier,
					'jumlah' => $jumlah,
					'produk' => $produk,
					'id_produk' => $id_produk
					);
		
		$res = $this->admmodel->InsertData('pembelian_produk',$data);
		if($res >= 1){
			echo "<script>
			alert('Tambah Data Berhasil');
			window.location.href='pembelian_produk';
			</script>
			";
		}else {
			echo "<script>
			alert('Tambah Data Gagal');
			window.location.href='pembelian_produk';
			</script>";
		}
	}

	public function pembelian_produk()
	{
		$data['pembelian'] = $this->db->query("select * from pembelian_produk ");
		$this->load->view('admin/pembelian_produk', $data);
	}

//-------------------------------------------------------------------------------

	public function tes(){
		$name = $_POST['nama'];
		$data = $this->db->query("select * from login where nama = '".$name."'")->row();

		echo json_encode($data);
	}

}
