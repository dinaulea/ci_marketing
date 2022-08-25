<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function index()
	{
		$data['login'] = $this->db->get_where('supplier',['nama_perusahaan' => $this->session->userdata('nama_perusahaan')])->row_array();
		$this->load->view('supplier/home_supplier', $data);
	}

//------------------------------------------------------------------------------------------

	//DATA PRODUK SUPPLIER
	public function data_produk()
	{
		$data=$this->supmodel->GetProduk();
		$this->load->view('supplier/data_produk',array('data'=>$data));
	}

	public function tambah_produk()
	{
		$data['idsupplier']=$this->supmodel->GetProduk();
		$this->load->view('supplier/tambah_produk');
	}

	public function do_tambah_produk()
	{
		$id_produk = $_POST['id_produk'];
		$id_supplier = $_SESSION['id_supplier'];
		$kategori = $_POST['kategori'];
		$produk = $_POST['produk'];
		$foto_produk = $_FILES['foto_produk']['name'];
		$foto_produk1 = $_FILES['foto_produk']['tmp_name'];
		$satuan = $_POST['satuan'];
		$harga_jual = $_POST['harga_jual'];

		$dirUpload = "./assets/file_produksup/";
		$terupload = move_uploaded_file($foto_produk1,$dirUpload.$foto_produk);
		
		$data = array('id_produk' => $id_produk,
					  'id_supplier' => $id_supplier,
					  'kategori' => $kategori,
					  'produk' => $produk,
					  'foto_produk' => $foto_produk,
					  'satuan' => $satuan,
					  'harga_jual' => $harga_jual
					 );

		$res = $this->supmodel->InsertData('produk_sup',$data);
		if($res >= 1){
			echo "<script>
			alert('Tambah Data Berhasil');
			window.location.href='data_produk';
			</script>
			";
		}else {
			echo "<script>
			alert('Tambah Data Gagal');
			window.location.href='tambah_produk';
			</script>";
		}
	}

	public function edit_produk($id_produk)
	{
		$produk = $this->db->query("select * from produk_sup where id_produk='$id_produk'")->result_array();
		$data = array(
				'id_produk' => $produk[0]['id_produk'],
				'kategori' => $produk[0]['kategori'],
				'produk' => $produk[0]['produk'],
				'foto_produk' => $produk[0]['foto_produk'],
		    	'satuan' => $produk[0]['satuan'],
				'harga_jual' => $produk[0]['harga_jual']
				);
		$this->load->view('supplier/edit_produk',$data);
	} 


	public function do_edit_produk()
	{
		$id_produk = $_POST['id_produk'];
		$kategori = $_POST['kategori'];
		$produk = $_POST['produk'];
		$foto_produk = $_FILES['foto_produk']['name'];
		$foto_produk1 = $_FILES['foto_produk']['tmp_name'];
		$satuan = $_POST['satuan'];
		$harga_jual = $_POST['harga_jual'];

		$dirUpload = "./assets/file_produksup/";
		$terupload = move_uploaded_file($foto_produk1,$dirUpload.$foto_produk);

		$data = array('id_produk'=>$id_produk,'kategori'=>$kategori,'produk'=>$produk,'foto_produk'=>$foto_produk,'satuan'=>$satuan,'harga_jual'=>$harga_jual);
		$where = array('id_produk' => $id_produk);

		$res = $this->supmodel->UpdateData('produk_sup',$data,$where);

		if($res >= 1){
			echo "<script>
			alert('Edit Data Produk Berhasil !!');
			window.location.href='data_produk';
			</script>
			";
		}else {
			echo "<script>
			alert('Edit Data Produk Gagal !!');
			window.location.href='data_produk';
			</script>";
		}
	}

	public function hapus_produk($id_produk)
	{
		$where = array('id_produk' => $id_produk);
		$res = $this->supmodel->DeleteData('produk_sup',$where);

		if($res >= 1){
			$this->session->set_flashdata('pesan','Delete data '.$id_produk.' berhasil');
			redirect('Supplier/data_produk');
		}
		else{
			echo "<h3>Delete data Produk gagal</h3>";
		}
	}

//------------------------------------------------------------------------------------------
	
	//DATA PRODUK SUPPLIER
	public function pembelian_produk()
	{
		$data=$this->supmodel->GetPembelian();
		$this->load->view('supplier/pembelian_produk',array('data'=>$data));
	}

	//VALIDASI
	public function do_edit_valid($id_produk)
	{
		$status="Tervalidasi";

		$data = array('status' =>$status);
		$where = array('id_produk' =>$id_produk);

		$res=$this->supmodel->UpdateData('pembelian_produk',$data,$where);

		$sql=$this->db->query("select * from pembelian_produk where id_produk = '$id_produk'")->row();
		$jumlah=$sql->jumlah;
		$produk=$sql->produk;
		
        $din=$this->db->query("select * from pembelian_produk left join produk_sup ON pembelian_produk.id_produk = produk_sup.id_produk where pembelian_produk.status='Tervalidasi'");
    	$cek=$din->num_rows();

        if ($cek > 0 ) {
        $this->db->query("update produk_sup set satuan=satuan-'$jumlah' where id_produk = '$id_produk'");
		}

		$aul=$this->db->query("select * from pembelian_produk left join produklayanan ON pembelian_produk.id_produk = produklayanan.id_produk where pembelian_produk.status='Tervalidasi'");
        $cek1=$aul->num_rows();

        if ($cek1 > 0 ) {
        $this->db->query("update produklayanan set satuan=satuan+'$jumlah' where id_produk = '$id_produk'");
        }

		if ($res>=1)
		{
			$this->session->set_flashdata('pesan','Validasi Produk'.$produk.'Berhasi');
			redirect('supplier/pembelian_produk');
		} else
		{
			echo "<h3>Delete data gagal</h3>";
		}
	}
	
}
