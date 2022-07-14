<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_userlog extends CI_Model {

	public function RegistData($tableName,$data)
	{
		$res = $this->db->insert($tableName,$data);
		return $res;
	}

//-----------------------------------------------------------------------------------

	function login($username,$password){
		$periksa = $this->db->get_where('login',array('username'=>$username,'password'=> md5($password)));
		if($periksa->num_rows()>0){
		  return 1;
		}else{
		  return 0;
		}
	  }

	  public function cekkode()
	  {
		  $query = $this->db->query("SELECT MAX(id_pelanggan) as id_pelanggan from login");
		  $hasil = $query->row();
		  return $hasil->id_pelanggan;
	  }
//-----------------------------------------------------------


	public function GetProduk()
	{
		$data = $this->db->query("select * from produklayanan");
		return $data->result_array();
	}

	public function InsertDataProduk($tableName,$data)
	{
		$res=$this->db->insert($tableName,$data);
		return $res;
	}

	public function DeleteDataProduk($tableName,$where)
	{
		$res=$this->db->delete($tableName,$where);
		return $res;
	}

	public function UpdateDataProduk($tableName,$data,$where)
	{
		$res=$this->db->update($tableName,$data,$where);
		return $res;
	}

//------------------------------------------------------------

	public function GetPelanggan($where="")
	{
		$data = $this->db->query('select * from pelanggan '.$where);
		return $data->result_array();
	}

	public function InsertDataPelanggan($tableName,$data)
	{
		$res=$this->db->insert($tableName,$data);
		return $res;
	}

	public function DeleteDataPelanggan($tableName,$where)
	{
		$res=$this->db->delete($tableName,$where);
		return $res;
	}

	public function UpdateDataPelanggan($tableName,$data,$where)
	{
		$res=$this->db->update($tableName,$data,$where);
		return $res;
	}

//----------------------------------------------------------------

	public function GetStatus($where="")
	{
		$data = $this->db->query('select * from produklayanan '.$where);
		return $data->result_array();
	}

}
