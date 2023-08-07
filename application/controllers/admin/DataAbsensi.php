<?php

class DataAbsensi extends CI_Controller{
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
		$data['title'] = "Data Kehadiran Pegawai";
		 if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
	         $bulan = $_GET['bulan'];
	         $tahun = $_GET['tahun'];
	         $bulantahun = $bulan.$tahun;
	     }else{
	        $bulan = date('m');
	        $tahun = date('Y');
	        $bulantahun = $bulan.$tahun;
	     }


		$data['absensi'] = $this->db->query("SELECT tbl_kehadiran.*, tbl_pegawai.nama_pegawai, tbl_pegawai.jenis_kelamin, tbl_pegawai.jabatan FROM tbl_kehadiran
			INNER JOIN tbl_pegawai ON tbl_kehadiran.nik=tbl_pegawai.nik
			INNER JOIN tbl_jabatan ON tbl_pegawai.jabatan = tbl_jabatan.nama_jabatan
			WHERE tbl_kehadiran.bulan= '$bulantahun' ORDER BY tbl_pegawai.nama_pegawai DESC")->result();
	
		$this->load->view('admin/templates_admin/header',$data);
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/dataAbsensi',$data);
		$this->load->view('admin/templates_admin/footer');
	}

	public function inputabsensi()
	{
		if($this->input->post('submit', TRUE) == 'submit'){

			$post = $this->input->post();

			foreach ($post['bulan'] as $key => $value) {
				if($post['bulan'][$key] !='' || $post['nik'][$key] !='')
				{
					$simpan[] = array(
						'bulan'			=> $post['bulan'][$key],
						'nik' 			=> $post['nik'][$key],
						'nama_pegawai'  => $post['nama_pegawai'][$key],
						'jenis_kelamin' => $post['jenis_kelamin'][$key],
						'nama_jabatan'  => $post['nama_jabatan'][$key],
						'hadir'  		=> $post['hadir'][$key],
						'sakit'  		=> $post['sakit'][$key],
						'alpa'  		=> $post['alpa'][$key],
					);
				}
			}

			$this->model_gaji->insert_batch('tbl_kehadiran', $simpan);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>Data Berhasil Ditambahkan !</strong> 
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('admin/dataAbsensi');

		}

		$data['title'] = "Data Input Kehadiran Pegawai";

		 if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
	         $bulan = $_GET['bulan'];
	         $tahun = $_GET['tahun'];
	         $bulantahun = $bulan.$tahun;
	     }else{
	        $bulan = date('m');
	        $tahun = date('Y');
	        $bulantahun = $bulan.$tahun;
	     }

		$data['input_absensi'] = $this->db->query("SELECT tbl_pegawai.*, tbl_jabatan.nama_jabatan FROM tbl_pegawai
			INNER JOIN tbl_jabatan ON tbl_pegawai.jabatan=tbl_jabatan.nama_jabatan
			WHERE NOT EXISTS(SELECT * FROM tbl_kehadiran WHERE bulan='$bulantahun' AND tbl_pegawai.nik=tbl_kehadiran.nik)
			ORDER BY tbl_pegawai.nama_pegawai DESC")->result();
		$this->load->view('admin/templates_admin/header',$data);
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/tambah_Absensi',$data);
		$this->load->view('admin/templates_admin/footer');
	}

}



?>