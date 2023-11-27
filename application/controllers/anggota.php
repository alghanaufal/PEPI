<?php
class Anggota extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_anggota');
    }

    public function index()
    {
        $isi['content'] = 'anggota/v_anggota';
        $isi['judul']   = 'Daftar Data Anggota';
        $isi['data'] = $this->db->get('anggota')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function add_anggota()
    {
        $isi['content']     = 'anggota/form_anggota';
        $isi['judul']       = 'Form Tambah Anggota';
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $data = array(
            'id_anggota'    => $this->input->post('id_anggota'),
            'nama_anggota'  => $this->input->post('nama_anggota'),
            'gender'        => $this->input->post('gender'),
            'alamat'        => $this->input->post('alamat'),
            'no_hp'         => $this->input->post('no_hp'),
        );
        $query = $this->db->insert('anggota', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Successfully');
            redirect('anggota');
        }
    }

    public function edit($id)
    {
        $isi['content']     = 'anggota/edit_anggota';
        $isi['judul']       = 'Form Edit Anggota';
        $isi['data']        = $this->m_anggota->edit($id);
        $this->load->view('v_dashboard', $isi);
    }

    public function update()
    {
        $id_anggota = $this->input->post('id_anggota');
        $data = array(
            'id_anggota'    => $this->input->post('id_anggota'),
            'nama_anggota'  => $this->input->post('nama_anggota'),
            'gender'        => $this->input->post('gender'),
            'alamat'        => $this->input->post('alamat'),
            'no_hp'         => $this->input->post('no_hp'),
        );
        $query = $this->m_anggota->update($id_anggota, $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Successfully update');
            redirect('anggota');
        }
    }

    public function delete($id)
    {
        $query = $this->m_anggota->delete($id);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Successfully delete');
            redirect('anggota');
        }
    }
}
