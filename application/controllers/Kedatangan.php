<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kedatangan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login') == FALSE) {
			redirect(base_url("login"));
		}
		$this->load->model('m_kedatangan');
	}
	public function tampil()
	{
		$data['title'] = "Data Kedatangan  - Desa Penarukan";
		$data['kedatangan'] = $this->m_kedatangan->tampil();

		$mutasi = $this->load->view('header', $data);
		$this->load->view('kedatangan/tampil_kedatangan');
		$this->load->view('footer');
	}

	public function tambah()
	{
		$data['title'] = "Tambah Kedatangan  - Desa Penarukan";
		$data['penduduk'] = $this->m_kedatangan->get_penduduk();

		$this->load->view('header', $data);
		$this->load->view('kedatangan/tambah_kedatangan');
		$this->load->view('footer');
	}

	public function proses_tambah()
	{
		$nik = $this->input->post('nik');
		$alasan_datang = $this->input->post('alasan_datang');
		$tanggal_datang = $this->input->post('tanggal_datang');
		$alamat_tujuan = $this->input->post('alamat_tujuan');
		$klasifikasi_datang = $this->input->post('klasifikasi_datang');

		$data = array(
			'nik' => $nik,
			'alasan_datang' => ucwords($alasan_datang),
			'tanggal_datang' => $tanggal_datang,
			'alamat_tujuan' => $alamat_tujuan,
			'klasifikasi_datang' => $klasifikasi_datang,
		);
		$this->m_kedatangan->tambah($data);

		$this->session->set_flashdata('sukses', 'Data dengan NO NIK ' . $nik . ' berhasil ditambahkan.');
		redirect(base_url('kedatangan/tampil'));
	}

	public function edit($id)
	{
		$data['title'] = "Edit Pindah  - Desa Penarukan";
		$data['kedatangan'] = $this->m_kedatangan->edit($id);
		$data['penduduk'] = $this->m_kedatangan->get_penduduk_edit();

		$this->load->view('header', $data);
		$this->load->view('kedatangan/edit_kedatangan');
		$this->load->view('footer');
	}

	public function proses_edit()
	{
		$nik = $this->input->post('nik');
		$alasan_datang = $this->input->post('alasan_datang');
		$tanggal_datang = $this->input->post('tanggal_datang');
		$alamat_tujuan = $this->input->post('alamat_tujuan');
		$klasifikasi_datang = $this->input->post('klasifikasi_datang');

		$data = array(
			'nik' => $nik,
			'alasan_datang' => ucwords($alasan_datang),
			'tanggal_datang' => $tanggal_datang,
			'alamat_tujuan' => $alamat_tujuan,
			'klasifikasi_datang' => $klasifikasi_datang,
		);
		$where = array(
			'nik' => $nik,
		);
		$this->m_kedatangan->proses_edit($where, $data);

		$this->session->set_flashdata('sukses', 'Data dengan NO NIK ' . $nik . ' berhasil diedit.');
		redirect(base_url('kedatangan/tampil/' . $nik));
	}

	public function hapus($id)
	{
		$this->m_kedatangan->hapus($id);
		$this->session->set_flashdata('sukses', 'Data dengan ID ' . $id . ' berhasil dihapus.');
		redirect(base_url('kedatangan/tampil'));
	}
}