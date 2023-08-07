<?php

class Model_gaji extends CI_model{

	public function get_data($table){
		return $this->db->get($table);
	}

	public function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function update_data($table, $data, $where){
		$this->db->update($table, $data, $where);
	}

	public function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function insert_batch($table = null, $data = array())
	{
		$jumlah = count($data);
		if($jumlah > 0)
		{
			$this->db->insert_batch($table, $data);
		}
	}

	public function get_keyword($keyword){
		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$this->db->like('nik',$keyword);
		$this->db->or_like('nama_pegawai',$keyword);
		$this->db->or_like('jenis_kelamin',$keyword);
		$this->db->or_like('jabatan',$keyword);
		$this->db->or_like('status',$keyword);
		$this->db->or_like('alamat',$keyword);
		$this->db->or_like('telepon',$keyword);
		return $this->db->get()->result();
	}

	public function get_keyword2($keyword){
		$this->db->select('*');
		$this->db->from('tbl_jabatan');
		$this->db->like('nama_jabatan',$keyword);
		$this->db->or_like('gaji_pokok',$keyword);
		$this->db->or_like('transport',$keyword);
		$this->db->or_like('uang_makan',$keyword);
		return $this->db->get()->result();
	}

	public function cek_login(){

		$username  = set_value('username');
		$password  = set_value('password');

		$result = $this->db->where('username',$username)
		                   ->where('password',md5($password))
		                   ->limit(1)
		                   ->get('tbl_pegawai');
		if($result->num_rows()>0){
			return $result->row();
		}else{
			return FALSE;
		}
	}

}

?>