<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_surat_kematian extends CI_Model
{
    public function pejabat()
    {
        return $this->db->query("SELECT * FROM user WHERE level IN ('pimpinan')")->result();
    }
    
    public function daftar_surat_kematian()
    {
        $this->db->from('surat_kematian');
        $this->db->join('user', 'surat_kematian.id_pejabat=user.id');
        $this->db->join('kematian', 'surat_kematian.id_surat_kematian=kematian.id'); // {{ edit_1 }}
        $this->db->join('penduduk', 'kematian.nik=penduduk.nik');
        return $this->db->get()->result();
    }

    public function tambah_surat_kematian($data)
    {
        return $this->db->insert('surat_kematian', $data);
    }

    public function edit_surat_kematian($id)
    {
        $this->db->where('id_surat_kematian', $id);
        return $this->db->get('surat_kematian')->row();
    }

    public function proses_edit_surat_kematian($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('surat_kematian', $data);
    }

    public function cetak_surat_kematian($id)
    {
        $this->db->from('surat_kematian');
        $this->db->where('id_surat_kematian', $id);
        $this->db->join('user', 'surat_kematian.id_pejabat=user.id');
        $this->db->join('penduduk', 'surat_kematian.nik_pelapor=penduduk.nik');
        $this->db->join('kematian', 'surat_kematian.id_kematian=kematian.id'); // {{ edit_1 }}
        return $this->db->get()->row();
    }

    public function hapus_surat_kematian($id)
    {
        $this->db->where('id_surat_kematian', $id);
        return $this->db->delete('surat_kematian');
    }
}