<?php

class Model_lapor extends CI_Model
{
    //READ
    function data_lapor($id = "")
    {
        if ($id != "")
            $query = $this->db->get_where("laporan", array("id_laporan" => $id));
        else
            $query = $this->db->get("laporan");

        return $query;
    }
    //CREATE
    function insert_data($data)
    {
        return $this->db->insert("laporan", $data);
    }               

    //DELETE
    function delete_data($where)
    {
        $this->db->where($where);
        return $this->db->delete("laporan");
    }

    //UPDATE
    function update_data($data, $where)
    {
        $this->db->set($data);
        $this->db->where($where);
        return $this->db->update("laporan");
    }
}
