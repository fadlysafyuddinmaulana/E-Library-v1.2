<?php

class Buku extends CI_Controller
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
        $user = $this->session->userdata('server_library');

        $data['title']      = 'Perpustakaan Karya Ilmu';
        $data['aktif']          = 'buku';
        $data['tree_active']    = 'data-buku';


        $data['buku'] = $this->M_SQL->data_book()->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Buku-Page/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function add_buku()
    {
        $user = $this->session->userdata('server_library');

        $data['title']      = 'Perpustakaan Karya Ilmu';
        $data['aktif']          = 'buku';
        $data['tree_active']    = 'data-buku';

        $data['penerbit'] = $this->db->get('penerbit')->result();
        $data['kategori'] = $this->db->get('kategori')->result();
        $data['lemari']  = $this->db->get('lemari')->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Buku-Page/add_buku', $data);
        $this->load->view('layout/footer', $data);
    }

    public function edit_buku($idb)
    {
        $user = $this->session->userdata('server_library');

        $data['title']      = 'Perpustakaan Karya Ilmu';
        $data['aktif']          = 'buku';
        $data['tree_active']    = 'data-buku';

        $data['penerbit'] = $this->db->get('penerbit')->result();
        $data['kategori'] = $this->db->get('kategori')->result();
        $data['lemari']  = $this->db->get('lemari')->result();

        $data['buku'] = $this->M_SQL->get_book($idb)->row();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Buku-Page/edit_buku', $data);
        $this->load->view('layout/footer', $data);
    }
    
    public function del_buku($idb)
    {
        $data['title']          = 'Perpustaka Karya Ilmu';
        $data['aktif']          = 'buku';
        $data['tree_active']    = 'data-buku';

        $data['buku']       = $this->M_SQL->get_book($idb)->row();
        $data['stok']       = $this->M_SQL->get_stok($idb)->result();
        $data['status']     = $this->M_SQL->get_stok($idb)->num_rows();

        $this->load->view('Buku-Page/message_book', $data);
    }

    public function stok_page($idbs)
    {
        $user = $this->session->userdata('server_library');

        $data['title']      = 'Perpustakaan Karya Ilmu';
        $data['aktif']          = 'buku';
        $data['tree_active']    = 'data-buku';

        $data['buku'] = $this->M_SQL->get_book($idbs)->row();
        $data['stok'] = $this->M_SQL->get_stok($idbs)->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Stok-Page/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function add_stok_buku($idb)
    {
        $user = $this->session->userdata('server_library');

        $data['title']      = 'Perpustakaan Karya Ilmu';
        $data['aktif']          = 'buku';
        $data['tree_active']    = 'data-buku';

        $data['buku'] = $this->M_SQL->get_book($idb)->row();
        $data['stok'] = $this->M_SQL->get_book($idb)->row();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Stok-Page/add_stok', $data);
        $this->load->view('layout/footer', $data);
    }

    public function edit_stok($idb)
    {
        $user = $this->session->userdata('server_library');

        $data['title']      = 'Perpustakaan Karya Ilmu';
        $data['aktif']          = 'buku';
        $data['tree_active']    = 'data-buku';


        $data['buku'] = $this->M_SQL->get_book($idb)->row();
        $data['stok'] = $this->M_SQL->get_data_stok($idb)->row();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Stok-Page/edit_stok', $data);
        $this->load->view('layout/footer', $data);
    }

    public function kategori_page()
    {
        $user = $this->session->userdata('server_library');


        $data['title']      = 'Perpustakaan Karya Ilmu';
        $data['aktif']          = 'buku';

        if ($user['role'] == 'petugas') {
            redirect('404');
        }

        if ($user['role'] == 'admin') {
            $data['tree_active']    = 'data-kategori';
        }

        $data['kategori'] = $this->db->get('kategori')->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Extra-Page/Kategori-Page', $data);
        $this->load->view('layout/footer', $data);
    }

    public function edit_kategori($idk)
    {
        $user = $this->session->userdata('server_library');

        $data['title']      = 'Perpustakaan Karya Ilmu';
        $data['aktif']          = 'buku';

        if ($user['role'] == 'admin') {
            $data['tree_active']    = 'data-kategori';
        }

        $where = array('id_kategori' => $idk);

        $data['kategori'] = $this->M_SQL->get_data($where, 'kategori')->row();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Extra-Page/Edit-Kategori', $data);
        $this->load->view('layout/footer', $data);
    }

    public function penerbit_page()
    {
        $user = $this->session->userdata('server_library');

        $data['title']      = 'Perpustakaan Karya Ilmu';
        $data['aktif']          = 'buku';

        if ($user['role'] == 'admin') {
            $data['tree_active']    = 'data-penerbit';
        }

        if ($user['role'] == 'petugas') {
            redirect('404');
        }

        $data['penerbit']   = $this->db->get('penerbit')->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Extra-Page/Penerbit-Page', $data);
        $this->load->view('layout/footer', $data);
    }

    public function edit_penerbit($idk)
    {
        $user = $this->session->userdata('server_library');

        $data['title']      = 'Perpustakaan Karya Ilmu';
        $data['aktif']          = 'buku';

        if ($user['role'] == 'admin') {
            $data['tree_active']    = 'data-penerbit';
        }

        $where = array('id_penerbit' => $idk);

        $data['penerbit'] = $this->M_SQL->get_data($where, 'penerbit')->row();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Extra-Page/Edit-Penerbit', $data);
        $this->load->view('layout/footer', $data);
    }

    public function lemari_page()
    {
        $user = $this->session->userdata('server_library');

        $data['title']      = 'Perpustakaan Karya Ilmu';
        $data['aktif']          = 'lemari';
        $data['tree_active']    = null;

        $data['kategori'] = $this->db->get('kategori')->result();
        $data['lemari'] = $this->db->get('lemari')->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Extra-Page/Lemari-Page', $data);
        $this->load->view('layout/footer', $data);
    }

    public function edit_lemari($id)
    {
        $user = $this->session->userdata('server_library');

        $data['title']      = 'Perpustakaan Karya Ilmu';
        $data['aktif']          = 'lemari';
        $data['tree_active']    = null;

        $where = array('id_lemari' => $id);

        $data['lemari'] = $this->M_SQL->get_data($where, 'lemari')->row();
        $data['kategori'] = $this->db->get('kategori')->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Extra-Page/Edit-Lemari', $data);
        $this->load->view('layout/footer', $data);
    }

    public function insert_book()
    {
        $judul_buku     = $this->input->post('judul_buku');
        $kategori       = $this->input->post('kategori');
        $penerbit       = $this->input->post('penerbit');
        $pengarang      = $this->input->post('pengarang');
        $hal_buk        = $this->input->post('hal_buk');
        $lemari         = $this->input->post('lemari');
        $thn_terbit     = $this->input->post('thn_terbit');
        $isbn           = $this->input->post('isbn');

        $this->form_validation->set_rules(
            'judul_buku',
            'Judul Buku',
            'required',
            [
                'required' => 'Judul buku harus di sertakan!'
            ]
        );

        $this->form_validation->set_rules(
            'pengarang',
            'Pengarang',
            'required',
            [
                'required' => 'Pengarang harus di sertakan!'
            ]
        );

        $this->form_validation->set_rules(
            'hal_buk',
            'Halaman Buku',
            'required|numeric',
            [
                'required' => 'Halaman buku harus di sertakan!',
                'numeric' => 'Harus menggunakan angka!',
            ]
        );

        $this->form_validation->set_rules(
            'thn_terbit',
            'Tahun Terbit',
            'required',
            [
                'required' => 'Tahun terbit harus di sertakan!'
            ]
        );

        $this->form_validation->set_rules(
            'isbn',
            'ISBN',
            'required|is_unique[buku.isbn]',
            [
                'required' => 'ISBN harus di sertakan!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('server_library');

            $data['title']      = 'Perpustakaan Karya Ilmu';
            $data['aktif']          = 'buku';
            $data['tree_active']    = 'data-buku';

            $data['penerbit'] = $this->db->get('penerbit')->result();
            $data['kategori'] = $this->db->get('kategori')->result();
            $data['lemari']  = $this->db->get('lemari')->result();

            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('Buku-Page/add_buku', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
                'judul_buku'        => $judul_buku,
                'id_kategori'       => $kategori,
                'id_penerbit'       => $penerbit,
                'pengarang'         => $pengarang,
                'halaman_buku'      => $hal_buk,
                'id_lemari'         => $lemari,
                'thn_terbit'        => $thn_terbit,
                'isbn'              => $isbn,
            );
            $this->session->set_flashdata('message', 'Buku berhasil di tambah!');
            $this->M_SQL->insert_data($data, 'buku');
            redirect('buku');
        }
    }

    public function update_book()
    {
        $idb            = $this->input->post('idb');
        $judul_buku     = $this->input->post('judul_buku');
        $kategori       = $this->input->post('kategori');
        $penerbit       = $this->input->post('penerbit');
        $pengarang      = $this->input->post('pengarang');
        $hal_buk        = $this->input->post('hal_buk');
        $lemari         = $this->input->post('lemari');
        $thn_terbit     = $this->input->post('thn_terbit');
        $isbn           = $this->input->post('isbn');

        $where = array('id_buku' => $idb);

        $data = array(
            'id_buku'           => $idb,
            'judul_buku'        => $judul_buku,
            'id_kategori'       => $kategori,
            'id_penerbit'       => $penerbit,
            'pengarang'         => $pengarang,
            'halaman_buku'      => $hal_buk,
            'id_lemari'         => $lemari,
            'thn_terbit'        => $thn_terbit,
            'isbn'              => $isbn
        );
        $this->session->set_flashdata('message', 'Buku berhasil di ubah!');
        $this->M_SQL->update_data($where, $data, 'buku');
        redirect('buku');
    }

    public function insert_category()
    {
        $kategori       = $this->input->post('kategori');

        $data = array(
            'kategori'   => $kategori
        );

        $this->session->set_flashdata('message', 'Kategori berhasil di tambah!');
        $this->M_SQL->insert_data($data, 'kategori');
        redirect('kategori');
    }

    public function update_category()
    {
        $id             = $this->input->post('id');
        $kategori       = $this->input->post('kategori');

        $where = array('id_kategori' => $id);

        $data = array(
            'id_kategori'   => $id,
            'kategori'      => $kategori,
        );

        $this->session->set_flashdata('message', 'Kategori berhasil di ubah!');
        $this->M_SQL->update_data($where, $data, 'kategori');
        redirect('kategori');
    }

    public function del_category($id)
    {
        $where = array(
            'id_kategori' => $id
        );

        $this->session->set_flashdata('message', 'Kategori berhasil di hapus!');
        $this->M_SQL->delete_data($where, 'kategori');
        redirect('kategori');
    }

    public function insert_penerbit()
    {
        $penerbit       = $this->input->post('penerbit');

        $data = array(
            'penerbit'   => $penerbit
        );

        $this->session->set_flashdata('message', 'Penerbit berhasil di tambah');
        $this->M_SQL->insert_data($data, 'penerbit');
        redirect('penerbit');
    }

    public function update_penerbit()
    {
        $id             = $this->input->post('id');
        $penerbit       = $this->input->post('penerbit');

        $where = array('id_penerbit' => $id);

        $data = array(
            'id_penerbit'   => $id,
            'penerbit'      => $penerbit,
        );

        $this->session->set_flashdata('message', 'Penerbit berhasil di ubah');
        $this->M_SQL->update_data($where, $data, 'penerbit');
        redirect('penerbit');
    }

    public function del_penerbit($id)
    {
        $where = array(
            'id_penerbit' => $id
        );

        $this->session->set_flashdata('message', 'Penerbit berhasil di hapus');
        $this->M_SQL->delete_data($where, 'penerbit');
        redirect('penerbit');
    }

    public function insert_lemari()
    {
        $lemari         = $this->input->post('lemari');

        $this->form_validation->set_rules(
            'lemari',
            'Lemari',
            'required|numeric|is_unique[lemari.no_lemari]',
            [
                'required' => 'Nomor lermari harus disertakan!',
                'numeric' => 'Harus menggunakan angka!',
                'is_unique' => 'Nomor ini sudah di bikin!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('server_library');

            $data['title']      = 'Perpustakaan Karya Ilmu';
            $data['aktif']          = 'lemari';
            $data['tree_active']    = null;

            $data['lemari']     = $this->db->get('lemari')->result();
            $data['modal_show']    = "$('#add-modal').modal('show');";

            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('Extra-Page/Lemari-Page', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
                'no_lemari'      => $lemari
            );
            $this->session->set_flashdata('message', 'Lemari Berhasil di tambah');
            $this->M_SQL->insert_data($data, 'lemari');
            redirect('lemari');
        }
    }

    public function update_lemari()
    {
        $id             = $this->input->post('id');
        $lemari         = $this->input->post('lemari');


        $this->form_validation->set_rules(
            'lemari',
            'Lemari',
            'required|numeric|is_unique[lemari.no_lemari]',
            [
                'required' => 'Nomor lermari harus disertakan!',
                'numeric' => 'Harus menggunakan angka!',
                'is_unique' => 'Nomor ini sudah di bikin!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('server_library');

            $data['title']      = 'Perpustakaan Karya Ilmu';
            $data['aktif']          = 'lemari';
            $data['tree_active']    = null;

            $where = array('id_lemari' => $id);

            $data['lemari'] = $this->M_SQL->get_data($where, 'lemari')->row();
            $data['kategori'] = $this->db->get('kategori')->result();
            $data['modal_show']    = "$('#add-modal').modal('show');";

            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('Extra-Page/Edit-Lemari', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $where = array('id_lemari' => $id);

            $data = array(
                'id_lemari'     => $id,
                'no_lemari'        => $lemari,
            );
            $this->session->set_flashdata('message', 'Lemari Berhasil di ubah');
            $this->M_SQL->update_data($where, $data, 'lemari');
            redirect('lemari');
        }
    }

    public function del_lemari($id)
    {
        $where = array(
            'id_lemari' => $id
        );

        $this->session->set_flashdata('message', 'Lemari Berhasil di hapus');
        $this->M_SQL->delete_data($where, 'lemari');
        redirect('lemari');
    }

    public function insert_stok()
    {
        $ids            = $this->input->post('id_buku');
        $no_awal        = $this->input->post('no_awal');
        $no_akhir       = $this->input->post('no_akhir');
        $tgl_masuk      = $this->input->post('tgl_masuk');
        $status         = $this->input->post('status');

        if ($no_awal > $no_akhir) {
            $this->session->set_flashdata('message', 'Nomor yang di masukkan salah!');
            redirect('tambah-stok/' . $ids);
        } else {
            //deklarasi array
            $no_buku = array();
            $data = array();
            //masukan masing - masing no buku awal sampai akhir
            for ($i = $no_awal; $i <= $no_akhir; $i++) {
                $no_buku[] = $i;
            }
            //hitung jumlah buku
            $jml = count($no_buku);
            //masukan no buku beserta id buku dan status nya
            for ($i = 0; $i < $jml; $i++) {
                $data[] = array(
                    'id_buku'       => $ids,
                    'no_buku'       => $no_buku[$i],
                    'status'        => $status,
                    'tgl_rilis'     => $tgl_masuk
                );
            }
            $this->session->set_flashdata('message', 'selamat stok berhasil di tambah');
            $this->M_SQL->insertData_batch('stok_buku', $data);
            redirect('stok-buku/' . $ids);
        }
    }

    public function update_stok()
    {
        $ids            = $this->input->post('id');
        $idb            = $this->input->post('id_buku');
        $no_buku        = $this->input->post('no_buku');
        $tgl_masuk      = $this->input->post('tgl_masuk');
        $status         = $this->input->post('status');

        $where = array('id_stok' => $ids);

        $data = array(
            'id_buku'     => $idb,
            'no_buku'     => $no_buku,
            'tgl_rilis'   => $tgl_masuk,
            'status'      => $status
        );

        $this->session->set_flashdata('message', 'selamat stok berhasil di ubah');
        $this->M_SQL->update_data($where, $data, 'stok_buku');
        redirect('stok-buku/' . $idb);
    }

    public function update_status($idb, $id_siswa)
    {
        $admin = $this->session->userdata('server');

        $status = $this->M_SQL->get_stok($idb)->row()->status;

        if ($status == 1) {
            $data = array(
                'id_stok'    => 0
            );
            $this->db->where('id_siswa', $id_siswa);
            $this->db->update('siswa', $data);
            $this->M_SQL->status_danger($idb, $admin);
        } else {
            $data = array(
                'id_stok'    => 0
            );
            $this->db->where('id_siswa', $id_siswa);
            $this->db->update('siswa', $data);
            $this->M_SQL->status_success($idb, $admin);
        }
    }

    public function del_stok()
    {
        $idb = $this->input->post_get('id_buku');
        $id_stok = $_POST['stok'];

        if ($id_stok == '') {
            $this->session->set_flashdata('message_error', 'Pilih buku terlebih dahulu!');
            redirect('stok-buku/' . $idb);
        } else {
            $this->M_SQL->delete_stok($id_stok);
            $this->session->set_flashdata('message', 'selamat stok berhasil di hapus');
            redirect('stok-buku/' . $idb);
        }
    }

    public function del_book($idsb)
    {
        $status = $_POST['status'];

        if ($status == '0') {
            $id_stok = $_POST['stok'];
            $where = array('id_buku' => $idsb);
            $this->M_SQL->delete_data($where, 'buku');
            $this->M_SQL->delete_buku($id_stok);
            $this->session->set_flashdata('message', 'buku berhasil dihapus!');
            redirect('buku');
        } else {
            $this->session->set_flashdata('message_error', 'Stok buku yang masih tersedia ataupun dipinjam, dimohon untuk menghapus stok buku terlebih dahulu! ');
            redirect('buku');
        }
    }
}
