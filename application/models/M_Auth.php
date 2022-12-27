<?php

class M_Auth extends CI_Model
{
    public function cek_admin($u)
    {
        $this->db->where('password', $u);

        return $this->db->get('admin');
    }

    public function cek_petugas($u, $p)
    {
        $this->db->where('username', $u);
        $this->db->where('password', $p);

        return $this->db->get('petugas');
    }
}
