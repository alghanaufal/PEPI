<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		if ($this->m_squrity->getSqurity() == true) {
			redirect('login');
		} else {
			$isi['content'] 		= 'v_home';
			$isi['petugas']			= 'v_menu';
			$isi['judul'] 			= 'Dashboard';
			$this->load->model('m_dashboard');
			$isi['anggota'] 		= $this->m_dashboard->countAnggota();
			$isi['buku'] 			= $this->m_dashboard->countBuku();
			$isi['peminjaman'] 		= $this->m_dashboard->countPinjam();
			$isi['pengembalian'] 	= $this->m_dashboard->countKembali();
			if ($this->session->userdata('level') == 'administrator') {
				$this->load->view('v_dashboard', $isi);
			} else if ($this->session->userdata('level') == 'petugas') {
				$this->load->view('v_petugas', $isi);
			}
		}
	}
}
