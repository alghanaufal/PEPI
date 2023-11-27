<?php
class Penerbit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_penerbit');
    }

    public function index()
    {
        $isi['content'] = 'penerbit/v_penerbit';
        $isi['petugas'] = 'penerbit/v_penerbit';
        $isi['judul']   = 'Daftar Data Penerbit';
        $isi['data']    = $this->db->get('penerbit')->result();
        if ($this->session->userdata('level') == 'administrator') {
            $this->load->view('v_dashboard', $isi);
        } else if ($this->session->userdata('level') == 'petugas') {
            $this->load->view('v_petugas', $isi);
        }
    }

    public function add_penerbit()
    {
        $isi['content'] = 'penerbit/form_penerbit';
        $isi['petugas'] = 'Penerbit/form_penerbit';
        $isi['judul']   = 'Form Tambah penerbit';
        if ($this->session->userdata('level') == 'administrator') {
            $this->load->view('v_dashboard', $isi);
        } else if ($this->session->userdata('level') == 'petugas') {
            $this->load->view('v_petugas', $isi);
        }
    }

    public function simpan()
    {
        $data['nama_penerbit'] = $this->input->post('nama_penerbit');
        $query = $this->db->insert('penerbit', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Successfully');
            redirect('penerbit');
        }
    }

    public function edit($id)
    {
        $isi['content'] = 'penerbit/edit_penerbit';
        $isi['petugas'] = 'penerbit/edit_penerbit';
        $isi['judul']   = 'Form Edit penerbit';
        $isi['data']    = $this->m_penerbit->edit($id);
        if ($this->session->userdata('level') == 'administrator') {
            $this->load->view('v_dashboard', $isi);
        } else if ($this->session->userdata('level') == 'petugas') {
            $this->load->view('v_petugas', $isi);
        }
    }

    public function update()
    {
        $id_penerbit           = $this->input->post('id_penerbit');
        $data['nama_penerbit'] = $this->input->post('nama_penerbit');
        $query = $this->m_penerbit->update($id_penerbit, $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Successfully update content');
            redirect('penerbit');
        }
    }

    public function delete($id)
    {
        $query = $this->m_penerbit->delete($id);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Successfully delete');
            redirect('penerbit');
        }
    }
}
