<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direkturmodel extends CI_Model {

	
//-----------------------------------------------------------


	public function GetProduk($where="")
	{
		$data = $this->db->query('select * from produklayanan '.$where);
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

//---------------------------------------------------------------

	function JumProduk()
	{
		$this->db->group_by('produk');
		$this->db->select('produk');
		$this->db->select("count(*) as total");
		$this->db->where('kategori','Non IT');
		return $this->db->from('invoice')
		->get()
		->result();
	}

	function JumPelanggan()
	{
		$this->db->group_by('pelanggan_id');
		$this->db->select('pelanggan_id');
		$this->db->select("count(*) as total2");
		$this->db->where('kategori','Non IT');
		return $this->db->from('invoice')
		->get()
		->result();
	}

	function JumAlamat()
	{
		$this->db->group_by('alamat');
		$this->db->select('alamat');
		$this->db->select("count(*) as total3");
		$this->db->where('kategori','Non IT');
		return $this->db->from('invoice')
		->get()
		->result();
	}

}
