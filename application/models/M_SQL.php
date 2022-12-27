<?php

class M_SQL extends CI_Model
{
    /* data result */

    public function data_book()
    {
        $this->db->join('kategori', 'kategori.id_kategori = buku.id_kategori');
        $this->db->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit');
        $this->db->join('lemari', 'lemari.id_lemari = buku.id_lemari');
        return $this->db->get('buku');
    }

    public function all_rent()
    {
        $this->db->join('buku', 'buku.id_buku = rent.id_buku');
        $this->db->join('siswa', 'siswa.id_siswa = rent.id_siswa');
        $this->db->join('stok_buku', 'stok_buku.id_stok = rent.id_stok');
        $this->db->join('petugas', 'petugas.id_petugas = rent.id_petugas');
        return $this->db->get('rent');
    }


    public function data_siswa()
    {
        $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        return $this->db->get('siswa');
    }

    public function data_rent()
    {
        $this->db->join('buku', 'buku.id_buku = rent.id_buku');
        $this->db->join('siswa', 'siswa.id_siswa = rent.id_siswa');
        $this->db->join('stok_buku', 'stok_buku.id_stok = rent.id_stok');
        $this->db->join('petugas', 'petugas.id_petugas = rent.id_petugas');
        return $this->db->get('rent');

        // return $this->db->query("SELECT * FROM rent AS a JOIN siswa AS b ON b.id_siswa = a.id_siswa JOIN stok_buku AS c ON c.id_stok = a.id_stok JOIN petugas AS d ON d.id_petugas = a.id_petugas JOIN buku AS e ON e.id_buku = a.id_buku GROUP BY a.id_pinjam");
    }

    public function get_rent($idr)
    {
        $this->db->join('buku', 'buku.id_buku = rent.id_buku');
        $this->db->join('siswa', 'siswa.id_siswa = rent.id_siswa');
        $this->db->join('stok_buku', 'stok_buku.id_stok = rent.id_stok');
        $this->db->join('petugas', 'petugas.id_petugas = rent.id_petugas');
        $this->db->where('rent.id_rent', $idr);
        return $this->db->get('rent');
    }

    public function data_stok()
    {
        $this->db->join('buku', 'buku.id_buku = stok_buku.id_buku');
        return $this->db->get('stok_buku');
    }

    public function data_sb()
    {
        $this->db->join('siswa', 'siswa.id_siswa = stok_buku.id_siswa');
        return $this->db->get('stok_buku');
    }

    /* get data*/

    public function stok_status($stok)
    {
        $this->db->join('buku', 'buku.id_buku=stok_buku.id_buku');
        $this->db->where('status', $stok);
        return $this->db->get('stok_buku');
    }
    
    public function get_status($status)
    {
        $this->db->select('status');
        $this->db->set('status');
        $this->db->where('status', $status);
        return $this->db->get('stok_buku');
    }    

    public function get_rent_id($status)
    {
        $this->db->where('status', $status);
        return $this->db->get('stok_buku');
    }

    public function get_book($idb)
    {
        $this->db->join('kategori', 'kategori.id_kategori = buku.id_kategori');
        $this->db->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit');
        $this->db->where('buku.id_buku', $idb);
        return $this->db->get('buku');
    }

    public function get_kelas_siswa($idkelas)
    {
        $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $this->db->where('siswa.id_kelas', $idkelas);
        return $this->db->get('siswa');
    }

    public function get_siswa($id_siswa)
    {
        $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $this->db->where('siswa.id_siswa', $id_siswa);
        return $this->db->get('siswa');
    }

    public function get_status_stok($idsb)
    {
        $this->db->join('buku', 'buku.id_buku = stok_buku.id_buku');
        $this->db->where('stok_buku.status', $idsb);
        return $this->db->get('stok_buku');
    }
    
    public function get_data_stok($idsb)
    {
        $this->db->get('stok_buku');
        $this->db->where('stok_buku.id_stok', $idsb);
        return $this->db->get('stok_buku');
    }

    public function get_stok($idsb)
    {
        $this->db->join('buku', 'buku.id_buku = stok_buku.id_buku');
        $this->db->where('buku.id_buku', $idsb);
        return $this->db->get('stok_buku');
    }

    /* function proses*/
    public function status_danger($idb, $id_siswa)
    {
        $data = array(
            'status'    => 1,
            'id_siswa'  => $id_siswa
        );
        $this->db->where('id_stok', $idb);
        $this->db->update('stok_buku', $data);
    }

    public function status_success($idb)
    {
        $data = array(
            'status'    => 2,
            'id_siswa'  => 0
        );
        $this->db->where('id_stok', $idb);
        $this->db->update('stok_buku', $data);
    }

    public function delete_buku($idbuku)
    {
        $this->db->where_in('id_buku', $idbuku);
        $this->db->delete('stok_buku');
    }
    
    public function delete_stok($id_stok)
    {
        $this->db->where_in('id_stok', $id_stok);
        $this->db->delete('stok_buku');
    }

    /* data manipulation */

    function pick_book($idb)
    {
        $this->db->where('id_buku', $idb);
        $this->db->get('stok_buku');
    }

    function insertData_batch($table, $data)
    {
        $this->db->insert_batch($table, $data);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
}
