<?php

class Auth extends CI_Controller
{
    public function index()
    {
        $user = $this->session->userdata('server_library');

        if (empty($user)) {
            $data['title']      = 'Perpustakaan Karya Ilmu';

            $this->load->view('layout/header_login', $data);
            $this->load->view('Starter-page/login_worker', $data);
            $this->load->view('layout/footer_login', $data);
        } elseif ($user['role'] == 'petugas') {
            redirect('dashboard');
        } else {
            redirect('dashboard');
        }
    }

    public function admin()
    {
        $user = $this->session->userdata('server_library');

        if (empty($user)) {
            $data['title']      = 'Perpustakaan Karya Ilmu';

            $this->load->view('layout/header_login', $data);
            $this->load->view('Starter-page/login_admin', $data);
            $this->load->view('layout/footer_login', $data);
        } elseif ($user['role'] == 'admin') {
            redirect('dashboard');
        }
    }

    public function authentication_worker()
    {
        $u      = $this->input->post('username');
        $p      = md5($this->input->post('password'));
        $cek    = $this->M_Auth->cek_petugas($u, $p);

        $this->form_validation->set_rules(
            'username',
            'username',
            'required|min_length[2]',
            [
                'required' => 'Username wajib di sertakan!'
            ]
        );

        $this->form_validation->set_rules(
            'password',
            'password',
            'required',
            [
                'required' => 'Password wajib di sertakan!'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $user = $this->session->userdata('server_library');

            if (empty($user)) {
                $data['title']      = 'Perpustakaan Karya Ilmu';

                $this->load->view('layout/header_login', $data);
                $this->load->view('starter-page/login_worker', $data);
                $this->load->view('layout/footer_login', $data);
            } elseif ($user['role'] == 'petugas') {
                redirect('dashboard');
            } else {
                redirect('dashboard');
            }
        } else {
            if ($cek->num_rows() > 0) {
                $user_data                  = $cek->row_array();
                $session['id_petugas']      = $user_data['id_petugas'];
                $session['nama_petugas']    = $user_data['nama_petugas'];
                $session['username']        = $user_data['username'];
                $session['password']        = $user_data['password'];
                $session['foto_petugas']    = $user_data['foto_petugas'];
                $session['jk']              = $user_data['jk'];
                $session['role']            = 'petugas';
                $this->session->set_userdata('server_library', $session);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message_login', 'Silahkan Cek username atau password anda!');
                redirect('auth');
            }
        }
    }

    public function authentication_admin()
    {
        $p      = $this->input->post('password');
        $cek    = $this->M_Auth->cek_admin($p);

        $this->form_validation->set_rules(
            'password',
            'password',
            'required',
            [
                'required' => 'Password wajib di sertakan!'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $user = $this->session->userdata('server_library');

            if (empty($user)) {
                $data['title']      = 'Perpustakaan Karya Ilmu';

                $this->load->view('layout/header_login', $data);
                $this->load->view('starter-page/login_admin', $data);
                $this->load->view('layout/footer_login', $data);
            } elseif ($user['role'] == 'admin') {
                redirect('dashboard');
            }
        } else {
            if ($cek->num_rows() > 0) {
                $user_data               = $cek->row_array();
                $session['id_admin']     = $user_data['id_admin'];
                $session['password']     = $user_data['password'];
                $session['role']         = 'admin';
                $this->session->set_userdata('server_library', $session);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message_login', 'Silahkan Cek password anda!');
                redirect('admin');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
