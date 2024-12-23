<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_surat_kelahiran extends CI_Model
{
    public function pejabat()
    {
        return $this->db->query("SELECT * FROM user WHERE level IN ('pimpinan')")->result();
    }
    public function daftar_surat_kelahiran()
    {
        $this->db->from('surat_kelahiran');
        $this->db->join('kelahiran', 'surat_kelahiran.id_kelahiran=kelahiran.id_kelahiran');
        $this->db->join('user', 'surat_kelahiran.id_pejabat=user.id');
        return $this->db->get()->result();
    }

    public function tambah_surat_kelahiran($data)
    {
        return $this->db->insert('surat_kelahiran', $data);
    }

    public function edit_surat_kelahiran($id)
    {
        $this->db->where('id_surat_kelahiran', $id);
        return $this->db->get('surat_kelahiran')->row();
    }

    public function proses_edit_surat_kelahiran($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('surat_kelahiran', $data);
    }

    public function cetak_surat_kelahiran($id)
    {
        $this->db->from('surat_kelahiran');
        $this->db->where('id_surat_kelahiran', $id);
        $this->db->join('kelahiran', 'surat_kelahiran.id_kelahiran=kelahiran.id_kelahiran');
        $this->db->join('user', 'surat_kelahiran.id_pejabat=user.id');
        return $this->db->get()->row();
    }

    public function hapus_surat_kelahiran($id)
    {
        $this->db->where('id_surat_kelahiran', $id);
        return $this->db->delete('surat_kelahiran');
    }
}
