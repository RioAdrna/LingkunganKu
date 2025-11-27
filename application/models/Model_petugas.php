<?php

class Model_petugas extends CI_Model
{
	private $columns = [
		"id",
		"nama_cabang",
		"nama",
		"id"
	];

	private function __search($q)
	{
		if (strlen($q) > 0) {
			$this->db->like('users.id', $q);
			$this->db->or_like('cabang.nama_cabang', $q);
			$this->db->or_like('kabkot.nama', $q);
			$this->db->or_like('users.nama', $q);
			$this->db->or_like('users.nik', $q);
			$this->db->or_like('users.email', $q);
			$this->db->or_like('users.no_hp', $q);
			$this->db->or_like('users.alamat', $q);
		}
	}

	public function read($data)
	{
		$this->db->select('users.id as id');
		$this->db->select('CONCAT(cabang.nama_cabang, " - ", kabkot.nama) as nama_cabang');
		$this->db->select('users.nama as nama');
		$this->db->select('users.nik as nik');
		$this->db->select('users.email as email');
		$this->db->select('users.no_hp as no_hp');
		$this->db->select('users.alamat as alamat');
		$this->db->select('users.foto as foto');
		$this->db->select('cabang.id as id_cabang');

		$this->db->where('role', 'petugas');
		$this->__search($data->search);
		$this->db->join('cabang', 'cabang.id = users.cabang_petugas_id');
		$this->db->join('kabkot', 'kabkot.id = cabang.kabkot_id', 'left');
		$this->db->order_by($this->columns[$data->column], $data->dir);
		$this->db->limit($data->length, $data->start);
		return $this->db->get('users')->result();
	}

	function count()
	{
		$query = $this->db->query("SELECT count(id) as total from users where role='petugas';");
		return $query->result()[0]->total;
	}

	function insert_data($data)
	{
		return $this->db->insert("users", $data);
	}

	function update_data($data, $where)
	{
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update("users");
	}

	function delete_data($id)
	{
		$this->db->where("id", $id);
		return $this->db->delete("users");
	}

	function search_petugas($q, $page,$per_page){
		$this->db->select('users.id as id');
		$this->db->select('CONCAT(cabang.nama_cabang, " - ", kabkot.nama) as nama_cabang');
		$this->db->select('users.nama as nama');
		$this->db->select('users.nik as nik');
		$this->db->select('users.email as email');
		$this->db->select('users.no_hp as no_hp');
		$this->db->select('users.alamat as alamat');
		$this->db->select('users.foto as foto');
		$this->db->select('cabang.id as id_cabang');

		$this->db->where('role', 'petugas');
		$this->__search($q);
		$this->db->join('cabang', 'cabang.id = users.cabang_petugas_id');
		$this->db->join('kabkot', 'kabkot.id = cabang.kabkot_id', 'left');
		$this->db->order_by('nama', 'asc');
		$this->db->limit($per_page, ($page-1)*$per_page);
		return $this->db->get('users')->result();
	}

	function count_search_total($q)
	{
		$this->db->select('count(users.id) as total');
		$this->db->where('role', 'petugas');
		$this->__search($q);
		$this->db->join('cabang', 'cabang.id = users.cabang_petugas_id');
		$this->db->join('kabkot', 'kabkot.id = cabang.kabkot_id', 'left');
		return $this->db->get('users')->result()[0]->total;
		
	}

	function count_search($q, $page, $per_page)
	{
		$this->db->select('count(users.id) as total');
		$this->db->where('role', 'petugas');
		$this->__search($q);
		$this->db->join('cabang', 'cabang.id = users.cabang_petugas_id');
		$this->db->join('kabkot', 'kabkot.id = cabang.kabkot_id', 'left');
		$this->db->limit($per_page, ($page-1)*$per_page);
		return $this->db->get('users')->result()[0]->total;
		
	}
}
