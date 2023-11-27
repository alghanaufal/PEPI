<?php
class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
    }

    public function peminjaman()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $this->session->set_userdata('tgl_awal', $tgl_awal);
        $this->session->set_userdata('tgl_akhir', $tgl_akhir);

        if (empty($tgl_awal) || empty($tgl_akhir)) {
            $isi['content']  = 'laporan/v_laporan';
            $isi['judul']    = 'Laporan Peminjalan';
            $isi['data']     = $this->m_laporan->getAllData();
        } else {
            $isi['content']  = 'laporan/v_laporan';
            $isi['judul']    = 'Laporan Peminjalan';
            $isi['data']     = $this->m_laporan->filterData($tgl_awal, $tgl_akhir);
        }
        $this->load->view('v_dashboard', $isi);
    }

    public function refresh()
    {
        $isi['content']  = 'laporan/v_laporan';
        $isi['judul']    = 'Laporan Peminjalan';
        $isi['data']     = $this->m_laporan->getAllData();
        $this->load->view('v_dashboard', $isi);
    }
}
