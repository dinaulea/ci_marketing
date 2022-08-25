<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() //logic untuk menampung data dari view
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$cnt = $this->db->get_where('login',array('username' => $username,'password' => $password))->num_rows();
		$user = $this->db->get_where('login',array('username' => $username))->row_array();
		$sup = $this->db->get_where('supplier',array('username' => $username,'password' => $password))->num_rows();
		$us = $this->db->get_where('supplier',array('username' => $username))->row_array();
		$admin = $this->db->get_where('admin',array('username' => $username,'password' => $password))->num_rows();
		$min = $this->db->get_where('admin',array('username' => $username))->row_array();
		$this->username = $username;
		
		if($admin > 0 && $min['level'] == 'admin')
		{
			//array_push($user);
			$_SESSION['username'] = $min['username'];
			$_SESSION['nama_admin'] = $min['nama_admin'];
			$_SESSION['level'] = $min['level'];
			$_SESSION['id'] = $min['id'];
			echo "<script>
			alert('Login Admin Berhasil');
			window.location.href='beranda_login';
			</script>
			";
			header('location:'.base_url().'index.php/Admin/index');
		}
		
		else if($cnt > 0 && $user['level'] == 'pelanggan')
		{
			//array_push($user);
			$_SESSION['username'] = $user['username'];
			$_SESSION['nama'] = $user['nama'];
			$_SESSION['level'] = $user['level'];
			$_SESSION['id_admin'] = $user['id_admin'];
			$_SESSION['nama_admin'] = $user['nama_admin'];
			$_SESSION['id_pelanggan'] = $user['id_pelanggan'];
			$_SESSION['id_supplier'] = $user['id_supplier'];
			echo "<script>
			alert('Login Pelanggan Berhasil');
			window.location.href='beranda_login';
			</script>
			";
			header('location:'.base_url().'index.php/Pelanggan/index');
		}

		else if($cnt > 0 && $user['level'] == 'direktur')
		{
			//array_push($user);
			$_SESSION['username'] = $user['username'];
			$_SESSION['nama'] = $user['nama'];
			$_SESSION['level'] = $user['level'];
			$_SESSION['id_pelanggan'] = $user['id_pelanggan'];
			$_SESSION['id_supplier'] = $user['id_supplier'];
			echo "<script>
			alert('Login Direktur Berhasil');
			window.location.href='beranda_login';
			</script>
			";
			header('location:'.base_url().'index.php/Direktur/index');
		}

		else if($sup > 0 && $us['level'] == 'supplier')
		{
			//array_push($user);
			$_SESSION['username'] = $us['username'];
			$_SESSION['nama'] = $us['nama'];
			$_SESSION['level'] = $us['level'];
			$_SESSION['id_supplier'] = $us['id_supplier'];
			echo "<script>
			alert('Login Direktur Berhasil');
			window.location.href='beranda_login';
			</script>
			";
			header('location:'.base_url().'index.php/Supplier/index');
		}
	}
	
	public function logout()
	{
		$username = $_SESSION['username'];
		$user = $this->db->get_where('user',array('username' => $username))->row_array();
		session_destroy();
		echo "<script>
		alert('Anda telah logout dari sistem informasi perpustakaan');
		</script>";
		header('location:'.base_url().'index.php/Guest/index');
	}
}
