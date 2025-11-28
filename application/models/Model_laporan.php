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

	function search_laporan($q, $page, $per_page, $id_penanganan = null)
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
		$this->db->or_where('laporan.penanganan_id', $id_penanganan);
		$this->__search($q);
		$this->db->join('kategori_laporan', 'kategori_laporan.id_kategori = laporan.kategori_id');
		$this->db->join('kabkot', 'kabkot.id = laporan.kabkot_id', 'left');
		$this->db->order_by('tanggal_laporan', 'desc');
		$this->db->limit($per_page, ($page - 1) * $per_page);
		return $this->db->get('laporan')->result();
	}

	function count_search_total($q, $id_penanganan = null)
	{
		$this->db->select('count(laporan.id_laporan) as total');
		$this->db->where('status', 'belum ditangani');
		$this->db->or_where('laporan.penanganan_id', $id_penanganan);
		$this->__search($q);
		$this->db->join('kategori_laporan', 'kategori_laporan.id_kategori = laporan.kategori_id');
		$this->db->join('kabkot', 'kabkot.id = laporan.kabkot_id', 'left');
		return $this->db->get('laporan')->result()[0]->total;
	}

	function update_status_multiple($penanganan_id, $laporan_ids, $status)
	{
		$this->db->where_in('id_laporan', $laporan_ids);
		$this->db->update('laporan', array(
			'status' => $status,
			'penanganan_id' => $penanganan_id
		));
		return $this->db->affected_rows();
	}

	function list_laporan_by_penanganan_id($id)
	{
		$this->db->select('laporan.id_laporan as id');
		$this->db->select('laporan.kategori_id as kategori_id');
		$this->db->select('laporan.user_id as user_id');
		$this->db->select('users.nama as nama_user');
		$this->db->select('laporan.kabkot_id as kabkot_id');
		$this->db->select('kategori_laporan.nama_kategori as kategori');
		$this->db->select('kabkot.nama as kabkot');
		$this->db->select('laporan.deskripsi as deskripsi');
		$this->db->select('laporan.foto as foto');
		$this->db->select('laporan.tingkat_keparahan as tingkat_keparahan');
		$this->db->select('laporan.tanggal_laporan as tanggal_laporan');
		$this->db->select('laporan.longitude as longitude');
		$this->db->select('laporan.latitude as latitude');

		$this->db->where('laporan.penanganan_id', $id);
		$this->db->join('users', 'users.id = laporan.user_id');
		$this->db->join('kategori_laporan', 'kategori_laporan.id_kategori = laporan.kategori_id');
		$this->db->join('kabkot', 'kabkot.id = laporan.kabkot_id', 'left');
		return $this->db->get('laporan')->result();
	}

	function erase_penanganan_id($penanganan_id)
	{
		$this->db->where('penanganan_id', $penanganan_id);
		$this->db->update('laporan', array(
			'penanganan_id' => null,
			'status' => 'belum ditangani'
		));
		return $this->db->affected_rows();
	}
}
