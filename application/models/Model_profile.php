<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_profile extends CI_Model
{

    public function update_profile($id, $data)
    {
        $this->db->where("id", $id);
        return $this->db->update("users", $data);
    }
}
