<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function home_admin()
	{
		$this->load->view('admin/admin_home');
	}

	public function beranda_login()
	{
		$this->load->view('login');
	}

	public function registrasi() //menampung nilai view trus akan menyambungkan ke function yang ada di model
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$nomor_hp = $_POST['nomor_hp'];
		$email = $_POST['email'];
		$nama_perusahaan = $_POST['nama_perusahaan'];
		$alamat_perusahaan = $_POST['alamat_perusahaan'];
		$jabatan = $_POST['jabatan'];
		$level = 'pelanggan';

		$id_pelanggan = $_POST['id_pelanggan'];
		
		$data = array('username'=>$username, 
					  'password' => $password, 
					  'nama' => $nama, 
					  'alamat' => $alamat, 
					  'nomor_hp' => $nomor_hp,
					  'email' => $email,
					  'nama_perusahaan' => $nama_perusahaan,
					  'alamat_perusahaan' => $alamat_perusahaan,
					  'jabatan' => $jabatan,
					  'level' => $level,
					  'id_pelanggan' => $id_pelanggan);
		
		$res = $this->model_userlog->RegistData('login',$data);
		
		if($res >= 1){
			echo "<script>
			alert('Registrasi Pelanggan Berhasil');
			window.location.href='beranda_login';
			</script>
			";
		}else{
			echo "<script>
				alert('Registrasi User Gagal');
			window.location.href='beranda_login';
			</script>";
		}
	}

	public function register()
	{
		
		$this->load->view('pelanggan/register');
	}

	public function logout()
	{
		$username = $_SESSION['username'];
		$user = $this->db->get_where('login',array('username' => $username))->row_array();
		session_destroy();
		echo "<script>
		alert('Anda telah logout dari sistem informasi sales and distribution');
		</script>";
		header('location:'.base_url().'index.php/Welcome/index');
	}
}
