<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pindah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login') == FALSE) {
			redirect(base_url("login"));
		}
		$this->load->model('m_pindah');
		$this->load->model('m_penduduk');
	}
	public function tampil()
	{
		$data['title'] = "Data Pindah  - Desa Penarukan";
		$data['pindah'] = $this->m_pindah->tampil();

		$mutasi = $this->load->view('header', $data);
		$this->load->view('pindah/tampil_pindah');
		$this->load->view('footer');
	}

	public function tambah()
	{
		$data['title'] = "Tambah Pindah  - Desa Penarukan";
		$data['penduduk'] = $this->m_penduduk->tampil();

		$this->load->view('header', $data);
		$this->load->view('pindah/tambah_pindah');
		$this->load->view('footer');
	}

	public function proses_tambah()
	{
		$nik = $this->input->post('nik');
		$alasan_pindah = $this->input->post('alasan_pindah');
		$tanggal_pindah = $this->input->post('tanggal_pindah');
		$alamat_tujuan = $this->input->post('alamat_tujuan');
		$klasifikasi_pindah = $this->input->post('klasifikasi_pindah');

		$data = array(
			'nik' => $nik,
			'alasan_pindah' => ucwords($alasan_pindah),
			'tanggal_pindah' => $tanggal_pindah,
			'alamat_tujuan' => $alamat_tujuan,
			'klasifikasi_pindah' => $klasifikasi_pindah,
		);
		$this->m_pindah->tambah($data);

		$this->session->set_flashdata('sukses', 'Data dengan NO KK ' . $nik . ' berhasil ditambahkan.');
		redirect(base_url('pindah/tampil'));
	}

	public function edit($id)
	{
		$data['title'] = "Edit Pindah  - Desa Penarukan";
		$data['pindah'] = $this->m_pindah->edit($id);
		$data['penduduk'] = $this->m_pindah->get_penduduk_edit();

		$this->load->view('header', $data);
		$this->load->view('pindah/edit_pindah');
		$this->load->view('footer');
	}

	public function proses_edit()
	{
		$nik = $this->input->post('nik');
		$alasan_pindah = $this->input->post('alasan_pindah');
		$tanggal_pindah = $this->input->post('tanggal_pindah');
		$alamat_tujuan = $this->input->post('alamat_tujuan');
		$klasifikasi_pindah = $this->input->post('klasifikasi_pindah');

		$data = array(
			'nik' => $nik,
			'alasan_pindah' => ucwords($alasan_pindah),
			'tanggal_pindah' => $tanggal_pindah,
			'alamat_tujuan' => $alamat_tujuan,
			'klasifikasi_pindah' => $klasifikasi_pindah,
		);
		$where = array(
			'nik' => $nik,
		);
		$this->m_pindah->proses_edit($where, $data);

		$this->session->set_flashdata('sukses', 'Data dengan NO NIK ' . $nik . ' berhasil diedit.');
		redirect(base_url('pindah/tampil/' . $nik));
	}

	public function hapus($nik)
	{
		$this->m_pindah->hapus($nik);
		$this->session->set_flashdata('sukses', 'Data dengan NO KK ' . $nik . ' berhasil dihapus.');
		redirect(base_url('pindah/tampil'));
	}

	public function detail($nik)
	{

		$data['title'] = "Detail Pindah  - Desa Penarukan";
		$this->load->model('m_pindah');

		$detail = $this->m_pindah->detail($nik);
		$data['detail'] = $detail;
		$this->load->view('header', $data);
		$this->load->view('pindah/detail_pindah', $data);
		$this->load->view('footer');
	}
}