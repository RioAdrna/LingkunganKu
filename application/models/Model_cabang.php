<?php

class Model_cabang extends CI_Model
{
	private $columns = [
		"id",
		"nama_cabang",
		"kabkot",
		"latitude",
		"longitude",
		"created_at"
	];

	private function __search($q)
	{
		if (strlen($q) > 0) {
			$this->db->like('cabang.id ', $q);
			$this->db->or_like('cabang.nama_cabang', $q);
			$this->db->or_like('kabkot.nama', $q);
			$this->db->or_like('cabang.latitude', $q);
			$this->db->or_like('cabang.longitude', $q);
			$this->db->or_like('cabang.created_at', $q);
		}
	}

	public function read($data)
	{
		$this->db->select('cabang.id as id');
		$this->db->select('cabang.nama_cabang as nama_cabang');
		$this->db->select('kabkot.nama as kabkot');
		$this->db->select('cabang.latitude as latitude');
		$this->db->select('cabang.longitude as longitude');
		$this->db->select('cabang.created_at as created_at');
		$this->db->select('cabang.kabkot_id as kabkot_id');

		$this->__search($data->search);
		$this->db->join('kabkot', 'cabang.kabkot_id = kabkot.id');
		$this->db->order_by($this->columns[$data->column], $data->dir);
		$this->db->group_by("id");
		$this->db->limit($data->length, $data->start);
		return $this->db->get('cabang')->result();
	}

	function count()
	{
		$query = $this->db->query("SELECT count(id) as total from cabang;");
		return $query->result()[0]->total;
	}

	function insert_data($data)
    {
        return $this->db->insert("cabang", $data);
    }

	function update_data($data, $where)
    {
        $this->db->set($data);
        $this->db->where($where);
        return $this->db->update("cabang");
    }

	function delete_data($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete("cabang");
    }

}
