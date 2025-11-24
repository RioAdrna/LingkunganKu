<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_login'); // ganti kalau model registrasi berbeda
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        // Tampilkan halaman register
        $this->load->view('login/register'); // pastikan file view-nya sudah dibuat
    }

    public function proses_register()
    {
        $nama       = $this->input->post('nama', TRUE);
        $email      = $this->input->post('email', TRUE);
        $password   = $this->input->post('password', TRUE);
        $no_hp      = $this->input->post('no_hp', TRUE);
        $alamat     = $this->input->post('alamat', TRUE);
        
        $cek = $this->Model_login->cek_user(['email' => $email]);

        if ($cek->num_rows() > 0) {
            echo json_encode(["sts" => "0", "msg" => "Email sudah terdaftar!"]);
            return;
        }

        $data = [
            'nama'       => $nama,
            'email'      => $email,
            'password'   => password_hash($password, PASSWORD_DEFAULT),
            'no_hp'      => $no_hp,
            'alamat'     => $alamat,
            'role'       => 'user',
            'created_at' => date('Y-m-d H:i:s')
        ];

        $insert = $this->Model_login->insert_user($data);

        if ($insert) {
            echo json_encode(["sts" => "1", "msg" => "Registrasi berhasil!"]);
        } else {
            echo json_encode(["sts" => "0", "msg" => "Registrasi gagal"]);
        }
    }
}
