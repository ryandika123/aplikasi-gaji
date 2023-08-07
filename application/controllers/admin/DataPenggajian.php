<?php

class DataPenggajian extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') !='1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Anda Belum Login !</strong> 
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			    redirect('welcome');
		}
	}

	public function index()
	{
		$data['title'] = "Data Gaji Pegawai";
		 if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
         $bulan = $_GET['bulan'];
         $tahun = $_GET['tahun'];
         $bulantahun = $bulan.$tahun;
     }else{
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun = $bulan.$tahun;
     }
     $data['potongan'] = $this->model_gaji->get_data('tbl_potgaji')->result();
	 $data['gaji'] = $this->db->query("SELECT tbl_pegawai.nik,tbl_pegawai.nama_pegawai,tbl_pegawai.jenis_kelamin, tbl_jabatan.nama_jabatan, tbl_jabatan.gaji_pokok, tbl_jabatan.transport, tbl_jabatan.uang_makan, tbl_kehadiran.alpa FROM tbl_pegawai
			INNER JOIN tbl_kehadiran ON tbl_kehadiran.nik=tbl_pegawai.nik
			INNER JOIN tbl_jabatan ON tbl_jabatan.nama_jabatan=tbl_pegawai.jabatan
			WHERE tbl_kehadiran.bulan='$bulantahun' ORDER BY tbl_pegawai.nama_pegawai DESC")->result();
		$this->load->view('admin/templates_admin/header',$data);
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/dataGaji',$data);
		$this->load->view('admin/templates_admin/footer');

	}

	public function cetakGaji()
	{
		$data['title'] = "Cetak Gaji Pegawai";
		 if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
         $bulan = $_GET['bulan'];
         $tahun = $_GET['tahun'];
         $bulantahun = $bulan.$tahun;
     }else{
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun = $bulan.$tahun;
     }
     $data['potongan'] = $this->model_gaji->get_data('tbl_potgaji')->result();
	  $data['cetak_gaji'] = $this->db->query("SELECT tbl_pegawai.nik,tbl_pegawai.nama_pegawai,tbl_pegawai.jenis_kelamin, tbl_jabatan.nama_jabatan, tbl_jabatan.gaji_pokok, tbl_jabatan.transport, tbl_jabatan.uang_makan, tbl_kehadiran.alpa FROM tbl_pegawai
			INNER JOIN tbl_kehadiran ON tbl_kehadiran.nik=tbl_pegawai.nik
			INNER JOIN tbl_jabatan ON tbl_jabatan.nama_jabatan=tbl_pegawai.jabatan
			WHERE tbl_kehadiran.bulan='$bulantahun' ORDER BY tbl_pegawai.nama_pegawai DESC")->result();
		$this->load->view('admin/templates_admin/header',$data);;
		$this->load->view('admin/cetakGaji',$data);
	}



}


?>