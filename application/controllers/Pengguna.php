<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		$data['title'] = "Pengguna - Desa Penarukan";
		$data['pengguna'] = $this->m_user->tampil();

		$mutasi = $this->load->view('header', $data);
		$this->load->view('pengguna/tampil_pengguna');
		$this->load->view('footer');
	}

	public function tambah() {
		$data['title'] = "Tambah Pengguna - Desa Penarukan";

		$this->load->view('header', $data);
		$this->load->view('pengguna/tambah_pengguna');
		$this->load->view('footer');
	}

	public function proses_tambah() {
		$nama = $this->input->post('nama');
		$nip = $this->input->post('nip');
		$username = $this->input->post('username');
		$jabatan = $this->input->post('jabatan');
		$level = $this->input->post('level');
		$password = $this->input->post('password');
		$ulangi_password = $this->input->post('ulangi_password');

		if ($password != $ulangi_password) {
			$this->session->set_flashdata('error', 'Password dan Ulangi Password tidak sama.');
			redirect(base_url('pengguna/tambah'));
		}

		if (strlen($nip) != 18) {
			$this->session->set_flashdata('error', 'NIP harus 18 karakter.');
			redirect(base_url('pengguna/tambah'));
		}

		$cek_nip = $this->m_user->cek_nip($nip);
		if ($cek_nip) {
			$this->session->set_flashdata('error', 'NIP sudah terdaftar dalam basis data.');
			redirect(base_url('pengguna/tambah'));
		}

		$password = md5($password);

		$data = array(
			'nama_petugas' => ucwords($nama),
			'nip' => $nip,
			'username' => $username,
			'jabatan' => $jabatan,
			'level' => $level,
			'password' => $password,
		);
		$this->m_user->tambah($data);

		$this->session->set_flashdata('sukses', 'Data Dengan NIP ' . $nip . ' berhasil ditambahkan.');
		redirect(base_url('pengguna'));
	}

	public function edit()
	{
		$data['title'] = "Edit Pengguna - Desa Penarukan";
		$data['pengguna'] = $this->m_user->edit($this->uri->segment(3));

		$this->load->view('header', $data);
		$this->load->view('pengguna/edit_pengguna');
		$this->load->view('footer');
	}

	public function proses_edit()
	{
		$nama = $this->input->post('nama');
		$nip = $this->input->post('nip');
		$username = $this->input->post('username');
		$jabatan = $this->input->post('jabatan');
		$level = $this->input->post('level');
		$password = $this->input->post('password');
		$ulangi_password = $this->input->post('ulangi_password');

		if (strlen($nip) != 18) {
			$this->session->set_flashdata('error', 'NIP harus 18 karakter.');
			// redirect(base_url('pengguna/edit/' . $this->input->post('id')));
		}

		$cek_nip = $this->m_user->cek_nip_edit($nip, $this->input->post('id'));
		if ($cek_nip) {
			$this->session->set_flashdata('error', 'NIP sudah terdaftar dalam basis data.');
			// redirect(base_url('pengguna/edit/' . $this->input->post('id')));
		}

		$data = array(
			'nama_petugas' => $nama,
			'nip' => $nip,
			'username' => $username,
			'jabatan' => $jabatan,
			'level' => $level,
		);
		$where = array(
			'id' => $this->input->post('id'),
		);

		if (!empty($password) || !empty($ulangi_password)) {
			if ($password != $ulangi_password) {
				$this->session->set_flashdata('error', 'Password dan Ulangi Password tidak sama.');
				redirect(base_url('pengguna/edit/' . $this->input->post('id')));
			}
			$password = md5($password);
			$data['password'] = $password;
		} else {
			$existing_user = $this->m_user->edit($this->input->post('id'));
			$data['password'] = $existing_user->password;
		}
		var_dump($data);
		$this->m_user->proses_edit($where, $data);
		$this->session->set_flashdata('sukses', 'Data Dengan ID ' . $this->input->post('id') . ' berhasil diedit.');
		redirect(base_url('pengguna'));
	}

	public function hapus() {
		$this->m_user->hapus($this->uri->segment(3));
		$this->session->set_flashdata('sukses', 'Data Dengan ID ' . $this->uri->segment(3) . ' berhasil dihapus.');
		redirect(base_url('pengguna'));
	}
}
