<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kedatangan extends CI_Model
{
    public function tampil()
    {
        $this->db->select('kedatangan.*, penduduk.*');
        $this->db->from('kedatangan');
        $this->db->join('penduduk', 'penduduk.nik = kedatangan.nik', 'left');
        return $this->db->get()->result();
    }

    public function cari($nik)
    {
        $this->db->where('nik', $nik);
        $query = $this->db->get('kedatangan');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function tambah($data)
    {
        return $this->db->insert('kedatangan', $data);
    }

    public function edit($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('kedatangan')->row();
    }

    public function proses_edit($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('kedatangan', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('kedatangan');
    }
    public function detail($nik = null)
    {
        $query = $this->db->get_where('kedatangan', array('nik' => $nik))->row();
        return $query;
    }

    public function get_penduduk()
	{
		$this->db->select('nik, nama');
		$this->db->from('penduduk');
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