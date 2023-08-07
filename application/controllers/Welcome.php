<?php

class Welcome extends CI_Controller{

	public function index()
	{
		$this->_rules();
		if($this->form_validation->run()==FALSE){
			$this->load->view('admin/templates_admin/header');
			$this->load->view('form_login');
			$this->load->view('admin/templates_admin/footer');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->model_gaji->cek_login($username,$password);

			if($cek == FALSE)
			{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Username atau Password Salah !</strong> 
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			    redirect('welcome');
			
			}else{
				$this->session->set_userdata('hak_akses',$cek->hak_akses);
				$this->session->set_userdata('nama_pegawai',$cek->nama_pegawai);
				$this->session->set_userdata('foto',$cek->foto);
				$this->session->set_userdata('id_pegawai',$cek->id_pegawai);
				$this->session->set_userdata('nik',$cek->nik);
				switch ($cek->hak_akses) {
					case 1: redirect('admin/dashboard');
						// code...
						break;
					case 2: redirect('pegawai/dashboard');
						// code...
						break;
					default:
						// code...
						break;
				}
				
			}
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
	}

	public function keluar()
	{
		 session_destroy();
		 redirect('welcome');
	}
}


?>