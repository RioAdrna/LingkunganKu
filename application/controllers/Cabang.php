
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cabang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_login');
        $this->load->model('model_cabang');
    }

	public function data_cabang(){
		$dt = $this->__datatablesRequest();
        $res = $this->model_cabang->read($dt);
        $total = $this->model_cabang->count();
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

    public function index()
    {
        if ($this->session->userdata('status') == "login" && $this->input->get('req') != "logout") {
            // Kalau sudah login, langsung ke dashboard utama
            redirect(base_url());
        } else {
            // Kalau belum login, tampilkan halaman login
            $this->load->view('login/login');
        }
    }


    public function cek_login()
    {
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);

        // Ambil data user berdasarkan email
        $hasil = $this->Model_login->cek_user(['email' => $email]);

        if ($hasil->num_rows() == 1) {
            $user = $hasil->row();

            // Cek password
            if (password_verify($password, $user->password)) {

                // if (property_exists($user, 'status_user') && $user->status_user != "Y") {
                //     echo json_encode(["sts" => "0", "msg" => "Akun tidak aktif"]);
                //     return;
                // }

                // Ambil role dari database
                $level = $user->role ?? "user";

                $data_session = [
                    'id_user' => $user->id,
                    'nama' => $user->nama,
                    'email' => $user->email,
                    'no_hp' => $user->no_hp,
                    'alamat' => $user->alamat,
                    'foto' => $user->foto,
                    'created_at' => $user->created_at,
                    'status' => 'login',
                    'level' => $level
                ];
                $this->session->set_userdata($data_session);

                echo json_encode(["sts" => "1", "msg" => "Login berhasil!"]);
            } else {
                echo json_encode(["sts" => "0", "msg" => "Password salah"]);
            }
        } else {
            echo json_encode(["sts" => "0", "msg" => "Email tidak ditemukan"]);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
