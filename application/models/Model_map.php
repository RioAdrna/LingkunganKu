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

     public function get_laporan_by_kategori($arr)
    {
        $query = $this->db->where_in("kategori_id", $arr);
        return $query->get('laporan')->result();
    }
}