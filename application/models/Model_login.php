<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_login extends CI_Model
{

    public function cek_user($where)
    {
        $query = $this->db->get_where("users", $where);

        return $query;
    }
}
