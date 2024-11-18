<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
	public function tampil() {
		return $this->db->get('user')->result();
	}

	public function tambah($data)
    {
        return $this->db->insert('user', $data);
    }

	public function edit($id) {
		$this->db->where('id', $id);
		return $this->db->get('user')->row();
	}

	public function proses_edit($where, $data) {
		$this->db->where($where);
		return $this->db->update('user', $data);
	}

	public function cek_nip($nip) {
		$this->db->where('nip', $nip);
		return $this->db->get('user')->row();
	}

	public function cek_nip_edit($nip, $id) {
		$this->db->where('nip', $nip);
		$this->db->where('id !=', $id);
		return $this->db->get('user')->row();
	}

	public function hapus($id) {
		$this->db->where('id', $id);
		return $this->db->delete('user');
	}
}
