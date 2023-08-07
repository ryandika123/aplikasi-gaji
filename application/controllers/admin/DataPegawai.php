<?php

class dataPegawai extends CI_Controller{
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
		$data['title'] = "Data Pegawai";
		$data['pegawai'] = $this->model_gaji->get_data('tbl_pegawai')->result();
		$this->load->view('admin/templates_admin/header',$data);
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/dataPegawai',$data);
		$this->load->view('admin/templates_admin/footer');

	}

	public function tambah_data()
	{
		$data['title'] = "Tambah Data Pegawai";
		$data['jabatan'] = $this->model_gaji->get_data('tbl_jabatan')->result();
		$this->load->view('admin/templates_admin/header',$data);
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/tambahdatapegawai',$data);
		$this->load->view('admin/templates_admin/footer');

	}

	public function tambah_data_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambah_data();
		}else{
			$nik             = $this->input->post('nik');
			$nama_pegawai    = $this->input->post('nama_pegawai');
			$jenis_kelamin   = $this->input->post('jenis_kelamin');
			$tanggal_masuk   = $this->input->post('tanggal_masuk');
			$jabatan         = $this->input->post('jabatan');
			$status          = $this->input->post('status');
			$alamat          = $this->input->post('alamat');
			$telepon         = $this->input->post('telepon');
			$hak_akses       = $this->input->post('hak_akses');
			$username        = $this->input->post('username');
			$password        = md5($this->input->post('password'));
			$foto            = $_FILES['foto']['name'];
			if($foto=''){}else{
				$config ['upload_path']  = './asset/img';
				$config ['allowed_types'] = 'jpg|jpeg|png|tiff';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('foto')){
					echo "Foto Gagal Diuupload!";
				}else{
					$foto=$this->upload->data('file_name');
				}
			}

			$data = array(
                'nik'			=>$nik,
				'nama_pegawai'  =>$nama_pegawai,
				'jenis_kelamin'	=>$jenis_kelamin,
				'tanggal_masuk' =>$tanggal_masuk,
				'jabatan'       =>$jabatan,
				'status'		=>$status,
				'alamat'        =>$alamat,
				'telepon'		=>$telepon,
				'hak_akses'		=>$hak_akses,
				'username'		=>$username,
				'password'		=>$password,
				'foto'          =>$foto,
			);

			$this->model_gaji->insert_data($data, 'tbl_pegawai');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>Data Berhasil Ditambahkan !</strong> 
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('admin/dataPegawai');
			
		}

	}

	public function _rules()
	{
		$this->form_validation->set_rules('nik', 'nik','required', ['required' => 'Nip Wajib Diisi !']);
		$this->form_validation->set_rules('nama_pegawai', 'nama_pegawai','required', ['required' => 'Nama Pegawai Wajib diisi !']);
		$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin','required', ['required' => 'Jenis Kelamin Wajib diisi !']);
		$this->form_validation->set_rules('tanggal_masuk', 'tanggal_masuk','required', ['required' => 'Tanggal Masuk Wajib diisi !']);
		$this->form_validation->set_rules('status', 'status','required', ['required' => 'Status Wajib diisi !']);
		$this->form_validation->set_rules('jabatan', 'jabatan','required', ['required' => 'Jabatan Wajib diisi !']);
		$this->form_validation->set_rules('alamat', 'alamat','required', ['required' => 'Alamat Wajib diisi !']);
		$this->form_validation->set_rules('telepon', 'telepon','required', ['required' => 'Nomor Telepon Wajib diisi Maksimal 12 Digit !']);
		$this->form_validation->set_rules('hak_akses', 'hak_akses','required', ['required' => 'Silahkan Pilih Hak Akses !']);
	
	}

	public function update_data($id)
	{
		$data['title'] = "Edit Data Pegawai";
		$where = array('id_pegawai' =>$id);
		$data['pegawai'] = $this->db->query("SELECT * FROM tbl_pegawai WHERE id_pegawai='$id'")->result();
		$this->load->view('admin/templates_admin/header',$data);
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/updatedatapegawai',$data);
		$this->load->view('admin/templates_admin/footer');

	}

	public function update_data_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->update_data();
		}else{
			$id 			 = $this->input->post('id_pegawai');
			$nik             = $this->input->post('nik');
			$nama_pegawai    = $this->input->post('nama_pegawai');
			$jenis_kelamin   = $this->input->post('jenis_kelamin');
			$tanggal_masuk   = $this->input->post('tanggal_masuk');
			$jabatan         = $this->input->post('jabatan');
			$status          = $this->input->post('status');
			$alamat          = $this->input->post('alamat');
			$telepon         = $this->input->post('telepon');
			$hak_akses       = $this->input->post('hak_akses');
			$username        = $this->input->post('username');
			$password        = md5($this->input->post('password'));
			$foto            = $_FILES['foto']['name'];
			if($foto){
				$config ['upload_path']  = './asset/img';
				$config ['allowed_types'] = 'jpg|jpeg|png|tiff';
				$this->load->library('upload',$config);
				if($this->upload->do_upload('foto')){
					$foto=$this->upload->data('file_name');
					$this->db->set('foto',$foto);
				}else{
					echo $this->upload->display_errors();
				}
			}

			$data = array(
                'nik'			=>$nik,
				'nama_pegawai'  =>$nama_pegawai,
				'jenis_kelamin'	=>$jenis_kelamin,
				'tanggal_masuk' =>$tanggal_masuk,
				'jabatan'       =>$jabatan,
				'status'		=>$status,
				'alamat'        =>$alamat,
				'telepon'		=>$telepon,
			    'hak_akses'		=>$hak_akses,
			    'username'		=>$username,
				'password'		=>$password,
			);

			$where = array(
				'id_pegawai'  => $id

			);

			$this->model_gaji->update_data('tbl_pegawai',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Data Berhasil Diupdate !</strong> 
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('admin/dataPegawai');
			
		}

	}

	public function delete_data($id)
	{
		$where = array('id_pegawai' => $id);
		$this->model_gaji->delete_data($where, 'tbl_pegawai');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Data Berhasil Dihapus !</strong> 
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('admin/dataPegawai');
	}

	public function search(){
		$data['title'] = "Data Pegawai";
		$keyword = $this->input->post('keyword');
		$data['pegawai'] = $this->model_gaji->get_keyword($keyword);
		$this->load->view('admin/templates_admin/header',$data);
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/dataPegawai',$data);
		$this->load->view('admin/templates_admin/footer');
	}





   
}

?>