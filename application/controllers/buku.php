<?php
class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_buku');
    }

    public function index()
    {
        $isi['content'] = 'buku/v_buku';
        $isi['petugas'] = 'buku/v_buku';
        $isi['aggt']    = 'buku/v_buku';
        $isi['judul']   = 'Daftar Data buku';
        $isi['data']    = $this->m_buku->get_data_buku();
        if ($this->session->userdata('level') == 'administrator') {
            $this->load->view('v_dashboard', $isi);
        } else if ($this->session->userdata('level') == 'petugas') {
            $this->load->view('v_petugas', $isi);
        } else if ($this->session->userdata('level') == 'anggota') {
            $this->load->view('v_anggota', $isi);
        }
    }

    public function peserta()
    {
        $isi['aggt']    = 'buku/va_buku';
        $isi['judul']   = 'Daftar Data buku';
        $isi['data']    = $this->m_buku->get_data_buku();
        if ($this->session->userdata('level') == 'anggota') {
            $this->load->view('v_anggota', $isi);
        }
    }

    public function status()
    {
        $isi['content'] = 'buku/vs_buku';
        $isi['petugas'] = 'buku/vs_buku';
        $isi['judul']   = 'Daftar Status buku';
        $isi['data']    = $this->m_buku->get_status_buku();
        if ($this->session->userdata('level') == 'administrator') {
            $this->load->view('v_dashboard', $isi);
        } else if ($this->session->userdata('level') == 'petugas') {
            $this->load->view('v_petugas', $isi);
        }
    }

    public function add_buku()
    {
        $isi['content']     = 'buku/form_buku';
        $isi['petugas']     = 'buku/form_buku';
        $isi['judul']       = 'Form Data Buku';
        $isi['pengarang']   = $this->db->get('pengarang')->result();
        $isi['penerbit']    = $this->db->get('penerbit')->result();
        if ($this->session->userdata('level') == 'administrator') {
            $this->load->view('v_dashboard', $isi);
        } else if ($this->session->userdata('level') == 'petugas') {
            $this->load->view('v_petugas', $isi);
        }
    }

    public function simpan()
    {
        $data = array(
            'id_buku'       => $this->input->post('id_buku'),
            'id_pengarang'  => $this->input->post('id_pengarang'),
            'id_penerbit'   => $this->input->post('id_penerbit'),
            'judul_buku'    => $this->input->post('judul_buku'),
            'tahun_terbit'  => $this->input->post('tahun_terbit'),
        );

        $query = $this->db->insert('buku', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Successfully');
            redirect('buku');
        }
    }

    public function edit($id)
    {
        $isi['content']     = 'buku/edit_buku';
        $isi['petugas']     = 'buku/edit_buku';
        $isi['judul']       = 'Form Edit Buku';
        $isi['pengarang']   = $this->db->get('pengarang')->result();
        $isi['penerbit']    = $this->db->get('penerbit')->result();
        $isi['data']        = $this->m_buku->edit($id);
        if ($this->session->userdata('level') == 'administrator') {
            $this->load->view('v_dashboard', $isi);
        } else if ($this->session->userdata('level') == 'petugas') {
            $this->load->view('v_petugas', $isi);
        }
    }

    public function cari()
    {
        $id =   $this->input->post('id_buku');
        $isi['data']        = $this->m_buku->cari($id);
        if ($this->session->userdata('level') == 'administrator') {
            $this->load->view('v_dashboard', $isi);
        } else if ($this->session->userdata('level') == 'petugas') {
            $this->load->view('v_petugas', $isi);
        }
    }

    public function update()
    {
        $id_buku = $this->input->post('id_buku');
        $data = array(
            'id_buku'       => $this->input->post('id_buku'),
            'id_pengarang'  => $this->input->post('id_pengarang'),
            'id_penerbit'   => $this->input->post('id_penerbit'),
            'judul_buku'    => $this->input->post('judul_buku'),
            'tahun_terbit'  => $this->input->post('tahun_terbit'),
        );

        $query = $this->m_buku->update($id_buku, $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Successfully update');
            redirect('buku');
        }
    }

    public function delete($id)
    {
        $query = $this->m_buku->delete($id);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Successfully delete');
            redirect('buku');
        }
    }

    public function rusak($id)
    {
        $data = $this->m_buku->getDataById($id);
        $rusak = array(
            'id_buku' => $data['id_buku'],
            'id_pengarang' => $data['id_pengarang'],
            'id_penerbit' => $data['id_penerbit'],
            'judul_buku' => $data['judul_buku'],
        );

        $query = $this->db->insert('status_bk', $rusak);
        if ($query = true) {
            $delete = $this->m_buku->delete($id);
            if ($delete = true) {
                $this->session->set_flashdata('info', 'Buku Rusak');
                redirect('buku');
            }
        }
    }

    public function bukurusak()
    {
        $isi['content'] = 'buku/vr_buku';
        $isi['petugas'] = 'buku/vr_buku';
        $isi['judul']   = 'Daftar Buku Rusak';
        $isi['data']    = $this->m_buku->get_buku_rusak();
        if ($this->session->userdata('level') == 'administrator') {
            $this->load->view('v_dashboard', $isi);
        } else if ($this->session->userdata('level') == 'petugas') {
            $this->load->view('v_petugas', $isi);
        }
    }

    public function jumlah_buku()
    {
        $isi['content'] = 'buku/vj_buku';
        $isi['petugas'] = 'buku/vj_buku';
        $isi['judul']   = 'Daftar Data buku';
        $isi['data']    = $this->m_buku->get_jumlah_buku();
        if ($this->session->userdata('level') == 'administrator') {
            $this->load->view('v_dashboard', $isi);
        } else if ($this->session->userdata('level') == 'petugas') {
            $this->load->view('v_petugas', $isi);
        }
    }
}
