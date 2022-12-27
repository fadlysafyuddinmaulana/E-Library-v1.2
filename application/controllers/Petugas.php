<?php

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $user = $this->session->userdata('server_library');

        if ($this->session->userdata('server_library') == null) {
            redirect('auth');
        }

        if ($user['role'] == 'petugas') {
            redirect('404');
        }
    }

    public function index()
    {
        $user = $this->session->userdata('server_library');

        $data['title']          = 'Perpustakaan A';
        $data['aktif']          = 'petugas';

        if ($user['role'] == 'admin') {
            $data['tree_active']    = 'petugas';
        }

        $data['petugas']    = $this->db->get('petugas')->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Petugas-Page/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function add_petugas()
    {
        $user = $this->session->userdata('server_library');

        $data['title']          = 'Perpustakaan A';
        $data['aktif']          = 'petugas';

        if ($user['role'] == 'admin') {
            $data['tree_active']    = 'petugas';
        }

        $data['petugas']    = $this->db->get('petugas')->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Petugas-Page/add_petugas', $data);
        $this->load->view('layout/footer', $data);
    }

    public function edit_petugas($ido)
    {
        $user = $this->session->userdata('server_library');

        $data['title']          = 'Perpustakaan A';
        $data['aktif']          = 'petugas';

        if ($user['role'] == 'admin') {
            $data['tree_active']    = 'petugas';
        }

        $where = array('id_petugas' => $ido);

        $data['petugas'] = $this->M_SQL->get_data($where, 'petugas')->row();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Petugas-Page/edit_petugas', $data);
        $this->load->view('layout/footer', $data);
    }

    public function detail_petugas($idptgs)
    {
        $user = $this->session->userdata('server_library');

        $data['title']          = 'Perpustakaan A';
        $data['aktif']          = 'petugas';

        if ($user['role'] == 'admin') {
            $data['tree_active']    = 'petugas';
        }

        $where = array('id_petugas' => $idptgs);

        $data['petugas'] = $this->M_SQL->get_data($where, 'petugas')->row();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Petugas-Page/detail_petugas', $data);
        $this->load->view('layout/footer', $data);
    }

    public function insert_petugas()
    {
        $nama               = $this->input->post('nama');
        $jk                 = $this->input->post('jk');

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required',
            [
                'required' => 'Nama harus di sertakan!'
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
            $data['aktif']          = 'petugas';

            if ($user['role'] == 'admin') {
                $data['tree_active']    = 'petugas';
            }

            $data['petugas']    = $this->db->get('petugas')->result();

            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('Petugas-Page/add_petugas', $data);
            $this->load->view('layout/footer', $data);
        } else {

            $config['upload_path']      = './assets/server-image/dokumen-profile-petugas/';
            $config['allowed_types']    = 'png|jpeg|jpg';
            $config['maax_size']        = '5048';
            $config['file_name']        = $_FILES['foto']['name'];

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data();
                    $data = array(
                        'nama_petugas'      => $nama,
                        'jk'                => $jk,
                        'foto_petugas'      => $foto['file_name'],
                        'active'            => '1'
                    );
                    $this->session->set_flashdata('message', 'Petugas berhasil di tambah!');
                    $this->M_SQL->insert_data($data, 'petugas');
                    redirect('petugas');
                } else {
                    $this->session->set_flashdata('message_error', 'Gagal file foto yang dimasukkan tidak sesuai dengan kriteria!');
                    redirect('tambah-Petugas');
                }
            } else {
                $data = array(
                    'nama_petugas'      => $nama,
                    'jk'                => $jk,
                    'foto_petugas'      => $jk,
                    'active'            => '1'
                );
                $this->session->set_flashdata('message', 'Petugas berhasil di tambah!');
                $this->M_SQL->insert_data($data, 'petugas');
                redirect('petugas');
            }
        }
    }

    public function update_petugas($idp)
    {
        $idp                = $this->input->post('idp');
        $nama               = $this->input->post('nama');
        $jk                 = $this->input->post('jk');

        $path = './assets/server-image/dokumen-profile-petugas/';

        $where = array('id_petugas' => $idp);

        $config['upload_path']      = './assets/server-image/dokumen-profile-petugas/';
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
                    'id_petugas'        => $idp,
                    'nama_petugas'      => $nama,
                    'jk'                => $jk,
                    'foto_petugas'      => $foto['file_name']
                );
                @unlink($path . $this->input->post('filelama'));

                $this->session->set_flashdata('message', 'Petugas berhasil di ubah!');
                $this->M_SQL->update_data($where, $data, 'petugas');
                redirect('petugas');
            } else {
                $this->session->set_flashdata('message_error', 'Gagal file foto yang dimasukkan tidak sesuai dengan kriteria!');
                redirect('edit-petugas' . '/' . $idp);
            }
        } else {
            $data = array(
                'id_petugas'        => $idp,
                'nama_petugas'      => $nama,
                'jk'                => $jk,
                'foto_petugas'      => $jk
            );
            $this->session->set_flashdata('message', 'Petugas berhasil di ubah!');
            $this->M_SQL->update_data($where, $data, 'petugas');
            redirect('petugas');
        }
    }

    public function w_clear_photo($id, $foto_siswa)
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

    public function add_userworker($idptgs)
    {
        $idp                = $this->input->post('idp');
        $username           = $this->input->post('username');
        $password           = md5($this->input->post('password'));

        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|is_unique[petugas.username]',
            [
                'required' => 'username harus di sertakan!',
                'is_unique' => 'Username ini sudah dipakai!'
            ]
        );

        $this->form_validation->set_rules(
            'password',
            'Passwrod',
            'required',
            [
                'required' => 'Password harus di sertakan!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('server_library');

            $data['title']          = 'Perpustakaan A';
            $data['aktif']          = 'petugas';
            $data['modal_show']     = "$('#add-modal-worker').modal('show');";

            if ($user['role'] == 'admin') {
                $data['tree_active']    = 'petugas';
            }

            $where = array('id_petugas' => $idptgs);

            $data['petugas'] = $this->M_SQL->get_data($where, 'petugas')->row();

            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('Petugas-Page/detail_petugas', $data);
            $this->load->view('layout/footer', $data);
        } else {

            $where = array(
                'id_petugas' => $idp
            );

            $data = array(
                'username'      => $username,
                'password'      => $password,
                'active'        => 2
            );

            $this->session->set_flashdata('message', 'akun berhasil di ubah!');
            $this->M_SQL->update_data($where, $data, 'petugas');
            redirect('detail-petugas' . '/' . $idp);
        }
    }

    public function update_userworker($idptgs)
    {
        $idp                = $this->input->post('idp');
        $username           = $this->input->post('username');
        $password_hidden    = $this->input->post('password');
        $password           = md5($this->input->post('password'));

        $where = array(
            'id_petugas' => $idp
        );

        if ($password_hidden == '') {
            $data = array(
                'id_petugas'        => $idp,
                'username'          => $username
            );
            $this->M_SQL->update_data($where, $data, 'petugas');
            redirect('detail-petugas' . '/' . $idp);
        } else {
            $data = array(
                'id_petugas'        => $idp,
                'username'          => $username,
                'password'          => $password
            );
            $this->session->set_flashdata('message', 'Akun berhasil di ubah!');
            $this->M_SQL->update_data($where, $data, 'petugas');
            redirect('detail-petugas' . '/' . $idp);
        }
    }

    public function del_petugas($id, $foto_petugas)
    {
        $path = './assets/server-image/dokumen-profile-petugas/';
        @unlink($path . $foto_petugas);

        $where = array('id_petugas' => $id);

        $this->session->set_flashdata('message', 'Petugas berhasil di tambah!');
        $this->M_SQL->delete_data($where, 'petugas');
        redirect('petugas');
    }
}
