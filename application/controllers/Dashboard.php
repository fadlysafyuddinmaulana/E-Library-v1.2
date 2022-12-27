<?php

class Dashboard extends CI_Controller
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
        $data['aktif']              = 'dashboard';
        $data['tree_active']        = null;

        if ($user['role'] == 'admin') {
            $data['profile']            = $this->db->get('admin')->row();
        } else {
            $data['profile']            = $this->db->get('petugas')->row();
        }

        $data['jumlah_siswa']       = $this->M_SQL->data_siswa()->num_rows();
        $data['jumlah_buku']        = $this->M_SQL->data_book()->num_rows();
        $data['pinjam']             = $this->M_SQL->get_rent_id(1)->num_rows();
        $data['kembali']            = $this->M_SQL->get_rent_id(2)->num_rows();
        $data['rent']               = $this->M_SQL->all_rent()->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Dashboard-Page/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function not_found()
    {
            $data['title']      = 'Perpustakaan Karya Ilmu';

        $this->load->view('layout/header', $data);
        $this->load->view('extra-page/404');
        $this->load->view('layout/footer', $data);
    }

    public function configuration_admin($id_admin)
    {
            $data['title']      = 'Perpustakaan Karya Ilmu';
        $data['aktif']              = 'cog-admin';
        $data['tree_active']        = null;

        $where = array('id_admin' => $id_admin);

        $this->M_SQL->get_data($where, 'admin')->row();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Extra-Page/configuration-Admin', $data);
        $this->load->view('layout/footer', $data);
    }

    public function process_configuration($id_admin)
    {
        $this->form_validation->set_rules(
            'old-password',
            'Old Password',
            'required',
            [
                'required' => 'Password lama harus disertakan!'
            ]
        );
        $this->form_validation->set_rules(
            'new-password',
            'New Password',
            'required',
            [
                'required' => 'Password harus disertakan!'
            ]
        );
        $this->form_validation->set_rules(
            'confirmation-password',
            'Confirmation Password',
            'required|matches[new-password]',
            [
                'required' => 'Konfirmasi password harus disertakan!',
                'matches' => 'Password tidak sama!'
            ]
        );

        if ($this->form_validation->run() == false) {
                $data['title']      = 'Perpustakaan Karya Ilmu';
            $data['aktif']              = 'cog-admin';
            $data['tree_active']        = null;

            $where = array('id_admin' => $id_admin);

            $this->M_SQL->get_data($where, 'admin')->row();

            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('Extra-Page/configuration-Admin', $data);
            $this->load->view('layout/footer', $data);
        } else {

            $cek_id        = $this->db->query("SELECT * FROM admin WHERE id_admin = '$id_admin' ")->row_array();

            $pass_lama_in   = $this->input->post('old-password');
            $pass_baru      = $this->input->post('confirmation-password');

            if ($cek_id['password'] == $pass_lama_in) {
                $data = array('password' => $pass_baru);

                $this->db->where('id_admin', $id_admin);
                $this->db->update('admin', $data);

                $this->session->set_flashdata('message', 'Selamat pengaturan admin berhasil diubah!');
                redirect('pengaturan-admin' . '/' . $id_admin);
            } else {
                $this->session->set_flashdata('message_error', 'Admin gagal diubah!');
                redirect('pengaturan-admin' . '/' . $id_admin);
            }
        }
    }
}
