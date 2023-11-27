<?php
class Pengarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pengarang');
    }

    public function index()
    {
        $isi['content'] = 'pengarang/v_pengarang';
        $isi['petugas'] = 'pengarang/v_pengarang';
        $isi['judul']   = 'Daftar Data Pengarang';
        $isi['data']    = $this->db->get('pengarang')->result();
        if ($this->session->userdata('level') == 'administrator') {
            $this->load->view('v_dashboard', $isi);
        } else if ($this->session->userdata('level') == 'petugas') {
            $this->load->view('v_petugas', $isi);
        }
    }

    public function add_pengarang()
    {
        $isi['content'] = 'pengarang/form_pengarang';
        $isi['petugas'] = 'pengarang/form_pengarang';
        $isi['judul']   = 'Form Tambah Pengarang';
        if ($this->session->userdata('level') == 'administrator') {
            $this->load->view('v_dashboard', $isi);
        } else if ($this->session->userdata('level') == 'petugas') {
            $this->load->view('v_petugas', $isi);
        }
    }

    public function simpan()
    {
        $data['nama_pengarang'] = $this->input->post('nama_pengarang');
        $query = $this->db->insert('pengarang', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Successfully');
            redirect('pengarang');
        }
    }

    public function edit($id)
    {
        $isi['content'] = 'pengarang/edit_pengarang';
        $isi['petugas'] = 'pengarang/edit_pengarang';
        $isi['judul']   = 'Form Edit Pengarang';
        $isi['data']    = $this->m_pengarang->edit($id);
        if ($this->session->userdata('level') == 'administrator') {
            $this->load->view('v_dashboard', $isi);
        } else if ($this->session->userdata('level') == 'petugas') {
            $this->load->view('v_petugas', $isi);
        }
    }

    public function update()
    {
        $id_pengarang           = $this->input->post('id_pengarang');
        $data['nama_pengarang'] = $this->input->post('nama_pengarang');
        $query = $this->m_pengarang->update($id_pengarang, $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Successfully update content');
            redirect('pengarang');
        }
    }

    public function delete($id)
    {
        $query = $this->m_pengarang->delete($id);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Successfully delete');
            redirect('pengarang');
        }
    }
}
