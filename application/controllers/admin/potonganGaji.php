<?php

class PotonganGaji extends CI_Controller{

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
		$data['title']     = "Settingan Potongan Gaji";
		$data['pot_gaji']  = $this->model_gaji->get_data('tbl_potgaji')->result();
		$this->load->view('admin/templates_admin/header',$data);
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/dataPotongan',$data);
		$this->load->view('admin/templates_admin/footer');
	}

	public function tambah_data()
	{
		$data['title'] = "Tambah Data Potongan Gaji";
		$this->load->view('admin/templates_admin/header',$data);
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/tambahdataPotongan',$data);
		$this->load->view('admin/templates_admin/footer');
	}

	public function tambah_data_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambah_data();
		}else{
			$potongan   = $this->input->post('potongan');
			$jml_gaji   = $this->input->post('jml_gaji');

			$data = array(
                'potongan'		=>$potongan,
				'jml_gaji'      =>$jml_gaji,
			);

			$this->model_gaji->insert_data($data, 'tbl_potgaji');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>Data Berhasil Ditambahkan !</strong> 
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('admin/potonganGaji');
			
		}

	}

	public function _rules()
	{
		$this->form_validation->set_rules('potongan', 'potongan','required', ['required' => 'Jenis Potongan Wajib Diisi !']);
		$this->form_validation->set_rules('jml_gaji', 'jml_gaji','required', ['required' => 'Jumlah Potongan Wajib diisi !']);
	}

	public function update_data($id)
	{
		$where = array('id' =>$id);
		$data['pot_gaji'] = $this->db->query("SELECT * FROM tbl_potgaji WHERE id='$id'")->result();
		$data['title'] = "Edit Data Potongan Gaji";
		$this->load->view('admin/templates_admin/header',$data);
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/updatedataPotongan',$data);
		$this->load->view('admin/templates_admin/footer');
	}

	public function update_data_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->update_data();
		}else{
			$id              = $this->input->post('id');
			$potongan        = $this->input->post('potongan');
			$jml_gaji        = $this->input->post('jml_gaji');

			$data = array(
				'potongan'      =>$potongan,
				'jml_gaji'	    =>$jml_gaji,
			);

			$where = array(
 					'id'  => $id
			);

			$this->model_gaji->update_data('tbl_potgaji',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Data Berhasil Diupdate !</strong> 
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('admin/potonganGaji');
			
		}
	}

	public function delete_data($id)
	{
		$where = array('id' => $id);
		$this->model_gaji->delete_data($where, 'tbl_potgaji');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Data Berhasil Dihapus !</strong> 
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		redirect('admin/potonganGaji');
	}


}




?>