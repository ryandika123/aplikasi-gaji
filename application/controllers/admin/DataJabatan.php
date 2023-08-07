<?php

class DataJabatan extends CI_Controller{
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
		$data['title'] = "Data Jabatan";
		$data['jabatan'] = $this->model_gaji->get_data('tbl_jabatan')->result();
		$this->load->view('admin/templates_admin/header',$data);
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/dataJabatan',$data);
		$this->load->view('admin/templates_admin/footer');

	}

	public function tambah_data()
	{
		$data['title'] = "Tambah Data Jabatan";
		$this->load->view('admin/templates_admin/header',$data);
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/tambahdatajabatan',$data);
		$this->load->view('admin/templates_admin/footer');

	}

	public function tambah_data_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambah_data();
		}else{
			$nama_jabatan    = $this->input->post('nama_jabatan');
			$gaji_pokok      = $this->input->post('gaji_pokok');
			$transport       = $this->input->post('transport');
			$uang_makan      = $this->input->post('uang_makan');

			$data = array(

				'nama_jabatan'  =>$nama_jabatan,
				'gaji_pokok'	=>$gaji_pokok,
				'transport'     =>$transport,
				'uang_makan'    =>$uang_makan,
			);

			$this->model_gaji->insert_data($data, 'tbl_jabatan');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>Data Berhasil Ditambahkan !</strong> 
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('admin/dataJabatan');
			
		}

	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_jabatan', 'nama_jabatan','required', ['required' => 'Nama Jabatan Wajib Diisi !']);
		$this->form_validation->set_rules('gaji_pokok', 'gaji_pokok','required', ['required' => 'Gaji Pokok Wajib diisi !']);
		$this->form_validation->set_rules('transport', 'transport','required', ['required' => 'Transport Wajib diisi !']);
		$this->form_validation->set_rules('uang_makan', 'uang_makan','required', ['required' => 'Uang Makan Wajib diisi !']);
	}

	public function update_data($id)
	{
		$where = array('id_jabatan' =>$id);
		$data['jabatan'] = $this->db->query("SELECT * FROM tbl_jabatan WHERE id_jabatan='$id'")->result();
		$data['title'] = "Edit Data Jabatan";
		$this->load->view('admin/templates_admin/header',$data);
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/updatedatajabatan',$data);
		$this->load->view('admin/templates_admin/footer');

	}

	public function update_data_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->update_data();
		}else{
			$id              = $this->input->post('id_jabatan');
			$nama_jabatan    = $this->input->post('nama_jabatan');
			$gaji_pokok      = $this->input->post('gaji_pokok');
			$transport       = $this->input->post('transport');
			$uang_makan      = $this->input->post('uang_makan');

			$data = array(
				'nama_jabatan'  =>$nama_jabatan,
				'gaji_pokok'	=>$gaji_pokok,
				'transport'     =>$transport,
				'uang_makan'    =>$uang_makan,
			);

			$where = array(
 					'id_jabatan'  => $id
			);

			$this->model_gaji->update_data('tbl_jabatan',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Data Berhasil Diupdate !</strong> 
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('admin/dataJabatan');
			
		}
	}

	public function delete_data($id)
	{
		$where = array('id_jabatan' => $id);
		$this->model_gaji->delete_data($where, 'tbl_jabatan');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Data Berhasil Dihapus !</strong> 
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('admin/dataJabatan');
	}

	public function search(){
		$data['title'] = "Data Jabatan";
		$keyword = $this->input->post('keyword');
		$data['jabatan'] = $this->model_gaji->get_keyword2($keyword);
		$this->load->view('admin/templates_admin/header',$data);
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/dataJabatan',$data);
		$this->load->view('admin/templates_admin/footer');
	}

}


?>