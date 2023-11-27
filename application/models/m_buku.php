<?php
class M_buku extends CI_Model
{

    public function get_data_buku()
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('pengarang', 'buku.id_pengarang = pengarang.id_pengarang');
        $this->db->join('penerbit', 'buku.id_penerbit = penerbit.id_penerbit');
        return $this->db->get();
    }

    public function get_status_buku()
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('pengarang', 'buku.id_pengarang = pengarang.id_pengarang');
        $this->db->join('penerbit', 'buku.id_penerbit = penerbit.id_penerbit');
        $this->db->join('peminjaman', 'buku.id_buku = peminjaman.id_buku');
        return $this->db->get();
    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('pengarang', 'buku.id_pengarang = pengarang.id_pengarang');
        $this->db->join('penerbit', 'buku.id_penerbit = penerbit.id_penerbit');
        $this->db->where('buku.id_buku', $id);
        return $this->db->get()->row_array();
    }

    public function cari($id)
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->where('id_buku', $id);
        $this->db->like('id_buku', $id);
        $query = $this->db->get('posts');
        return $query->result();
    }

    public function update($id_buku, $data)
    {
        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_buku', $id);
        $this->db->delete('buku');
    }

    public function getDataById($id)
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('pengarang', 'buku.id_pengarang = pengarang.id_pengarang');
        $this->db->join('penerbit', 'buku.id_penerbit = penerbit.id_penerbit');
        $this->db->where('buku.id_buku', $id);
        return $this->db->get()->row_array();
    }

    public function get_buku_rusak()
    {
        $this->db->select('*');
        $this->db->from('status_bk');
        $this->db->join('pengarang', 'status_bk.id_pengarang = pengarang.id_pengarang');
        $this->db->join('penerbit', 'status_bk.id_penerbit = penerbit.id_penerbit');
        return $this->db->get();
    }

    public function get_jumlah_buku()
    {
        $this->db->select('*');
        $this->db->from('jumlah');
        $this->db->join('buku', 'buku.id_buku = jumlah.id_buku');
        return $this->db->get();
    }
}
