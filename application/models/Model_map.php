<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_map extends CI_Model
{

    public function jumlah_laporan_average()
    {
        $query = $this->db->query("SELECT kabkot.id, geojson_id, kabkot.nama, COUNT(laporan.kabkot_id) as jumlah_laporan, AVG(laporan.tingkat_keparahan) as rata_rata_keparahan FROM `kabkot` INNER JOIN laporan on kabkot.id=laporan.kabkot_id GROUP BY kabkot.id;");
        return $query->result();
    }

    public function jumlah_laporan_average_7()
    {
        $query = $this->db->query("SELECT kabkot.id, geojson_id, kabkot.nama, COUNT(laporan.kabkot_id) as jumlah_laporan, AVG(laporan.tingkat_keparahan) as rata_rata_keparahan FROM `kabkot` INNER JOIN laporan on kabkot.id=laporan.kabkot_id where laporan.tanggal_laporan >= NOW() - INTERVAL 7 DAY GROUP BY kabkot.id;");
        return $query->result();
    }

    public function kategori_terbanyak()
    {
        $query = $this->db->query("SELECT kabkot.id, geojson_id, kabkot.nama, kategori_laporan.nama_kategori, COUNT(laporan.kabkot_id) as jumlah_laporan FROM `kabkot` INNER JOIN laporan on kabkot.id=laporan.kabkot_id LEFT JOIN kategori_laporan on laporan.kategori_id = kategori_laporan.id_kategori GROUP BY kabkot.id, laporan.kategori_id;");
        return $query->result();
    }

    public function kategori_terbanyak_7()
    {
        $query = $this->db->query("SELECT kabkot.id, geojson_id, kabkot.nama, kategori_laporan.nama_kategori, COUNT(laporan.kabkot_id) as jumlah_laporan FROM `kabkot` INNER JOIN laporan on kabkot.id=laporan.kabkot_id LEFT JOIN kategori_laporan on laporan.kategori_id = kategori_laporan.id_kategori  where laporan.tanggal_laporan >= NOW() - INTERVAL 7 DAY GROUP BY kabkot.id, laporan.kategori_id;");
        return $query->result();
    }

    public function get_kategori()
    {
        $query = $this->db->query("SELECT * from kategori_laporan;");
        return $query->result();
    }

     public function get_laporan_by_kategori($data)
    {
        $this->db->select('laporan.id_laporan as id_laporan');
        $this->db->select('laporan.user_id as user_id');
        $this->db->select('laporan.kategori_id as kategori_id');
        $this->db->select('laporan.kabkot_id as kabkot_id');
        $this->db->select('laporan.deskripsi as deskripsi');
        $this->db->select('laporan.foto as foto');
        $this->db->select('laporan.latitude as latitude');
        $this->db->select('laporan.longitude as longitude');
        $this->db->select('laporan.alamat_lengkap as alamat_lengkap');
        $this->db->select('laporan.tingkat_keparahan as tingkat_keparahan');
        $this->db->select('laporan.status as status');
        $this->db->select('laporan.tanggal_laporan as tanggal_laporan');
        $this->db->select('laporan.updated_at as updated_at');
        $this->db->select('kabkot.nama as nama');
        $this->db->select('kabkot.jenis as jenis');
        $this->db->select('kabkot.ibu_kota as ibu_kota');
        $this->db->select('kabkot.latitude as kabkot_latitude');
        $this->db->select('kabkot.longitude as kabkot_longitude');
        $this->db->select('kabkot.geojson_id as geojson_id');
        $this->db->select('kategori_laporan.nama_kategori as nama_kategori');
        $this->db->select('kategori_laporan.deskripsi as deskripsi_kategori');
        $this->db->select('kategori_laporan.icon as icon');
        $this->db->where_in("kategori_id", $data["kategori_id"]);
        if($data["tanggal_awal"] != "") $this->db->where("date(tanggal_laporan) >=", $data["tanggal_awal"]);
        if($data["tanggal_akhir"] != "") $this->db->where("date(tanggal_laporan) <=", $data["tanggal_akhir"]);
        if($data["kabkot_id"] != "") $this->db->where("kabkot.id", $data["kabkot_id"]);
        if($data["tingkat_keparahan"] != "") $this->db->where("tingkat_keparahan", $data["tingkat_keparahan"]);
        if($data["status"] != "") $this->db->where("status", $data["status"]);
        $this->db->join('kategori_laporan', 'kategori_laporan.id_kategori = laporan.kategori_id');
        $this->db->join('kabkot', 'kabkot.id = laporan.kabkot_id');
        return $this->db->get('laporan')->result();
    }
}