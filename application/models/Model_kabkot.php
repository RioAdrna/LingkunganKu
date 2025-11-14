<?php

class Model_kabkot extends CI_Model
{
    //READ
    function get_kabkot($kabkot)
    {
        return $this->db->get_where("kabkot", array("nama" => $kabkot));
    }
}
