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

    public function dashboard_data()
    {
        $query = $this->db->query(
            "SELECT count(id_laporan) as jumlah from laporan
            UNION
            SELECT count(id_laporan) as jumlah from laporan where status='selesai'
            UNION
            Select count(id_laporan) as jumlah from laporan where laporan.tanggal_laporan >= NOW() - INTERVAL 7 DAY
            UNION
            Select count(id_laporan) as jumlah from laporan where status='selesai' AND laporan.tanggal_laporan >= NOW() - INTERVAL 7 DAY
            UNION
            Select count(id_laporan) as jumlah from laporan where MONTH(laporan.tanggal_laporan) = MONTH(NOW())
            UNION
            Select count(id_laporan) as jumlah from laporan where status='selesai' AND  MONTH(laporan.tanggal_laporan) = MONTH(NOW());"
        );
        return $query->result();
    }

    public function dashboard_stat()
    {
        $query = $this->db->query(
            "Select MONTH(laporan.tanggal_laporan) as bulan, count(id_laporan) as jumlah from laporan where YEAR(laporan.tanggal_laporan) = YEAR(NOW()) group by MONTH(laporan.tanggal_laporan);"
        );
        return $query->result();
    }

    public function dashboard_stat2()
    {
        $query = $this->db->query(
            "Select kategori_laporan.nama_kategori as nama_kategori, count(laporan.id_laporan) as jumlah from laporan right join kategori_laporan on laporan.kategori_id=kategori_laporan.id_kategori group by kategori_laporan.id_kategori;"
        );
        return $query->result();
    }

    public function dashboard_stat3()
    {
        $query = $this->db->query(
            "Select kabkot.nama as nama_kabkot, count(laporan.id_laporan) as jumlah from laporan right join kabkot on laporan.kabkot_id=kabkot.id group by kabkot.id;"
        );
        return $query->result();
    }
}
