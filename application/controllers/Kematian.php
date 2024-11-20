<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kematian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login') == FALSE) {
			redirect(base_url("login"));
		}
		$this->load->model('m_kematian');
	}

	public function tampil()
	{
		$data['title'] = "Data Kematian - Desa Penarukan";
		$data['kematian'] = $this->m_kematian->tampil();

		$this->load->view('header', $data);
		$this->load->view('kematian/tampil_kematian');
		$this->load->view('footer');
	}
	public function tampil_kematian()
	{
		$data['title'] = "Data Kematian - Desa Penarukan";
		$data['kematian'] = $this->m_kematian->tampil();

		$this->load->view('header', $data);
		$this->load->view('kematian/tampil_kematian2');
		$this->load->view('footer');
	}
	public function tambah()
	{
		$data['title'] = "Tambah Kematian - Desa Penarukan";
		$data['penduduk'] = $this->m_kematian->get_penduduk();

		$this->load->view('header', $data);
		$this->load->view('kematian/tambah_kematian', $data);
		$this->load->view('footer');
	}

	public function proses_tambah()
	{

		$nik = $this->input->post('nik');
		$hari_wafat = $this->input->post('hari_wafat');
		$tanggal_wafat = $this->input->post('tanggal_wafat');
		$pukul = $this->input->post('pukul');
		$sebab_wafat = $this->input->post('sebab_wafat');
		$tempat = $this->input->post('tempat');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'nik' => $nik,
			'hari_wafat' => $hari_wafat,
			'tanggal_wafat' => $tanggal_wafat,
			'pukul' => $pukul,
			'sebab_wafat' => $sebab_wafat,
			'tempat' => $tempat,
			'keterangan' => $keterangan,
		);
		$this->m_kematian->tambah($data);

		$this->session->set_flashdata('sukses', 'Data dengan NIK ' . $nik . ' berhasil ditambahkan.');
		redirect(base_url('kematian/tampil'));
	}

	public function edit($id)
	{
		$data['title'] = "Edit kematian - Desa Penarukan";
		$data['kematian'] = $this->m_kematian->edit($id);
		$data['penduduk'] = $this->m_kematian->get_penduduk_edit();

		$this->load->view('header', $data);
		$this->load->view('kematian/edit_kematian');
		$this->load->view('footer');
	}

	public function proses_edit()
	{
		$data = array(

			'nik' => $this->input->post('nik'),
			'hari_wafat' => $this->input->post('hari_wafat'),
			'tanggal_wafat' => $this->input->post('tanggal_wafat'),
			'pukul' => $this->input->post('pukul'),
			'sebab_wafat' => $this->input->post('sebab_wafat'),
			'tempat' => $this->input->post('tempat'),
			'keterangan' => $this->input->post('keterangan'),
		);
		$where = array(
			'id' => $this->input->post('id'),
		);
		$this->m_kematian->proses_edit($where, $data);

		$this->session->set_flashdata('sukses', 'Data berhasil diedit.');
		redirect(base_url('kematian/tampil/'));
	}

	public function hapus($id)
	{
		$this->m_kematian->hapus($id);
		$this->session->set_flashdata('sukses', 'Data dengan ID ' . $id . ' berhasil dihapus.');
		redirect(base_url('kematian/tampil'));
	}
}