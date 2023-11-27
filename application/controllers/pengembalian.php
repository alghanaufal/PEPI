<?php
class Pengembalian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pengembalian');
    }

    public function index()
    {
        $isi['content'] = 'pengembalian/v_pengembalian';
        $isi['judul']   = 'Data pengembalian';
        $this->load->model('m_pengembalian');
        $isi['data']    = $this->m_pengembalian->getAllData();
        $this->load->view('v_dashboard', $isi);
    }
}
