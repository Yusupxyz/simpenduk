<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pindah extends CI_Model
{
    public function tampil()
    {
        $this->db->select('pindahdatang.*, penduduk.*');
        $this->db->from('pindahdatang');
        $this->db->join('penduduk', 'penduduk.nik = pindahdatang.nik', 'left');
        return $this->db->get()->result();
    }

    public function cari($nik)
    {
        $this->db->where('nik', $nik);
        $query = $this->db->get('pindahdatang');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function tambah($data)
    {
        return $this->db->insert('pindahdatang', $data);
    }

    public function edit($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('pindahdatang')->row();
    }

    public function proses_edit($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('pindahdatang', $data);
    }

    public function hapus($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->delete('pindahdatang');
    }
    public function detail($nik = null)
    {
        $query = $this->db->get_where('pindahdatang', array('nik' => $nik))->row();
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