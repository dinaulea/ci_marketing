<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admmodel extends CI_Model {

	
//-----------------------------------------------------------


	public function GetProduk($where="")
	{
		$data = $this->db->query('select * from produklayanan '.$where);
		return $data->result_array();
	}

    public function GetPelanggan($where="")
	{
		$data = $this->db->query("select * from login where level='pelanggan'");
		return $data->result_array();
	}

    public function GetInvoice($where="")
	{
		$data = $this->db->query('select * from invoice '.$where);
		return $data->result_array();
	}

	public function GetInvoiceID($where="")
	{
		$data = $this->db->query("select * from invoice where no_invoice='$no_invoice'");
		return $data->result_array();
	}

	public function GetInvoice1($where="")
	{
		$data = $this->db->query("select * from invoice join produklayanan on invoice.produk = produklayanan.produk where kategori='IT'");
		return $data->result_array();
	}

	public function GetInvoice2($where="")
	{
		$data = $this->db->query("select * from invoice join produklayanan on invoice.produk = produklayanan.produk where kategori='Non IT'");
		return $data->result_array();
	}
	
	public function Total()
	{
	$this->db->select('SUM(total) as total');
	$this->db->from('invoice');
	return $this->db->get()->row()->total;
	}

	public function ProdukTersedia()
	{
	$this->db->select('SUM(satuan) as total');
	$this->db->from('produklayanan');
	return $this->db->get()->row()->total;
	}

	public function ProdukTerjual()
	{
	$this->db->select('SUM(qty) as total');
	$this->db->from('invoice');
	return $this->db->get()->row()->total;
	}

	public function JumlahPelanggan()
	{
	$this->db->select('COUNT(nama) as total');
	$this->db->from('login');
	$this->db->where('level','pelanggan');
	return $this->db->get()->row()->total;
	}

	public function ProdukDikemas()
	{
	$this->db->select('COUNT(id_pelanggan) as total');
	$this->db->from('bukti');
	$this->db->where('status','Produk Dikemas');
	return $this->db->get()->row()->total;
	}

	public function ProdukDikirim()
	{
	$this->db->select('COUNT(id_pelanggan) as total');
	$this->db->from('bukti');
	$this->db->where('status','Produk Dikirim');
	return $this->db->get()->row()->total;
	}

	public function sum()
	{
	$this->db->select('SUM(total) as total');
	$this->db->from('invoice');
	$this->db->where('no_invoice','$no_invoice');
	return $this->db->get()->row()->total;
	}

	public function GetStatus($where="")
	{
		$data = $this->db->query('select * from bukti '.$where);
		return $data->result_array();
	}

	public function GetDetail($where="")
	{
		$data = $this->db->query("select * from supplier where level='supplier'");
		return $data->result_array();
	}

	public function GetProduksup($where="")
	{
		$data = $this->db->query("select * from produk_sup where id_supplier='$_SESSION[id_supplier]'");
		return $data->result_array();
	}

	public function InsertData($tableName,$data)
	{
		$res=$this->db->insert($tableName,$data);
		return $res;
	}

	public function DeleteData($tableName,$where)
	{
		$res=$this->db->delete($tableName,$where);
		return $res;
	}

	public function UpdateData($tableName,$data,$where)
	{
		$res=$this->db->update($tableName,$data,$where);
		return $res;
	}

//----------------------------------------------------------------------------

	function JumProduk()
	{
		$this->db->group_by('produk');
		$this->db->select('produk');
		$this->db->select("count(*) as total");
		return $this->db->from('invoice')
		->get()
		->result();
	}

	function JumPelanggan()
	{
		$this->db->group_by('pelanggan_id');
		$this->db->select('pelanggan_id');
		$this->db->select("count(*) as total2");
		return $this->db->from('invoice')
		->get()
		->result();
	}

	function JumAlamat()
	{
		$this->db->group_by('id_pelanggan');
		$this->db->select('alamat');
		$this->db->select("count(*) as total3");
		$this->db->where('level','pelanggan');
		return $this->db->from('login')
		->get()
		->result();
	}

//----------------------------------------------------------------------------

function get_idplg()
    {
        $this->db->order_by('id_pelanggan', 'ASC');
        $query = $this->db->get('login');
        return $query->result();
    }

    function get_n($id_pelanggan)
{
        //ambil data kabupaten berdasarkan id provinsi yang dipilih
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->order_by('id_pelanggan', 'ASC');
        $query = $this->db->get('login');

        $output = '<option value="">-- Pilih Kabupaten --</option>';

        //looping data
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->kabupaten . '</option>';
        }
        //return data kabupaten
        return $output;
    }

//------------------------------------------------------------------------------

	public function GetSupplier($where="")
	{
		$data = $this->db->query("select * from supplier where level='supplier'");
		return $data->result_array();
	}

}
