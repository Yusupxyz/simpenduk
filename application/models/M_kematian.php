<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kematian extends CI_Model
{
	public function tampil()
	{
		$this->db->select('*');
		$this->db->from('kematian');
		$this->db->join('penduduk', 'penduduk.nik = kematian.nik', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function cari($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('kematian');
		if ($query->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}

	public function tambah($data)
	{
		return $this->db->insert('kematian', $data);
	}

	public function edit($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('kematian')->row();
	}

	public function proses_edit($where, $data)
	{
		$this->db->where($where);
		return $this->db->update('kematian', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('kematian');
	}
	public function detail($id = NULL)
	{
		$query = $this->db->get_where('kematian', array('id' => $id))->row();
		return $query;
	}

	public function get_penduduk()
	{
		$this->db->select('nik, nama');
		$this->db->from('penduduk');
		$this->db->where('nik NOT IN (SELECT nik FROM kematian)');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_penduduk_edit()
	{
		$this->db->select('nik, nama');
		$this->db->from('penduduk');
		$query = $this->db->get();
		return $query->result();
	}
}