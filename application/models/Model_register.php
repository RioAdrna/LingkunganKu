<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_register extends CI_Model
{
    public function cek_email($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row();
    }

    public function register($data)
    {
        return $this->db->insert('users', $data);
    }
}
