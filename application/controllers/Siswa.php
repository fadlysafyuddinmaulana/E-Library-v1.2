<?php

class Siswa extends CI_Controller
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

        $data['title']          = 'Perpustakaan A';
        $data['aktif']          = 'siswa';
        $data['tree_active']    = 'data-siswa';

        $data['siswa']      = $this->M_SQL->data_siswa()->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Siswa-Page/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function add_siswa()
    {
        $user = $this->session->userdata('server_library');

        $data['title']          = 'Perpustakaan A';
        $data['aktif']          = 'siswa';
        $data['tree_active']    = 'data-siswa';

        $data['kelas']      = $this->db->get('kelas')->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Siswa-Page/add_siswa', $data);
        $this->load->view('layout/footer', $data);
    }

    public function edit_siswa($id)
    {
        $user = $this->session->userdata('server_library');

        $data['title']          = 'Perpustakaan A';
        $data['aktif']          = 'siswa';

        $where = array('id_siswa' => $id);

        if ($user['role'] == 'admin') {
            $data['tree_active']    = 'data-siswa';
        }

        $data['siswa']      = $this->M_SQL->get_data($where, 'siswa')->row();
        $data['kelas']      = $this->db->get('kelas')->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Siswa-Page/edit_siswa', $data);
        $this->load->view('layout/footer', $data);
    }

    public function kelas_siswa($idkelas)
    {
        $data['title']          = 'Perpustakaan A';
        $data['aktif']          = 'siswa';
        $data['tree_active']    = 'data-kelas';

        $where = array('id_kelas' => $idkelas);

        $data['kelas'] = $this->M_SQL->get_data($where, 'kelas')->row();
        $data['siswa'] = $this->M_SQL->get_kelas_siswa($idkelas)->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Siswa-Page/kelas_siswa', $data);
        $this->load->view('layout/footer', $data);
    }

    public function kelas_page()
    {
        $data['title']          = 'Perpustakaan A';
        $data['aktif']          = 'siswa';
        $data['tree_active']    = 'data-kelas';

        $data['kelas']      = $this->db->get('kelas')->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Extra-Page/Kelas-page', $data);
        $this->load->view('layout/footer', $data);
    }

    public function edit_kelas($id)
    {
        $user = $this->session->userdata('server_library');

        $data['title']          = 'Perpustakaan A';
        $data['aktif']          = 'siswa';

        if ($user['role'] == 'admin') {
            $data['tree_active']    = 'data-kelas';
        }

        $where = array('id_kelas' => $id);

        $data['kelas']      = $this->M_SQL->get_data($where, 'kelas')->row();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Extra-Page/Edit-kelas', $data);
        $this->load->view('layout/footer', $data);
    }

    public function insert_process()
    {
        $nisn                   = $this->input->post('nisn');
        $nis                    = $this->input->post('nis');
        $nama                   = $this->input->post('nama');
        $jk                     = $this->input->post('jk');
        $kelas                  = $this->input->post('kelas');


        $this->form_validation->set_rules(
            'nisn',
            'NISN',
            'required|numeric|min_length[9]|is_unique[siswa.nisn]',
            [
                'required' => 'NISN harus di sertakan!',
                'numeric'   => 'Harus Menggunakan angka!',
                'min_length' => 'Harus 10 angka!',
                'is_unique' => 'NISN sudah di bikin!'
            ]
        );

        $this->form_validation->set_rules(
            'nis',
            'NIS',
            'required|numeric|min_length[3]|is_unique[siswa.nis]',
            [
                'required' => 'NISN harus di sertakan!',
                'numeric'   => 'Harus Menggunakan angka!',
                'min_length' => 'Harus 4 angka!',
                'is_unique' => 'NIS sudah di bikin!'
            ]
        );

        $this->form_validation->set_rules(
            'nama',
            'Nama Siswa',
            'required',
            [
                'required' => 'Nama siswa harus di sertakan!'
            ]
        );

        $this->form_validation->set_rules(
            'jk',
            'Jenis Kelamin',
            'required',
            [
                'required' => 'Jenis Kelamin harus dipilih!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('server_library');

            $data['title']          = 'Perpustakaan A';
            $data['aktif']          = 'siswa';

            if ($user['role'] == 'admin') {
                $data['tree_active']    = 'data-siswa';
            }

            $data['siswa']      = $this->M_SQL->data_siswa()->result();
            $data['kelas']      = $this->db->get('kelas')->result();

            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('Siswa-Page/add_siswa', $data);
            $this->load->view('layout/footer', $data);
        } else {


            $config['upload_path']      = './assets/server-image/dokumen-profile-siswa/';
            $config['allowed_types']    = 'png|jpeg|jpg';
            $config['maax_size']        = '5048';
            $config['max_width']        = '540'; // pixel
            $config['max_height']       = '720'; // pixel
            $config['file_name']        = $_FILES['foto']['name'];

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data();
                    $data = array(
                        'nisn'              => $nisn,
                        'nis'               => $nis,
                        'nama_siswa'        => $nama,
                        'jk'                => $jk,
                        'id_kelas'          => $kelas,
                        'foto_siswa'        => $foto['file_name']
                    );
                    $this->session->set_flashdata('message', 'Siswa Berhasil di tambah!');
                    $this->M_SQL->insert_data($data, 'siswa');
                    redirect('siswa');
                } else {
                    $this->session->set_flashdata('message_error', 'Gagal file foto yang dimasukkan tidak sesuai dengan kriteria!');
                    redirect('add-siswa');
                }
            } else {
                $data = array(
                    'nisn'              => $nisn,
                    'nis'               => $nis,
                    'nama_siswa'        => $nama,
                    'jk'                => $jk,
                    'id_kelas'          => $kelas,
                    'foto_siswa'        => $jk
                );
                $this->session->set_flashdata('message', 'Siswa Berhasil di tambah!');
                $this->M_SQL->insert_data($data, 'siswa');
                redirect('siswa');
            }
        }
    }

    public function update_process($ids)
    {
        $ids                    = $this->input->post('id');
        $nisn                   = $this->input->post('nisn');
        $nis                    = $this->input->post('nis');
        $nama                   = $this->input->post('nama');
        $jk                     = $this->input->post('jk');
        $kelas                  = $this->input->post('kelas');

        $path = './assets/server-image/dokumen-profile-siswa/';

        $where = array('id_siswa' => $ids);

        $config['upload_path']      = './assets/server-image/dokumen-profile-siswa/';
        $config['allowed_types']    = 'png|jpeg|jpg';
        $config['maax_size']        = '5048';
        // $config['max_width']        = '540'; // pixel
        // $config['max_height']       = '720'; // pixel
        $config['file_name']        = $_FILES['foto']['name'];

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data();
                $data = array(
                    'id_siswa'          => $ids,
                    'nisn'              => $nisn,
                    'nis'               => $nis,
                    'nama_siswa'        => $nama,
                    'jk'                => $jk,
                    'id_kelas'          => $kelas,
                    'foto_siswa'        => $foto['file_name']
                );
                @unlink($path . $this->input->post('filelama'));

                $this->session->set_flashdata('message', 'Siswa Berhasil di ubah!');
                $this->M_SQL->update_data($where, $data, 'siswa');
                redirect('siswa');
            } else {
                $this->session->set_flashdata('message_error', 'Gagal file foto yang dimasukkan tidak sesuai dengan kriteria!');
                redirect('edit-siswa/' . $ids);
            }
        } else {
            $data = array(
                'id_siswa'          => $ids,
                'nisn'              => $nisn,
                'nis'               => $nis,
                'nama_siswa'        => $nama,
                'jk'                => $jk,
                'id_kelas'          => $kelas,
            );
            $this->session->set_flashdata('message', 'Siswa Berhasil di ubah!');
            $this->M_SQL->update_data($where, $data, 'siswa');
            redirect('siswa');
        }
    }

    public function clear_photo($id, $foto_siswa)
    {
        $jk = $this->input->post('jk_hidden');

        $path = './assets/server-image/dokumen-profile-siswa/';
        @unlink($path . $foto_siswa);

        $where = array('id_siswa' => $id);

        $data = array(
            'foto_siswa'     => $jk
        );

        $this->session->set_flashdata('message', 'Foto berhasil di hapus!');
        $this->M_SQL->update_data($where, $data, 'siswa');
        redirect('siswa');
    }

    public function del_siswa($idp, $foto_siswa)
    {
        $path = './assets/server-image/dokumen-profile-siswa/';
        @unlink($path . $foto_siswa);

        $where = array('id_siswa' => $idp);

        $this->session->set_flashdata('message', 'Siswa Berhasil di hapus!');
        $this->M_SQL->delete_data($where, 'siswa');
        redirect('siswa');
    }

    public function insert_kelas()
    {
        $nama_kelas     = $this->input->post('nama_kelas');
        $jurusan       = $this->input->post('jurusan');

        $data = array(
            'nama_kelas' => $nama_kelas,
            'jurusan'   => $jurusan
        );

        $this->session->set_flashdata('message', 'Kelas Berhasil di tambah!');
        $this->M_SQL->insert_data($data, 'kelas');
        redirect('kelas');
    }

    public function update_kelas()
    {
        $id             = $this->input->post('id');
        $nama_kelas     = $this->input->post('nama_kelas');
        $jurusan       = $this->input->post('jurusan');

        $where = array('id_kelas' => $id);

        $data = array(
            'id_kelas'   => $id,
            'nama_kelas' => $nama_kelas,
            'jurusan'   => $jurusan
        );

        $this->session->set_flashdata('message', 'Kelas Berhasil di ubah!');
        $this->M_SQL->update_data($where, $data, 'kelas');
        redirect('kelas');
    }

    public function del_kelas($id)
    {
        $where = array('id_kelas' => $id);
        $this->session->set_flashdata('message', 'Kelas Berhasil di hapus!');
        $this->M_SQL->delete_data($where, 'kelas');
        redirect('kelas');
    }
}
