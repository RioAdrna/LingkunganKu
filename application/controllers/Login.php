<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_login');
        date_default_timezone_set("Asia/Jakarta");
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
            if ($password == $user->password) { //Nyoba doang, nanti ganti aja lagi

                // --- CEK STATUS USER ---
                // Cek apakah kolom status_user ada
                if (property_exists($user, 'status_user')) {
                    if ($user->status_user != "Y") {
                        echo json_encode(["sts" => "0", "msg" => "Akun tidak aktif"]);
                        return;
                    }
                }
                // --- END CEK STATUS ---

                // Tentukan role dari kolom id_ug (atau ubah sesuai struktur database)
                $level = "user"; // default
                if (isset($user->id_ug)) {
                    if ($user->id_ug == "1") {
                        $level = "admin";
                    } elseif ($user->id_ug == "2") {
                        $level = "petugas";
                    }
                }

                // Set session
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
        redirect('login');
    }
}
