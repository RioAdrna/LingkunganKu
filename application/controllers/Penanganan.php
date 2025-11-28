<?php

class Penanganan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("model_penanganan");
		$this->load->model("model_laporan");
	}

	private function __datatablesRequest()
	{
		$resp = new stdClass();
		$order = $_GET['order'] ?? null;
		$resp->search = $_GET['search']['value'];
		$resp->start = ((int)$_GET['start']);
		$resp->length = $_GET['length'];
		$resp->column = $order[0]['column'] ?? "0";
		$resp->dir = $order[0]['dir'] ?? "asc";
		return $resp;
	}

	public function read()
	{
		$dt = $this->__datatablesRequest();
		$res = $this->model_penanganan->read($dt);
		$total = $this->model_penanganan->count();
		$data = [
			'status' => 200,
			'message' => 'Berhasil request',
			"recordsFiltered" => $total,
			"recordsTotal" => $total,
			'data' => $res
		];
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
		return;
	}

	public function kelola_penanganan()
	{
		$laporan        = $this->input->post("selectedLaporan");
		$id_petugas       = $this->input->post("selectedPetugas");
		$status          = $this->input->post("status");

		if ($status == "insert") {
			$data = array(
				"petugas_id"        => $id_petugas,
			);

			$status = $this->model_penanganan->insert_data($data);
			$insert_id = $this->db->insert_id();

			if ($status && $insert_id) {
				$this->model_laporan->update_status_multiple($insert_id, $laporan, "ditugaskan");
				echo json_encode(array(
					"icon"  => "success",
					"judul" => "Berhasil ditambahkan"
				));
			} else
				echo json_encode(array(
					"icon"  => "error",
					"judul" => "Gagal ditambahkan"
				));
		} elseif ($status == "update") {
			$data = array(
				"petugas_id"        => $id_petugas,
			);

			$update = $this->model_penanganan->update_data($this->input->post("id"), $data);
			$this->model_laporan->erase_penanganan_id($this->input->post("id"));
			$this->model_laporan->update_status_multiple($this->input->post("id"), $laporan, "ditugaskan");

			if ($update)
				echo json_encode(array(
					"icon"  => "success",
					"judul" => "Berhasil diupdate"
				));
			else
				echo json_encode(array(
					"icon"  => "error",
					"judul" => "Gagal diupdate"
				));
		}
	}

	public function hapus_penanganan()
	{

		$delete = $this->model_penanganan->delete_data($this->input->post("id"));

		if ($delete)
			echo json_encode(array(
				"icon"  => "success",
				"judul" => "Berhasil dihapus"
			));
		else
			echo json_encode(array(
				"icon"  => "error",
				"judul" => "Gagal dihapus"
			));
	}

	public function search_laporan()
	{
		$q = $this->input->get("q");
		$page = $this->input->get("page");
		$id_penanganan = $this->input->get("id_penanganan");
		$per_page = 10;
		$res = $this->model_laporan->search_laporan($q, $page, $per_page, $id_penanganan);
		$total = $this->model_laporan->count_search_total($q, $id_penanganan);
		$count = count($res);
		$data = [
			'status' => 200,
			'message' => 'Berhasil request',
			'data' => $res,
			'current_page' => (int)$page,
			'has_next_page' => ($per_page * $page) < $total,
			'pagination' => [
				'count' => $count,
				'per_page' => $per_page,
				'total' => $total,
			]
		];
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
		return;
	}

	public function laporan_by_id_penanganan()
	{
		$id = $this->input->get("id");
		$res = $this->model_laporan->list_laporan_by_penanganan_id($id);
		$data = [
			'status' => 200,
			'message' => 'Berhasil request',
			'data' => $res
		];
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
		return;
	}

	public function read_petugas()
	{
		$dt = $this->__datatablesRequest();
		$res = $this->model_penanganan->read_petugas($dt, $this->session->userdata('id_user'));
		$total = $this->model_penanganan->count_petugas($this->session->userdata('id_user'));
		$data = [
			'status' => 200,
			'message' => 'Berhasil request',
			"recordsFiltered" => $total,
			"recordsTotal" => $total,
			'data' => $res
		];
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
		return;
	}

	public function konfirmasi_selesai(){
		$penanganan_id = $this->input->post('penanganan_id');
		$catatan = $this->input->post('catatan');

		if (!$penanganan_id) {
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['status' => 400, 'message' => 'penanganan_id required']));
			return;
		}

		// handle file uploads (lampiran[])
		$uploaded = [];
		if (count($_FILES) > 0 && isset($_FILES['lampiran'])) {
			$this->load->library('upload');
			$files = $_FILES['lampiran'];
			$file_count = count($files['name']);
			for ($i = 0; $i < $file_count; $i++) {
				if (empty($files['name'][$i])) continue;

				$_FILES['userfile']['name']     = $files['name'][$i];
				$_FILES['userfile']['type']     = $files['type'][$i];
				$_FILES['userfile']['tmp_name'] = $files['tmp_name'][$i];
				$_FILES['userfile']['error']    = $files['error'][$i];
				$_FILES['userfile']['size']     = $files['size'][$i];

				$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
				$filename = time() . '_' . $i . '.' . $ext;

				$config['upload_path']   = './assets/img/dokumentasi/';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
				$config['max_size']      = 15000; // 15MB per file
				$config['file_name']     = $filename;

				if (!is_dir($config['upload_path'])) {
					mkdir($config['upload_path'], 0777, true);
				}

				$this->upload->initialize($config);
				if ($this->upload->do_upload('userfile')) {
					$data = $this->upload->data();
					$uploaded[] = $data['file_name'];
				} else {
					log_message('error', 'Upload lampiran error: ' . $this->upload->display_errors('', ''));
				}
			}
		}

		// prepare lampiran value: if multiple, store JSON; if single, store filename; if none, null
		$lampiran_value = null;
		if (count($uploaded) === 1) $lampiran_value = $uploaded[0];
		else if (count($uploaded) > 1) $lampiran_value = json_encode($uploaded);

		// update penanganan record
		$now = date('Y-m-d H:i:s');
		$update = [
			'catatan' => $catatan,
			'lampiran' => $lampiran_value,
			'status_penanganan' => 'selesai',
			'waktu_selesai_ditangani' => $now,
			'waktu_dikonfirmasi_selesai' => $now,
		];

		$ok = $this->model_penanganan->update_data($penanganan_id, $update);

		// mark related laporan as 'selesai'
		$this->db->where('penanganan_id', $penanganan_id);
		$this->db->update('laporan', ['status' => 'selesai']);

		if ($ok) {
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['status' => 200, 'message' => 'Konfirmasi selesai berhasil']));
			return;
		} else {
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['status' => 500, 'message' => 'Gagal menyimpan data']));
			return;
		}
	}
}
