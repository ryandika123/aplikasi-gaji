<?php
class DataGaji extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') !='2'){
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
		$data['title'] = "Data Gaji";
		$nik = $this->session->userdata('nik');
		$data['potongan'] = $this->model_gaji->get_data('tbl_potgaji')->result();
		$data['gaji'] = $this->db->query(" SELECT 
			tbl_pegawai.nama_pegawai, tbl_pegawai.nik,
			tbl_jabatan.gaji_pokok, tbl_jabatan.transport,
			tbl_jabatan.uang_makan, tbl_kehadiran.alpa,tbl_kehadiran.bulan, tbl_kehadiran.id_kehadiran FROM tbl_pegawai
			INNER JOIN tbl_kehadiran ON tbl_kehadiran.nik=tbl_pegawai.niK 
			INNER JOIN tbl_jabatan ON tbl_jabatan.nama_jabatan=tbl_pegawai.jabatan WHERE tbl_kehadiran.nik='$nik'
			ORDER BY tbl_kehadiran.bulan DESC")->result();
		$this->load->view('pegawai/templates_pegawai/header',$data);
		$this->load->view('pegawai/templates_pegawai/sidebar');
		$this->load->view('pegawai/dataGaji',$data);
		$this->load->view('pegawai/templates_pegawai/footer');
	}

	public function cetakslip($id){

		$data['title'] = "Cetak Slip Gaji";
		$data['potongan'] = $this->model_gaji->get_data('tbl_potgaji')->result();
		$slip['print_slip'] = $this->db->query("SELECT tbl_pegawai.nik,tbl_pegawai.nama_pegawai,tbl_jabatan.nama_jabatan,tbl_jabatan.gaji_pokok,tbl_jabatan.transport,tbl_jabatan.uang_makan, tbl_kehadiran.alpa
		    FROM tbl_pegawai
			INNER JOIN tbl_kehadiran ON tbl_kehadiran.nik=tbl_pegawai.nik
			INNER JOIN tbl_jabatan ON tbl_jabatan.nama_jabatan=tbl_pegawai.jabatan WHERE tbl_kehadiran.id_kehadiran='$id'")->result();
		$this->load->view('pegawai/templates_pegawai/header',$data);
		$this->load->view('pegawai/cetakSlipGaji',$slip);

	}

	
}


?>