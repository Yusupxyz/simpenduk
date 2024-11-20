<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pindah extends CI_Model
{
    public function tampil()
    {
        $this->db->select('pindah.*, penduduk.*');
        $this->db->from('pindah');
        $this->db->join('penduduk', 'penduduk.nik = pindah.nik', 'left');
        return $this->db->get()->result();
    }

    public function cari($nik)
    {
        $this->db->where('nik', $nik);
        $query = $this->db->get('pindah');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function tambah($data)
    {
        return $this->db->insert('pindah', $data);
    }

    public function edit($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('pindah')->row();
    }

    public function proses_edit($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('pindah', $data);
    }

    public function hapus($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->delete('pindah');
    }
    public function detail($nik = null)
    {
        $query = $this->db->get_where('pindah', array('nik' => $nik))->row();
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