<?php

class Model_laporan extends CI_Model
{

	private function __search($q)
	{
		if (strlen($q) > 0) {
			$this->db->like('laporan.id_laporan ', $q);
			$this->db->or_like('laporan.kategori_id ', $q);
			$this->db->or_like('laporan.kabkot_id ', $q);
			$this->db->or_like('kategori_laporan.nama_kategori ', $q);
			$this->db->or_like('kabkot.nama ', $q);
			$this->db->or_like('laporan.deskripsi ', $q);
			$this->db->or_like('laporan.foto ', $q);
			$this->db->or_like('laporan.tingkat_keparahan ', $q);
			$this->db->or_like('laporan.tanggal_laporan ', $q);
			$this->db->or_like('laporan.longitude ', $q);
			$this->db->or_like('laporan.latitude ', $q);
		}
	}

	function search_laporan($q, $page, $per_page)
	{
		$this->db->select('laporan.id_laporan as id');
		$this->db->select('laporan.kategori_id as kategori_id');
		$this->db->select('laporan.kabkot_id as kabkot_id');
		$this->db->select('kategori_laporan.nama_kategori as kategori');
		$this->db->select('kabkot.nama as kabkot');
		$this->db->select('laporan.deskripsi as deskripsi');
		$this->db->select('laporan.foto as foto');
		$this->db->select('laporan.tingkat_keparahan as tingkat_keparahan');
		$this->db->select('laporan.tanggal_laporan as tanggal_laporan');
		$this->db->select('laporan.longitude as longitude');
		$this->db->select('laporan.latitude as latitude');

		$this->db->where('status', 'belum ditangani');
		$this->__search($q);
		$this->db->join('kategori_laporan', 'kategori_laporan.id_kategori = laporan.kategori_id');
		$this->db->join('kabkot', 'kabkot.id = laporan.kabkot_id', 'left');
		$this->db->order_by('tanggal_laporan', 'desc');
		$this->db->limit($per_page, ($page - 1) * $per_page);
		return $this->db->get('laporan')->result();
	}

	function count_search_total($q)
	{
		$this->db->select('count(laporan.id_laporan) as total');
		$this->db->where('status', 'belum ditangani');
		$this->__search($q);
		$this->db->join('kategori_laporan', 'kategori_laporan.id_kategori = laporan.kategori_id');
		$this->db->join('kabkot', 'kabkot.id = laporan.kabkot_id', 'left');
		return $this->db->get('laporan')->result()[0]->total;
	}

}
