<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once dirname(__FILE__) . '/../libraries/midtrans/Midtrans.php';

class Pelanggan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Set your Merchant Server Key
		\Midtrans\Config::$serverKey = 'SB-Mid-server-tRjXlVNgu7E5Ads7grwB4Jc1';
		// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
		\Midtrans\Config::$isProduction = false;
		// Set sanitization on (default)
		\Midtrans\Config::$isSanitized = true;
		// Set 3DS transaction for credit card to true
		\Midtrans\Config::$is3ds = true;

		// Add new notification url(s) alongside the settings on Midtrans Dashboard Portal (MAP)
		\Midtrans\Config::$appendNotifUrl = base_url('pelanggan');
		// Use new notification url(s) disregarding the settings on Midtrans Dashboard Portal (MAP)
		\Midtrans\Config::$overrideNotifUrl = base_url('pelanggan');

		$params = array(
			'transaction_details' => array(
				'order_id' => rand(),
				'gross_amount' => 10000,
			)
		);

		$snapToken = \Midtrans\Snap::getSnapToken($params);
	}

	public function index()
	{
		$data['data']=$this->pelangganmodel->Total();
		$data['login'] = $this->db->get_where('login', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('pelanggan/home_pelanggan', $data);
	}

	//--------------------------------------------------

	public function unggah_bukti()
	{

		$this->load->view('pelanggan/unggah_bukti');
	}

	public function do_unggah()
	{
		$nama_lengkap = $_POST['nama_lengkap'];
		$no_rek = $_POST['no_rek'];
		$kategori = $_POST['kategori'];
		$foto_bukti = $_FILES['foto_bukti']['name'];
		$foto_bukti1 = $_FILES['foto_bukti']['tmp_name'];
		$status = $_POST['status'];
		$id_pelanggan = $_POST['id_pelanggan'];

		$dirUpload = "./assets/file_bukti/";
		$terupload = move_uploaded_file($foto_bukti1,$dirUpload.$foto_bukti);

		$data = array(
			'id_pelanggan' => $id_pelanggan,
			'nama_lengkap' => $nama_lengkap,
			'no_rek' => $no_rek,
			'kategori' => $kategori,
			'foto_bukti' => $foto_bukti,
			'status' => $status
		);

		$res = $this->pelangganmodel->InsertDataBukti('bukti', $data);
		if ($res >= 1) {
			echo "<script>
			alert('Tambah Data Berhasil');
			window.location.href='status_produkpel';
			</script>
			";
		} else {
			echo "<script>
			alert('Tambah Data Gagal');
			window.location.href='unggah_bukti';
			</script>";
		}
	}

	public function unggah_bukti_it()
	{

		$this->load->view('pelanggan/unggah_bukti_it');
	}

	public function do_unggah_it()
	{
		$nama_lengkap = $_POST['nama_lengkap'];
		$no_rek = $_POST['no_rek'];
		$kategori = $_POST['kategori'];
		$foto_bukti = $_FILES['foto_bukti']['name'];
		$foto_bukti1 = $_FILES['foto_bukti']['tmp_name'];
		$status = $_POST['status'];
		$id_pelanggan = $_POST['id_pelanggan'];
	
		$dirUpload = "./assets/file_bukti/";
		$terupload = move_uploaded_file($foto_bukti1,$dirUpload.$foto_bukti);

		$data = array(
			'id_pelanggan' => $id_pelanggan,
			'nama_lengkap' => $nama_lengkap,
			'no_rek' => $no_rek,
			'kategori' => $kategori,
			'foto_bukti' => $foto_bukti,
			'status' => $status
		);

		$res = $this->pelangganmodel->InsertDataBukti('bukti', $data);
		if ($res >= 1) {
			echo "<script>
			alert('Tambah Data Berhasil');
			window.location.href='status_produkweb';
			</script>
			";
		} else {
			echo "<script>
			alert('Tambah Data Gagal');
			window.location.href='status_produkweb';
			</script>";
		}
	}


	//---------------------------------------------------

	public function status_produkpel()
	{
		$data = $this->db->query("select * from bukti where id_pelanggan='$_SESSION[id_pelanggan]' AND kategori='Non IT'");
		$this->load->view('pelanggan/status_produkpel', array('data' => $data));
	}

	public function status_produkweb()
	{
		$data = $this->db->query("select * from bukti where id_pelanggan='$_SESSION[id_pelanggan]' AND kategori='IT'");

		$this->load->view('pelanggan/status_produkweb', array('data' => $data));
	}

	public function list_pemesanan()
	{
		$data['pemesanan'] = $this->db->query("select * from invoice
		JOIN login ON login.id_pelanggan = invoice.pelanggan_id where id_pelanggan='$_SESSION[id_pelanggan]'
		");
		$data['totalbeli'] = $this->db->query("select distinct invoice.pelanggan_id from invoice
		JOIN login ON login.id_pelanggan = invoice.pelanggan_id where id_pelanggan='$_SESSION[id_pelanggan]'
		");

		$this->load->view('pelanggan/list_pemesanan', $data);
	}

	public function bayar($pelanggan_id)
	{

		$pemesanan = $this->db->query("select sum(total) as totalbiaya from invoice where pelanggan_id = '$pelanggan_id'")->row_array();
        $total=$pemesanan->totalbiaya;

		$params = array(
			'transaction_details' => array(
				'order_id' => rand(),
				'gross_amount' => $pemesanan['totalbiaya'],
			)
		);

		try {
			// Get Snap Payment Page URL
			$paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;

			// Redirect to Snap Payment Page
			header('Location: ' . $paymentUrl);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	//----------------------------------------------------

	//VALIDASI
	public function do_edit_revisi($id)
	{
		$status = "Revisi";

		$data = array('status' => $status);
		$where = array('id' => $id);

		$res = $this->pelangganmodel->UpdateData('bukti', $data, $where);
		if ($res >= 1) {
			$this->session->set_flashdata('pesan', 'Revisi Produk' . $nama_lengkap . 'Berhasil');
			redirect('pelanggan/status_produkweb');
		} else {
			echo "<h3>Revisi data gagal</h3>";
		}
	}

	public function do_edit_selesai($id)
	{
		$status = "Selesai";

		$data = array('status' => $status);
		$where = array('id' => $id);

		$res = $this->pelangganmodel->UpdateData('bukti', $data, $where);
		if ($res >= 1) {
			$this->session->set_flashdata('pesan', 'selesai' . $nama_lengkap . 'berhasil');
			redirect('pelanggan/status_produkweb');
		} else {
			echo "<h3>Gagal</h3>";
		}
	}

//-------------------------------------------------------------------------------------------

	public function bukti_selesai($id_pelanggan)
	{
		$bs = $this->db->query("select * from bukti where id_pelanggan = '$id_pelanggan'")->result_array();
		$data = array(
				'id_pelanggan' => $bs[0]['id_pelanggan'],
				'nama_lengkap' => $bs[0]['nama_lengkap'],
				'bukti_selesai' => $bs[0]['bukti_selesai']
				);
		$this->load->view('pelanggan/bukti_selesai',$data);
	} 


	public function do_edit_bukti_selesai()
	{
		$id_pelanggan = $_POST['id_pelanggan'];
		$nama_lengkap = $_POST['nama_lengkap'];
		$bukti_selesai = $_FILES['bukti_selesai']['name'];
		$bukti_selesai1 = $_FILES['bukti_selesai']['tmp_name'];

		$dirUpload = "./assets/file_bukti/";
		$terupload = move_uploaded_file($bukti_selesai1,$dirUpload.$bukti_selesai);

		$data = array('id_pelanggan'=>$id_pelanggan,'nama_lengkap'=>$nama_lengkap,'bukti_selesai'=>$bukti_selesai);
		$where = array('id_pelanggan' => $id_pelanggan);

		$res = $this->pelangganmodel->UpdateData('bukti',$data,$where);

		if($res >= 1){
			echo "<script>
			alert('Unggah Bukti Selesai Berhasil !!');
			window.location.href='status_produkpel';
			</script>
			";
		}else {
			echo "<script>
			alert('Edit Data Web Gagal !!');
			window.location.href='status_produkpel';
			</script>";
		}
	}

//-----------------------------------------------------------------------------------------------------------------

	public function edit_data($id_pelanggan)
	{
		$produk = $this->pelangganmodel->GetStatus();
		$data = array(
				'id_pelanggan' => $produk[0]['id_pelanggan'],
				'nama_lengkap' => $produk[0]['nama_lengkap'],
				'no_rek' => $produk[0]['no_rek'],
				'foto_bukti' => $produk[0]['foto_bukti'],
				'bukti_selesai' => $produk[0]['bukti_selesai']
				);
		$this->load->view('pelanggan/edit_data',$data);
	} 


	public function do_edit_data()
	{
		$id_pelanggan = $_POST['id_pelanggan'];
		$nama_lengkap = $_POST['nama_lengkap'];
		$no_rek = $_POST['no_rek'];
		$foto_bukti = $_FILES['foto_bukti']['name'];
		$foto_bukti1 = $_FILES['foto_bukti']['tmp_name'];
		$bukti_selesai = $_FILES['bukti_selesai']['name'];
		$bukti_selesai1 = $_FILES['bukti_selesai']['tmp_name'];

		$dirUpload = "./assets/file_bukti/";
		$terupload = move_uploaded_file($foto_bukti1,$dirUpload.$foto_bukti);
		$terupload = move_uploaded_file($bukti_selesai1,$dirUpload.$bukti_selesai);

		$data = array('id_pelanggan'=>$id_pelanggan,'nama_lengkap'=>$nama_lengkap,'no_rek'=>$no_rek,'foto_bukti'=>$foto_bukti,'bukti_selesai'=>$bukti_selesai);
		$where = array('id_pelanggan' => $id_pelanggan);

		$res = $this->pelangganmodel->UpdateData('bukti',$data,$where);

		if($res >= 1){
			echo "<script>
			alert('Edit Data Berhasil !!');
			window.location.href='status_produkpel';
			</script>
			";
		}else {
			echo "<script>
			alert('Edit Data Gagal !!');
			window.location.href='status_produkpel';
			</script>";
		}
	}
}
