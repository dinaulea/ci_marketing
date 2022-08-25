<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supmodel extends CI_Model {

	
//-----------------------------------------------------------


	public function GetProduk($where="")
	{
		$data = $this->db->query("select * from produk_sup where id_supplier='$_SESSION[id_supplier]'".$where);
		return $data->result_array();
	}

	public function GetProduk2($where="")
	{
		$data = $this->db->query('select * from produk_sup '.$where);
		return $data->result_array();
	}


	public function GetPembelian($where="")
	{
		$data = $this->db->query("select * from pembelian_produk where id_supplier='$_SESSION[id_supplier]'");
		return $data->result_array();
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

	public function InsertData($tableName,$data)
	{
		$res=$this->db->insert($tableName,$data);
		return $res;
	}

}
