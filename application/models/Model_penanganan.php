<?php

class Model_penanganan extends CI_Model
{
	private $columns = [
		"id",
		"petugas",
		"cabang",
		"status_penanganan",
		"id"
	];

	private function __search($q)
	{
		if (strlen($q) > 0) {
			$this->db->like('cabang.nama_cabang', $q);
			$this->db->or_like('kabkot.nama', $q);
			$this->db->or_like('penanganan.id ', $q);
			$this->db->or_like('penanganan.petugas_id ', $q);
			$this->db->or_like('users.nama ', $q);
			$this->db->or_like('penanganan.catatan ', $q);
			$this->db->or_like('penanganan.status_penanganan ', $q);
		}
	}

	public function read($data)
	{
		$this->db->select('penanganan.id as id');
		$this->db->select('penanganan.petugas_id as petugas_id');
		$this->db->select('users.nama as petugas');
		$this->db->select('CONCAT(cabang.nama_cabang, " - ", kabkot.nama) as cabang');
		$this->db->select('penanganan.catatan as catatan');
		$this->db->select('penanganan.status_penanganan as status_penanganan');
		$this->db->select('penanganan.lampiran as lampiran');
		$this->db->select('penanganan.created_at as created_at');
		$this->db->select('penanganan.waktu_selesai_ditangani as waktu_selesai_ditangani');
		$this->db->select('penanganan.waktu_dikonfirmasi_selesai as waktu_dikonfirmasi_selesai');

		$this->__search($data->search);
		$this->db->join('users', 'users.id = penanganan.petugas_id');
		$this->db->join('cabang', 'cabang.id = users.cabang_petugas_id');
		$this->db->join('kabkot', 'kabkot.id = cabang.kabkot_id', 'left');
		$this->db->order_by($this->columns[$data->column], $data->dir);
		$this->db->limit($data->length, $data->start);
		return $this->db->get('penanganan')->result();
	}

	function count()
	{
		$query = $this->db->query("SELECT count(id) as total from penanganan;");
		return $query->result()[0]->total;
	}

	function insert_data($data)
	{
		return $this->db->insert("penanganan", $data);
	}

	function update_data($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('penanganan', $data);
	}

	function delete_data($id)
	{
		$this->db->where("id", $id);
		return $this->db->delete("penanganan");
	}

}
