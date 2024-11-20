<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelahiran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login') == FALSE) {
			redirect(base_url("login"));
		}
		$this->load->model('m_kelahiran');
	}

	public function tampil()
	{
		$data['title'] = "Data Kelahiran - Desa Penarukan";
		$data['kelahiran'] = $this->m_kelahiran->tampil();

		$this->load->view('header', $data);
		$this->load->view('kelahiran/tampil_kelahiran');
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
		$data['title'] = "Tambah Kelahiran - Desa Penarukan";
		$data['penduduk'] = $this->m_kelahiran->get_penduduk();

		$this->load->view('header', $data);
		$this->load->view('kelahiran/tambah_kelahiran', $data);
		$this->load->view('footer');
	}

	public function proses_tambah()
	{

		$nama_anak = $this->input->post('nama_anak');
		$nik_ayah = $this->input->post('nik_ayah');
		$nik_ibu = $this->input->post('nik_ibu');
		$kelamin_anak = $this->input->post('kelamin_anak');
		$hari_lahir_anak = $this->input->post('hari_lahir_anak');
		$tanggal_lahir_anak = $this->input->post('tanggal_lahir_anak');
		$jam_lahir_anak = $this->input->post('jam_lahir_anak');
		$tempat_lahir_anak = $this->input->post('tempat_lahir_anak');

		$data = array(
			'nama_anak' => $nama_anak,
			'nik_ayah' => $nik_ayah,
			'nik_ibu' => $nik_ibu,
			'kelamin_anak' => $kelamin_anak,
			'hari_lahir_anak' => $hari_lahir_anak,
			'tanggal_lahir_anak' => $tanggal_lahir_anak,
			'jam_lahir_anak' => $jam_lahir_anak,
			'tempat_lahir_anak' => $tempat_lahir_anak,
		);
		$this->m_kelahiran->tambah($data);

		$this->session->set_flashdata('sukses', 'Data dengan Nama Anak ' . $nama_anak . ' berhasil ditambahkan.');
		redirect(base_url('kelahiran/tampil'));
	}

	public function edit($id)
	{
		$data['title'] = "Edit Kelahiran - Desa Penarukan";
		$data['kelahiran'] = $this->m_kelahiran->edit($id);
		$data['penduduk'] = $this->m_kelahiran->get_penduduk();

		$this->load->view('header', $data);
		$this->load->view('kelahiran/edit_kelahiran');
		$this->load->view('footer');
	}

	public function proses_edit()
	{
		$data = array(
			'nama_anak' => $this->input->post('nama_anak'),
			'nik_ayah' => $this->input->post('nik_ayah'),
			'nik_ibu' => $this->input->post('nik_ibu'),
			'kelamin_anak' => $this->input->post('kelamin_anak'),
			'hari_lahir_anak' => $this->input->post('hari_lahir_anak'),
			'tanggal_lahir_anak' => $this->input->post('tanggal_lahir_anak'),
			'jam_lahir_anak' => $this->input->post('jam_lahir_anak'),
			'tempat_lahir_anak' => $this->input->post('tempat_lahir_anak'),
		);

		$where = array(
			'id_kelahiran' => $this->input->post('id_kelahiran'),
		);
        
		$this->m_kelahiran->proses_edit($where, $data);

		$this->session->set_flashdata('sukses', 'Data berhasil diedit.');
		redirect(base_url('kelahiran/tampil/'));
	}

	public function hapus($id)
	{
		$this->m_kelahiran->hapus($id);
		$this->session->set_flashdata('sukses', 'Data dengan ID ' . $id . ' berhasil dihapus.');
		redirect(base_url('kelahiran/tampil'));
	}
}