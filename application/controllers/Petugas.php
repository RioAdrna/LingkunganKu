<?php

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_lapor");
        $this->load->model("model_kabkot");
        $this->load->model("model_petugas");
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
        $res = $this->model_petugas->read($dt);
        $total = $this->model_petugas->count();
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

    public function kelola_petugas()
    {
        $nik        = $this->input->post("nik");
        $nama       = $this->input->post("nama");
        $email = $this->input->post("email");
        $password  = $this->input->post("password");
        $no_hp  = $this->input->post("no_hp");
        $alamat  = $this->input->post("alamat");
        $id_cabang = $this->input->post("cabang");
        $status          = $this->input->post("status");

        // Load helpers and libraries for validation and upload
        $this->load->library('form_validation');

        // Basic validation rules
        if ($status === 'insert') {
            $this->form_validation->set_rules('nik', 'NIK', 'required');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            // $this->form_validation->set_rules('cabang', 'Cabang', 'required');
            $this->form_validation->set_rules('email', 'Email', 'valid_email');
        } else {
            // update: nik, password, foto optional
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'valid_email');
            // $this->form_validation->set_rules('cabang', 'Cabang', 'required');
        }

        if ($this->form_validation->run() == FALSE) {
            echo json_encode([
                'icon' => 'error',
                'judul' => 'Validasi gagal',
                'message' => validation_errors()
            ]);
            return;
        }

        // Handle file upload if provided
        $foto_name = null;

        // var_dump($_FILES['foto']); die;
        if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './assets/img/profile/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp|gif';
            $config['max_size']      = 5120; // 5MB
            $config['file_name']     = 'user_' . time();
            $config['overwrite']     = false;

            // create directory if not exists
            if (!is_dir(FCPATH . 'assets/img/profile/')) {
                mkdir(FCPATH . 'assets/img/profile/', 0777, true);
            }

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                echo json_encode([
                    'icon' => 'error',
                    'judul' => 'Upload gagal',
                    'message' => $this->upload->display_errors('', '')
                ]);
                return;
            }

            $uploadData = $this->upload->data();
            $foto_name = $uploadData['file_name'];
        }

        if ($status == "insert") {
            $data = array(
                "nik"           => $nik,
                "nama"          => $nama,
                "role"          => "petugas",
                "email"         => $email,
                "password"      => password_hash($password, PASSWORD_BCRYPT),
                "no_hp"         => $no_hp,
                "alamat"        => $alamat
            );

            if (!empty($id_cabang)) {
                $data['cabang_petugas_id'] = $id_cabang;
            }

            if ($foto_name) $data['foto'] = $foto_name;

            $insert = $this->model_petugas->insert_data($data);

            if ($insert)
                echo json_encode(array(
                    "icon"  => "success",
                    "judul" => "Berhasil Menyimpan Petugas"
                ));
            else
                echo json_encode(array(
                    "icon"  => "error",
                    "judul" => "Gagal Menyimpan Petugas"
                ));
        } else if ($status == "update") {
            $id_user = $this->input->post("id");

            // get existing user to possibly remove old foto
            $existing = $this->db->get_where('users', ['id' => $id_user])->row();

            $data = array(
                "nama"          => $nama,
                "email"         => $email,
                "no_hp"         => $no_hp,
                "alamat"        => $alamat
            );

            if (!empty($id_cabang)) {
                $data['cabang_petugas_id'] = $id_cabang;
            }

            if (!empty($password)) {
                $data['password'] = password_hash($password, PASSWORD_BCRYPT);
            }

            if ($foto_name) {
                $data['foto'] = $foto_name;
                // delete old foto if exists and not default
                if (!empty($existing->foto) && $existing->foto != 'no-image.png') {
                    $old_path = './assets/img/profile/' . $existing->foto;
                    if (file_exists($old_path)) unlink($old_path);
                }
            }

            $this->db->where('id', $id_user);
            $update = $this->db->update('users', $data);

            if ($update)
                echo json_encode(array(
                    "icon"  => "success",
                    "judul" => "Berhasil Di Ubah"
                ));
            else
                echo json_encode(array(
                    "icon"  => "error",
                    "judul" => "Gagal Di Ubah"
                ));
        }
    }

    public function hapus_petugas()
    {

        $delete = $this->model_petugas->delete_data($this->input->post("id"));

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

	public function search_petugas()
	{
		$q = $this->input->get("q");
		$page = $this->input->get("page");
		$per_page = 10;
		$res = $this->model_petugas->search_petugas($q, $page, $per_page);
        $total = $this->model_petugas->count_search_total($q);
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
}
