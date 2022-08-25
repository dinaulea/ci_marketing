<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelangganmodel extends CI_Model {

	
//-----------------------------------------------------------

	public function InsertDataBukti($tableName,$data)
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

//---------------------------------------------------------

	public function GetStatus($where="")
	{
		$data = $this->db->query("select * from bukti where id_pelanggan='$_SESSION[id_pelanggan]'".$where);
		return $data->result_array();
	}

	public function GetStatus2($where="")
	{
		$data = $this->db->query('select * from bukti'.$where);
		return $data->result_array();
	}

//---------------------------------------------------------

	public function Total()
	{
		$this->db->select('SUM(total) as total');
		$this->db->from('invoice');
		return $this->db->get()->row()->total;
	}
}
