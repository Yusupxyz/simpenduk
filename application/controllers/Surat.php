<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login') == FALSE) {
			redirect(base_url("login"));
		}
		$this->load->model('m_domisili');
		$this->load->model('m_cerai_mati');
		$this->load->model('m_belum_menikah');
		$this->load->model('m_menikah');
		$this->load->model('m_surat_pindah');
		$this->load->model('m_skck');
		$this->load->model('m_sktm_pendidikan');
		$this->load->model('m_sktm_kesehatan');
		$this->load->model('m_surat_kelahiran');
		$this->load->model('m_surat_kematian');
		$this->load->model('m_penghasilan');
		$this->load->model('m_pemakaman');
		$this->load->model('m_penduduk');
	}
	public function pindah()
	{
		if ($this->uri->segment('3') == "tambah") {
			if ($this->input->post('tambah_pindah')) {
				$data = array(
					'nik_kepala_keluarga' => $this->input->post('nik_kepala'),
					'nik_pemohon' => $this->input->post('nik_pemohon'),
					'alasan_pindah' => $this->input->post('alasan'),
					'alamat_pindah' => $this->input->post('alamat'),
					'rt_pindah' => $this->input->post('rt'),
					'rw_pindah' => $this->input->post('rw'),
					'dusun_pindah' => $this->input->post('dusun'),
					'desa_pindah' => $this->input->post('desa'),
					'kecamatan_pindah' => $this->input->post('kecamatan'),
					'kabupaten_pindah' => $this->input->post('kabupaten'),
					'provinsi_pindah' => $this->input->post('provinsi'),
					'kode_pos_pindah' => $this->input->post('kode_pos'),
					'telepon_pindah' => $this->input->post('telepon'),
					'id_pejabat' => $this->input->post('pejabat'),
					'tanggal_pindah' => date('Y-m-d'),
				);
				$this->m_surat_pindah->tambah_pindah($data);
				$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
				redirect(base_url('surat/pindah/'));
			} else {
				$data['title'] = "Surat Pindah - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pendudukk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_surat_pindah->pejabat();
				$this->load->view('header', $data);
				$this->load->view('surat/tambah_pindah', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "edit") {
			if ($this->input->post('edit_pindah')) {
				$data = array(
					'nik_kepala_keluarga' => $this->input->post('nik_kepala'),
					'nik_pemohon' => $this->input->post('nik_pemohon'),
					'alasan_pindah' => $this->input->post('alasan'),
					'alamat_pindah' => $this->input->post('alamat'),
					'rt_pindah' => $this->input->post('rt'),
					'rw_pindah' => $this->input->post('rw'),
					'dusun_pindah' => $this->input->post('dusun'),
					'desa_pindah' => $this->input->post('desa'),
					'kecamatan_pindah' => $this->input->post('kecamatan'),
					'kabupaten_pindah' => $this->input->post('kabupaten'),
					'provinsi_pindah' => $this->input->post('provinsi'),
					'kode_pos_pindah' => $this->input->post('kode_pos'),
					'telepon_pindah' => $this->input->post('telepon'),
					'id_pejabat' => $this->input->post('pejabat'),
					'tanggal_pindah' => date('Y-m-d'),
				);
				$where = array(
					'id_pindah' => $this->input->post('id'),
				);
				$this->m_surat_pindah->proses_edit_pindah($where, $data);
				$this->session->set_flashdata('sukses', 'Data berhasil diedit.');
				redirect(base_url('surat/pindah/'));
			} else {
				$data['title'] = "Surat Pindah - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pendudukk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_surat_pindah->pejabat();
				$data['pindah'] = $this->m_surat_pindah->edit_pindah($this->uri->segment('4'));
				$this->load->view('header', $data);
				$this->load->view('surat/edit_pindah', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "cetak") {
			$data['pindah'] = $this->m_surat_pindah->cetak_pindah($this->uri->segment('4'));
			$this->load->view('surat/cetak_pindah', $data);
		} elseif ($this->uri->segment('3') == "hapus") {
			$this->m_surat_pindah->hapus_pindah($this->uri->segment('4'));
			$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
			redirect(base_url('surat/pindah'));
		} else {
			$data['title'] = "Surat Pindah - Desa Penarukan";
			$data['surat'] = $this->m_surat_pindah->daftar_pindah();
			$mutasi = $this->load->view('header', $data);
			$this->load->view('surat/daftar_pindah');
			$this->load->view('footer');
		}
	}
	public function domisili()
	{
		if ($this->uri->segment('3') == "tambah") {
			if ($this->input->post('tambah_domisili')) {
				$data = array(
					'nik' => $this->input->post('nik'),
					'no_surat_rt' => $this->input->post('pengantar'),
					'id_pejabat' => $this->input->post('pejabat'),
					'tanggal_domisili' => date('Y-m-d'),
				);
				$this->m_domisili->tambah_domisili($data);
				$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
				redirect(base_url('surat/domisili/'));
			} else {
				$data['title'] = "Surat Keterangan Domisili - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_domisili->pejabat();
				$this->load->view('header', $data);
				$this->load->view('surat/tambah_domisili', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "edit") {
			if ($this->input->post('edit_domisili')) {
				$data = array(
					'nik' => $this->input->post('nik'),
					'id_pejabat' => $this->input->post('pejabat'),
					'no_surat_rt' => $this->input->post('pengantar'),
				);
				$where = array(
					'id_domisili' => $this->input->post('id'),
				);
				$this->m_domisili->proses_edit_domisili($where, $data);
				$this->session->set_flashdata('sukses', 'Data berhasil diedit.');
				redirect(base_url('surat/domisili/'));
			} else {
				$data['title'] = "Surat Keterangan Domisili - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_domisili->pejabat();
				$data['domisili'] = $this->m_domisili->edit_domisili($this->uri->segment('4'));
				$this->load->view('header', $data);
				$this->load->view('surat/edit_domisili', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "cetak") {
			$data['domisili'] = $this->m_domisili->cetak_domisili($this->uri->segment('4'));
			$this->load->view('surat/cetak_domisili', $data);
		} elseif ($this->uri->segment('3') == "hapus") {
			$this->m_domisili->hapus_domisili($this->uri->segment('4'));
			$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
			redirect(base_url('surat/domisili'));
		} else {
			$data['title'] = "Surat Keterangan Domisili - Desa Penarukan";
			$data['surat'] = $this->m_domisili->daftar_domisili();
			$mutasi = $this->load->view('header', $data);
			$this->load->view('surat/daftar_domisili');
			$this->load->view('footer');
		}
	}

	public function belum_menikah()
	{
		if ($this->uri->segment('3') == "tambah") {
			if ($this->input->post('tambah_belum_menikah')) {
				$data = array(
					'nik' => $this->input->post('nik'),
					'id_pejabat' => $this->input->post('pejabat'),
					'tanggal_belum_menikah' => date('Y-m-d'),
				);
				$this->m_belum_menikah->tambah_belum_menikah($data);
				$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
				redirect(base_url('surat/belum_menikah/'));
			} else {
				$data['title'] = "Surat Keterangan Belum Menikah - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_belum_menikah->pejabat();
				$this->load->view('header', $data);
				$this->load->view('surat/tambah_belum_menikah', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "edit") {
			if ($this->input->post('edit_belum_menikah')) {
				$data = array(
					'nik' => $this->input->post('nik'),
					'id_pejabat' => $this->input->post('pejabat'),
				);
				$where = array(
					'id_belum_menikah' => $this->input->post('id'),
				);
				$this->m_belum_menikah->proses_edit_belum_menikah($where, $data);
				$this->session->set_flashdata('sukses', 'Data berhasil diedit.');
				redirect(base_url('surat/belum_menikah/'));
			} else {
				$data['title'] = "Surat Keterangan Belum Menikah - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_belum_menikah->pejabat();
				$data['belum_menikah'] = $this->m_belum_menikah->edit_belum_menikah($this->uri->segment('4'));
				$this->load->view('header', $data);
				$this->load->view('surat/edit_belum_menikah', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "cetak") {
			$data['belum_menikah'] = $this->m_belum_menikah->cetak_belum_menikah($this->uri->segment('4'));
			$this->load->view('surat/cetak_belum_menikah', $data);
		} elseif ($this->uri->segment('3') == "hapus") {
			$this->m_belum_menikah->hapus_belum_menikah($this->uri->segment('4'));
			$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
			redirect(base_url('surat/belum_menikah'));
		} else {
			$data['title'] = "Surat Keterangan Belum Menikah - Desa Penarukan";
			$data['surat'] = $this->m_belum_menikah->daftar_belum_menikah();
			$mutasi = $this->load->view('header', $data);
			$this->load->view('surat/daftar_belum_menikah');
			$this->load->view('footer');
		}
	}

	public function menikah()
	{
		if ($this->uri->segment('3') == "tambah") {
			if ($this->input->post('tambah_menikah')) {
				$data = array(
					'nik' => $this->input->post('nik'),
					'id_pejabat' => $this->input->post('pejabat'),
					'tanggal_menikah' => date('Y-m-d'),
				);
				$this->m_menikah->tambah_menikah($data);
				$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
				redirect(base_url('surat/menikah/'));
			} else {
				$data['title'] = "Surat Keterangan Menikah - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_menikah->pejabat();
				$this->load->view('header', $data);
				$this->load->view('surat/tambah_menikah', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "edit") {
			if ($this->input->post('edit_menikah')) {
				$data = array(
					'nik' => $this->input->post('nik'),
					'id_pejabat' => $this->input->post('pejabat'),
				);
				$where = array(
					'id_menikah' => $this->input->post('id'),
				);
				$this->m_menikah->proses_edit_menikah($where, $data);
				$this->session->set_flashdata('sukses', 'Data berhasil diedit.');
				redirect(base_url('surat/menikah/'));
			} else {
				$data['title'] = "Surat Keterangan Menikah - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_menikah->pejabat();
				$data['menikah'] = $this->m_menikah->edit_menikah($this->uri->segment('4'));
				$this->load->view('header', $data);
				$this->load->view('surat/edit_menikah', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "cetak") {
			$data['menikah'] = $this->m_menikah->cetak_menikah($this->uri->segment('4'));
			$this->load->view('surat/cetak_menikah', $data);
		} elseif ($this->uri->segment('3') == "hapus") {
			$this->m_menikah->hapus_menikah($this->uri->segment('4'));
			$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
			redirect(base_url('surat/menikah'));
		} else {
			$data['title'] = "Surat Keterangan Menikah - Desa Penarukan";
			$data['surat'] = $this->m_menikah->daftar_menikah();
			$mutasi = $this->load->view('header', $data);
			$this->load->view('surat/daftar_menikah');
			$this->load->view('footer');
		}
	}

	public function cerai_mati()
	{
		if ($this->uri->segment('3') == "tambah") {
			if ($this->input->post('tambah_cerai_mati')) {
				$data = array(
					'nik' => $this->input->post('nik'),
					'id_pejabat' => $this->input->post('pejabat'),
					'tanggal_cerai_mati' => date('Y-m-d'),
				);
				$this->m_cerai_mati->tambah_cerai_mati($data);
				$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
				redirect(base_url('surat/cerai_mati/'));
			} else {
				$data['title'] = "Surat Keterangan Cerai Mati - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_cerai_mati->pejabat();
				$this->load->view('header', $data);
				$this->load->view('surat/tambah_cerai_mati', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "edit") {
			if ($this->input->post('edit_cerai_mati')) {
				$data = array(
					'nik' => $this->input->post('nik'),
					'id_pejabat' => $this->input->post('pejabat'),
				);
				$where = array(
					'id_cerai_mati' => $this->input->post('id'),
				);
				$this->m_cerai_mati->proses_edit_cerai_mati($where, $data);
				$this->session->set_flashdata('sukses', 'Data berhasil diedit.');
				redirect(base_url('surat/cerai_mati/'));
			} else {
				$data['title'] = "Surat Keterangan Cerai Mati - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_cerai_mati->pejabat();
				$data['cerai_mati'] = $this->m_cerai_mati->edit_cerai_mati($this->uri->segment('4'));
				$this->load->view('header', $data);
				$this->load->view('surat/edit_cerai_mati', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "cetak") {
			$data['cerai_mati'] = $this->m_cerai_mati->cetak_cerai_mati($this->uri->segment('4'));
			$this->load->view('surat/cetak_cerai_mati', $data);
		} elseif ($this->uri->segment('3') == "hapus") {
			$this->m_cerai_mati->hapus_cerai_mati($this->uri->segment('4'));
			$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
			redirect(base_url('surat/cerai_mati'));
		} else {
			$data['title'] = "Surat Keterangan Cerai Mati - Desa Penarukan";
			$data['surat'] = $this->m_cerai_mati->daftar_cerai_mati();
			$mutasi = $this->load->view('header', $data);
			$this->load->view('surat/daftar_cerai_mati');
			$this->load->view('footer');
		}
	}

	public function skck()
	{
		if ($this->uri->segment('3') == "tambah") {
			if ($this->input->post('tambah_skck')) {
				$data = array(
					'nik' => $this->input->post('nik'),
					'id_pejabat' => $this->input->post('pejabat'),
					'tanggal_skck' => date('Y-m-d'),
				);
				$this->m_skck->tambah_skck($data);
				$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
				redirect(base_url('surat/skck/'));
			} else {
				$data['title'] = "Surat Keterangan SKCK - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_skck->pejabat();
				$this->load->view('header', $data);
				$this->load->view('surat/tambah_skck', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "edit") {
			if ($this->input->post('edit_skck')) {
				$data = array(
					'nik' => $this->input->post('nik'),
					'id_pejabat' => $this->input->post('pejabat'),
				);
				$where = array(
					'id_skck' => $this->input->post('id'),
				);
				$this->m_skck->proses_edit_skck($where, $data);
				$this->session->set_flashdata('sukses', 'Data berhasil diedit.');
				redirect(base_url('surat/skck/'));
			} else {
				$data['title'] = "Surat Keterangan SKCK - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_skck->pejabat();
				$data['skck'] = $this->m_skck->edit_skck($this->uri->segment('4'));
				$this->load->view('header', $data);
				$this->load->view('surat/edit_skck', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "cetak") {
			$data['skck'] = $this->m_skck->cetak_skck($this->uri->segment('4'));
			$this->load->view('surat/cetak_skck', $data);
		} elseif ($this->uri->segment('3') == "hapus") {
			$this->m_skck->hapus_skck($this->uri->segment('4'));
			$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
			redirect(base_url('surat/skck'));
		} else {
			$data['title'] = "Surat Keterangan SKCK - Desa Penarukan";
			$data['surat'] = $this->m_skck->daftar_skck();
			$mutasi = $this->load->view('header', $data);
			$this->load->view('surat/daftar_skck');
			$this->load->view('footer');
		}
	}

	public function penghasilan()
	{
		if ($this->uri->segment('3') == "tambah") {
			if ($this->input->post('tambah_penghasilan')) {
				$data = array(
					'nik' => $this->input->post('nik'),
					'id_pejabat' => $this->input->post('pejabat'),
					'jumlah_penghasilan' => $this->input->post('jumlah'),
					'keperluan_penghasilan' => $this->input->post('keperluan'),
					'tanggal_penghasilan' => date('Y-m-d'),
				);
				$this->m_penghasilan->tambah_penghasilan($data);
				$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
				redirect(base_url('surat/penghasilan/'));
			} else {
				$data['title'] = "Surat Keterangan Penghasilan - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_penghasilan->pejabat();
				$this->load->view('header', $data);
				$this->load->view('surat/tambah_penghasilan', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "edit") {
			if ($this->input->post('edit_penghasilan')) {
				$data = array(
					'nik' => $this->input->post('nik'),
					'id_pejabat' => $this->input->post('pejabat'),
					'jumlah_penghasilan' => $this->input->post('jumlah'),
					'keperluan_penghasilan' => $this->input->post('keperluan'),
				);
				$where = array(
					'id_penghasilan' => $this->input->post('id'),
				);
				$this->m_penghasilan->proses_edit_penghasilan($where, $data);
				$this->session->set_flashdata('sukses', 'Data berhasil diedit.');
				redirect(base_url('surat/penghasilan/'));
			} else {
				$data['title'] = "Surat Keterangan Penghasilan - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_penghasilan->pejabat();
				$data['penghasilan'] = $this->m_penghasilan->edit_penghasilan($this->uri->segment('4'));
				$this->load->view('header', $data);
				$this->load->view('surat/edit_penghasilan', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "cetak") {
			$data['penghasilan'] = $this->m_penghasilan->cetak_penghasilan($this->uri->segment('4'));
			$this->load->view('surat/cetak_penghasilan', $data);
		} elseif ($this->uri->segment('3') == "hapus") {
			$this->m_penghasilan->hapus_penghasilan($this->uri->segment('4'));
			$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
			redirect(base_url('surat/penghasilan'));
		} else {
			$data['title'] = "Surat Keterangan Penghasilan - Desa Penarukan";
			$data['surat'] = $this->m_penghasilan->daftar_penghasilan();
			$mutasi = $this->load->view('header', $data);
			$this->load->view('surat/daftar_penghasilan');
			$this->load->view('footer');
		}
	}

	public function surat_kelahiran()
	{
		if ($this->uri->segment('3') == "tambah") {
			if ($this->input->post('tambah_surat_kelahiran')) {
				$data = array(
					'nik_ayah' => $this->input->post('ayah'),
					'nik_ibu' => $this->input->post('ibu'),
					'nik_pelapor' => $this->input->post('pelapor'),
					'nama_anak' => $this->input->post('nama'),
					'kelamin_anak' => $this->input->post('kelamin'),
					'tempat_lahir_anak' => $this->input->post('tempat'),
					'tanggal_lahir_anak' => $this->input->post('tanggal'),
					'jam_lahir_anak' => $this->input->post('jam'),
					'hari_lahir_anak' => $this->input->post('hari'),
					'id_pejabat' => $this->input->post('pejabat'),
					'hubungan_sebagai' => $this->input->post('hubungan'),
					'tanggal_surat_kelahiran' => date('Y-m-d'),
				);
				$this->m_surat_kelahiran->tambah_surat_kelahiran($data);
				$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
				redirect(base_url('surat/surat_kelahiran/'));
			} else {
				$data['title'] = "Surat Kelahiran - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pendudukk'] = $this->m_penduduk->tampil();
				$data['pendudukkk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_surat_kelahiran->pejabat();
				$this->load->view('header', $data);
				$this->load->view('surat/tambah_surat_kelahiran', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "edit") {
			if ($this->input->post('edit_surat_kelahiran')) {
				$data = array(
					'nik_ayah' => $this->input->post('ayah'),
					'nik_ibu' => $this->input->post('ibu'),
					'nik_pelapor' => $this->input->post('pelapor'),
					'nama_anak' => $this->input->post('nama'),
					'kelamin_anak' => $this->input->post('kelamin'),
					'tempat_lahir_anak' => $this->input->post('tempat'),
					'tanggal_lahir_anak' => $this->input->post('tanggal'),
					'jam_lahir_anak' => $this->input->post('jam'),
					'hari_lahir_anak' => $this->input->post('hari'),
					'id_pejabat' => $this->input->post('pejabat'),
					'hubungan_sebagai' => $this->input->post('hubungan'),
				);
				$where = array(
					'id_surat_kelahiran' => $this->input->post('id'),
				);
				$this->m_surat_kelahiran->proses_edit_surat_kelahiran($where, $data);
				$this->session->set_flashdata('sukses', 'Data berhasil diedit.');
				redirect(base_url('surat/surat_kelahiran/'));
			} else {
				$data['title'] = "Surat Kelahiran - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pendudukk'] = $this->m_penduduk->tampil();
				$data['pendudukkk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_surat_kelahiran->pejabat();
				$data['surat_kelahiran'] = $this->m_surat_kelahiran->edit_surat_kelahiran($this->uri->segment('4'));
				$this->load->view('header', $data);
				$this->load->view('surat/edit_surat_kelahiran', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "cetak") {
			$data['surat_kelahiran'] = $this->m_surat_kelahiran->cetak_surat_kelahiran($this->uri->segment('4'));
			$this->load->view('surat/cetak_surat_kelahiran', $data);
		} elseif ($this->uri->segment('3') == "hapus") {
			$this->m_surat_kelahiran->hapus_surat_kelahiran($this->uri->segment('4'));
			$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
			redirect(base_url('surat/surat_kelahiran'));
		} else {
			$data['title'] = "Surat Kelahiran - Desa Penarukan";
			$data['surat'] = $this->m_surat_kelahiran->daftar_surat_kelahiran();
			$mutasi = $this->load->view('header', $data);
			$this->load->view('surat/daftar_surat_kelahiran');
			$this->load->view('footer');
		}
	}

	public function surat_kematian()
	{
		if ($this->uri->segment('3') == "tambah") {
			if ($this->input->post('tambah_surat_kematian')) {
				$data = array(
					'nik' => $this->input->post('nik'),
					'nik_pelapor' => $this->input->post('pelapor'),
					'umur_pelapor' => $this->input->post('umur'),
					'tempat_kematian' => $this->input->post('tempat'),
					'tanggal_kematian' => $this->input->post('tanggal'),
					'jam_kematian' => $this->input->post('jam'),
					'hari_kematian' => $this->input->post('hari'),
					'id_pejabat' => $this->input->post('pejabat'),
					'hubungan_sebagai' => $this->input->post('hubungan'),
					'tanggal_surat_kematian' => date('Y-m-d'),
				);
				$this->m_surat_kematian->tambah_surat_kematian($data);
				$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
				redirect(base_url('surat/surat_kematian/'));
			} else {
				$data['title'] = "Surat Kematian - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pendudukkk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_surat_kematian->pejabat();
				$this->load->view('header', $data);
				$this->load->view('surat/tambah_surat_kematian', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "edit") {
			if ($this->input->post('edit_surat_kematian')) {
				$data = array(
					'nik' => $this->input->post('nik'),
					'nik_pelapor' => $this->input->post('pelapor'),
					'umur_pelapor' => $this->input->post('umur'),
					'tempat_kematian' => $this->input->post('tempat'),
					'tanggal_kematian' => $this->input->post('tanggal'),
					'jam_kematian' => $this->input->post('jam'),
					'hari_kematian' => $this->input->post('hari'),
					'id_pejabat' => $this->input->post('pejabat'),
					'hubungan_sebagai' => $this->input->post('hubungan'),
				);
				$where = array(
					'id_surat_kematian' => $this->input->post('id'),
				);
				$this->m_surat_kematian->proses_edit_surat_kematian($where, $data);
				$this->session->set_flashdata('sukses', 'Data berhasil diedit.');
				redirect(base_url('surat/surat_kematian/'));
			} else {
				$data['title'] = "Surat Kematian - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pendudukkk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_surat_kematian->pejabat();
				$data['surat_kematian'] = $this->m_surat_kematian->edit_surat_kematian($this->uri->segment('4'));
				$this->load->view('header', $data);
				$this->load->view('surat/edit_surat_kematian', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "cetak") {
			$data['surat_kematian'] = $this->m_surat_kematian->cetak_surat_kematian($this->uri->segment('4'));
			$this->load->view('surat/cetak_surat_kematian', $data);
		} elseif ($this->uri->segment('3') == "hapus") {
			$this->m_surat_kematian->hapus_surat_kematian($this->uri->segment('4'));
			$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
			redirect(base_url('surat/surat_kematian'));
		} else {
			$data['title'] = "Surat Kematian - Desa Penarukan";
			$data['surat'] = $this->m_surat_kematian->daftar_surat_kematian();
			$mutasi = $this->load->view('header', $data);
			$this->load->view('surat/daftar_surat_kematian');
			$this->load->view('footer');
		}
	}

	public function sktm_pendidikan()
	{
		if ($this->uri->segment('3') == "tambah") {
			if ($this->input->post('tambah_sktm_pendidikan')) {
				$data = array(
					'nik_ayah' => $this->input->post('ayah'),
					'nik_anak' => $this->input->post('anak'),
					'id_pejabat' => $this->input->post('pejabat'),
					'tanggal_sktm_pendidikan' => date('Y-m-d'),
				);
				$this->m_sktm_pendidikan->tambah_sktm_pendidikan($data);
				$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
				redirect(base_url('surat/sktm_pendidikan/'));
			} else {
				$data['title'] = "Surat Keterangan Tidak Mampu - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pendudukk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_sktm_pendidikan->pejabat();
				$this->load->view('header', $data);
				$this->load->view('surat/tambah_sktm_pendidikan', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "edit") {
			if ($this->input->post('edit_sktm_pendidikan')) {
				$data = array(
					'nik_ayah' => $this->input->post('ayah'),
					'nik_anak' => $this->input->post('anak'),
					'id_pejabat' => $this->input->post('pejabat'),
				);
				$where = array(
					'id_sktm_pendidikan' => $this->input->post('id'),
				);
				$this->m_sktm_pendidikan->proses_edit_sktm_pendidikan($where, $data);
				$this->session->set_flashdata('sukses', 'Data berhasil diedit.');
				redirect(base_url('surat/sktm_pendidikan/'));
			} else {
				$data['title'] = "Surat Keterangan Tidak Mampu - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pendudukk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_sktm_pendidikan->pejabat();
				$data['sktm_pendidikan'] = $this->m_sktm_pendidikan->edit_sktm_pendidikan($this->uri->segment('4'));
				$this->load->view('header', $data);
				$this->load->view('surat/edit_sktm_pendidikan', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "cetak") {
			$data['sktm_pendidikan'] = $this->m_sktm_pendidikan->cetak_sktm_pendidikan($this->uri->segment('4'));
			$this->load->view('surat/cetak_sktm_pendidikan', $data);
		} elseif ($this->uri->segment('3') == "hapus") {
			$this->m_sktm_pendidikan->hapus_sktm_pendidikan($this->uri->segment('4'));
			$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
			redirect(base_url('surat/sktm_pendidikan'));
		} else {
			$data['title'] = "Surat Keterangan Tidak Mampu - Desa Penarukan";
			$data['surat'] = $this->m_sktm_pendidikan->daftar_sktm_pendidikan();
			$mutasi = $this->load->view('header', $data);
			$this->load->view('surat/daftar_sktm_pendidikan');
			$this->load->view('footer');
		}
	}

	public function sktm_kesehatan()
	{
		if ($this->uri->segment('3') == "tambah") {
			if ($this->input->post('tambah_sktm_kesehatan')) {
				$data = array(
					'nik_ayah' => $this->input->post('ayah'),
					'nik_anak' => $this->input->post('anak'),
					'id_pejabat' => $this->input->post('pejabat'),
					'tanggal_sktm_kesehatan' => date('Y-m-d'),
				);
				$this->m_sktm_kesehatan->tambah_sktm_kesehatan($data);
				$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
				redirect(base_url('surat/sktm_kesehatan/'));
			} else {
				$data['title'] = "Surat Keterangan Kesehatan - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pendudukk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_sktm_kesehatan->pejabat();
				$this->load->view('header', $data);
				$this->load->view('surat/tambah_sktm_kesehatan', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "edit") {
			if ($this->input->post('edit_sktm_kesehatan')) {
				$data = array(
					'nik_ayah' => $this->input->post('ayah'),
					'nik_anak' => $this->input->post('anak'),
					'id_pejabat' => $this->input->post('pejabat'),
				);
				$where = array(
					'id_sktm_kesehatan' => $this->input->post('id'),
				);
				$this->m_sktm_kesehatan->proses_edit_sktm_kesehatan($where, $data);
				$this->session->set_flashdata('sukses', 'Data berhasil diedit.');
				redirect(base_url('surat/sktm_kesehatan/'));
			} else {
				$data['title'] = "Surat Keterangan Kesehatan - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pendudukk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_sktm_kesehatan->pejabat();
				$data['sktm_kesehatan'] = $this->m_sktm_kesehatan->edit_sktm_kesehatan($this->uri->segment('4'));
				$this->load->view('header', $data);
				$this->load->view('surat/edit_sktm_kesehatan', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "cetak") {
			$data['sktm_kesehatan'] = $this->m_sktm_kesehatan->cetak_sktm_kesehatan($this->uri->segment('4'));
			$this->load->view('surat/cetak_sktm_kesehatan', $data);
		} elseif ($this->uri->segment('3') == "hapus") {
			$this->m_sktm_kesehatan->hapus_sktm_kesehatan($this->uri->segment('4'));
			$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
			redirect(base_url('surat/sktm_kesehatan'));
		} else {
			$data['title'] = "Surat Keterangan Kesehatan - Desa Penarukan";
			$data['surat'] = $this->m_sktm_kesehatan->daftar_sktm_kesehatan();
			$mutasi = $this->load->view('header', $data);
			$this->load->view('surat/daftar_sktm_kesehatan');
			$this->load->view('footer');
		}
	}

	public function pemakaman()
	{
		if ($this->uri->segment('3') == "tambah") {
			if ($this->input->post('tambah_pemakaman')) {
				$data = array(
					'nik' => $this->input->post('nik'),
					'id_pejabat' => $this->input->post('pejabat'),
					'tempat_pemakaman' => $this->input->post('tempat'),
					'hari_pemakaman' => $this->input->post('hari'),
					'tanggal_dimakamkan' => $this->input->post('tanggal'),
					'jam_dimakamkan' => $this->input->post('jam'),
					'tanggal_pemakaman' => date('Y-m-d'),
				);
				$this->m_pemakaman->tambah_pemakaman($data);
				$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
				redirect(base_url('surat/pemakaman/'));
			} else {
				$data['title'] = "Surat Keterangan Pemakaman - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_pemakaman->pejabat();
				$this->load->view('header', $data);
				$this->load->view('surat/tambah_pemakaman', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "edit") {
			if ($this->input->post('edit_pemakaman')) {
				$data = array(
					'nik' => $this->input->post('nik'),
					'id_pejabat' => $this->input->post('pejabat'),
					'tempat_pemakaman' => $this->input->post('tempat'),
					'hari_pemakaman' => $this->input->post('hari'),
					'tanggal_dimakamkan' => $this->input->post('tanggal'),
					'jam_dimakamkan' => $this->input->post('jam'),
				);
				$where = array(
					'id_pemakaman' => $this->input->post('id'),
				);
				$this->m_pemakaman->proses_edit_pemakaman($where, $data);
				$this->session->set_flashdata('sukses', 'Data berhasil diedit.');
				redirect(base_url('surat/pemakaman/'));
			} else {
				$data['title'] = "Surat Keterangan Pemakaman - Desa Penarukan";
				$data['penduduk'] = $this->m_penduduk->tampil();
				$data['pejabat'] = $this->m_pemakaman->pejabat();
				$data['pemakaman'] = $this->m_pemakaman->edit_pemakaman($this->uri->segment('4'));
				$this->load->view('header', $data);
				$this->load->view('surat/edit_pemakaman', $data);
				$this->load->view('footer');
			}
		} elseif ($this->uri->segment('3') == "cetak") {
			$data['pemakaman'] = $this->m_pemakaman->cetak_pemakaman($this->uri->segment('4'));
			$this->load->view('surat/cetak_pemakaman', $data);
		} elseif ($this->uri->segment('3') == "hapus") {
			$this->m_pemakaman->hapus_pemakaman($this->uri->segment('4'));
			$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
			redirect(base_url('surat/pemakaman'));
		} else {
			$data['title'] = "Surat Keterangan Pemakaman - Desa Penarukan";
			$data['surat'] = $this->m_pemakaman->daftar_pemakaman();
			$mutasi = $this->load->view('header', $data);
			$this->load->view('surat/daftar_pemakaman');
			$this->load->view('footer');
		}
	}
}