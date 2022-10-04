<?php

class Auth_m extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('nik', $post['nik']);
        $this->db->where('password', $post['password']);
        $this->db->where('user_status = 1');
        $query = $this->db->get();
        return $query;
    }

    public function ambilPengguna($nik, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('nik', $nik);
        $this->db->where('password', $password);
        $this->db->where('user_status = 1');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function dataPengguna($nik)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('nik', $nik);
        $query = $this->db->get();
        return $query->row();
    }
}
