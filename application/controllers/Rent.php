<?php

class Rent extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('server_library') == null) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title']          = 'Perpustakaan A';
        $data['aktif']          = 'rent';
        $data['tree_active']    = null;

        $data['rent']           = $this->M_SQL->data_rent()->result();
        $data['siswa']          = $this->M_SQL->data_siswa()->result();
        $data['stok']           = $this->M_SQL->stok_status(2)->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Rent-Page/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function edit_rent($idr)
    {
        $user = $this->session->userdata('server_library');

        $data['title']          = 'Perpustakaan A';
        $data['aktif']          = 'rent';
        $data['tree_active']    = null;

        $data['rent']           = $this->M_SQL->get_rent($idr)->row();
        $data['siswa']          = $this->M_SQL->data_siswa()->result();
        $data['stok']           = $this->M_SQL->data_stok()->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Rent-Page/Edit_rent', $data);
        $this->load->view('layout/footer', $data);
    }

    public function insert_rent()
    {
        $user = $this->session->userdata('server_library');

        $id_siswa     = $this->input->post('nama_siswa');
        $stok           = $this->input->post('stok');
        $idb            = $this->input->post('stok');
        $pinjam         = date('d/m/y');

        $admin          = $user['id_petugas'];

        $buku           = $this->db->query("SELECT id_buku FROM stok_buku WHERE id_stok = $stok")->row()->id_buku;

        $data = array(
            'id_siswa'      => $id_siswa,
            'id_stok'       => $stok,
            'id_buku'       => $buku,
            'id_petugas'    => $user['id_petugas'],
            'tgl_pinjam'    => $pinjam,
        );

        $this->session->set_flashdata('message', 'Data pinjaman berhasil di tambah!');
        $this->M_SQL->status_danger($idb, $id_siswa);
        $this->M_SQL->insert_data($data, 'rent');
        redirect('rent');
    }

    public function update_rent()
    {
        $id             = $this->input->post('id');
        $nama_siswa     = $this->input->post('nama_siswa');
        $stok           = $this->input->post('stok');
        $pinjam         = date('d/m/y');

        $where = array('id_rent' => $id);

        $data = array(
            'id_siswa'      => $nama_siswa,
            'id_stok'       => $stok,
            'tgl_pinjam'    => $pinjam
        );

        $this->session->set_flashdata('message', 'Data pinjaman berhasil di ubah!');
        $this->M_SQL->update_data($where, $data, 'rent');
        redirect('rent');
    }

    public function return_book($id)
    {
        $tgl_kembali = date('d/m/y');

        $where = array('id_rent' => $id);

        $data = array(
            'tgl_kembali'     => $tgl_kembali
        );

        $this->M_SQL->update_data($where, $data, 'rent');
        redirect('rent');
    }

    public function del_rent($id, $idb)
    {
        $user = $this->session->userdata('server_library');

        $admin = $user['id_petugas'];

        $this->M_SQL->status_success($idb, $admin);

        $this->session->set_flashdata('message', 'Data pinjaman berhasil di hapus!');
        $where = array('id_rent' => $id);
        $this->M_SQL->delete_data($where, 'rent');
        redirect('rent');
    }
}
