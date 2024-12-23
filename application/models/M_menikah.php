<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_menikah extends CI_Model
{
    public function pejabat()
    {
        return $this->db->query("SELECT * FROM user WHERE level IN ('pimpinan')")->result();
    }

    public function daftar_menikah()
    {
        $this->db->from('menikah');
        $this->db->join('penduduk', 'menikah.nik=penduduk.nik');
        $this->db->join('user', 'menikah.id_pejabat=user.id');
        return $this->db->get()->result();
    }

    public function tambah_menikah($data)
    {
        return $this->db->insert('menikah', $data);
    }

    public function edit_menikah($id)
    {
        $this->db->where('id_menikah', $id);
        return $this->db->get('menikah')->row();
    }

    public function proses_edit_menikah($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('menikah', $data);
    }

    public function cetak_menikah($id)
    {
        $this->db->from('menikah');
        $this->db->where('id_menikah', $id);
        $this->db->join('penduduk', 'menikah.nik=penduduk.nik');
        $this->db->join('user', 'menikah.id_pejabat=user.id');
        return $this->db->get()->row();
    }

    public function hapus_menikah($id)
    {
        $this->db->where('id_menikah', $id);
        return $this->db->delete('menikah');
    }
}