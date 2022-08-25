<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direktur extends CI_Controller {

	public function index()
	{
		$data['login'] = $this->db->get_where('login',['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('direktur/home_direktur', $data);
	}

//------------------------------------------------------------------------------------------

	//UNGGAH BUKTI
	public function unggah_bukti()
	{
		$this->load->view('pelanggan/unggah_bukti');
	}

//------------------------------------------------------------------------------------------

	//DATA PRODUK
	public function data_produk()
	{
		$data=$this->direkturmodel->GetProduk();
		$this->load->view('direktur/data_produk',array('data'=>$data));
	}

	//VALIDASI
	public function do_edit_valid($id_produk)
	{
		$validasi="Tervalidasi";

		$data = array('validasi' =>$validasi);
		$where = array('id_produk' =>$id_produk);

		$res=$this->direkturmodel->UpdateData('produklayanan',$data,$where);
		if ($res>=1)
		{
			$this->session->set_flashdata('pesan','Validasi Produk'.$produk.'Berhasi');
			redirect('direktur/data_produk');
		} else
		{
			echo "<h3>Delete data gagal</h3>";
		}
	}

	public function do_edit_unvalid($id_produk)
	{
		$validasi="Revisi Proposal";

		$data = array('validasi' =>$validasi);
		$where = array('id_produk' =>$id_produk);

		$res=$this->direkturmodel->UpdateData('produklayanan',$data,$where);
		if ($res>=1)
		{
			$this->session->set_flashdata('pesan','Penolakan Produk'.$produk.'Berhasi');
			redirect('direktur/data_produk');
		} else
		{
			echo "<h3>Delete data gagal</h3>";
		}
	}

//----------------------------------------------------------------------------------------

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
		$this->load->view('direktur/data_insight',$data);
	}

}
