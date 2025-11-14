<?php

class Model_kabkot extends CI_Model
{
    //READ
    function kabkot_id($kabkot)
    {
        return $this->db->get_where("nama", $kabkot);
    }
}
