<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('Model_register');
    }

    public function index()
    {
        $this->load->view('login/register');
    }

    public function submit()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $ulang = $this->input->post('ulang');
        $nik = $this->input->post('nik');

        if (!$nama || !$email || !$password || !$ulang || !$nik) {
            echo json_encode(['sts' => 0, 'msg' => 'Semua field wajib diisi']);
            return;
        }

        if ($password !== $ulang) {
            echo json_encode(['sts' => 0, 'msg' => 'Password tidak sama']);
            return;
        }

        if ($this->db->where('nik', $nik)->get('user')->num_rows() > 0) {
            echo json_encode([
                "sts" => 0,
                "msg" => "NIK sudah digunakan"
            ]);
            return;
        }

        if ($this->Model_register->cek_email($email)) {
            echo json_encode(['sts' => 0, 'msg' => 'Email sudah digunakan']);
            return;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'nama' => $nama,
            'email' => $email,
            'nik' => $nik,
            'password' => $hash,
            'role' => 'user',
            'no_hp' => null,
            'alamat' => null,
            'foto' => 'no-image.png',
            'created_at' => date("Y-m-d H:i:s"),
        ];

        if ($this->Model_register->register($data)) {
            echo json_encode(['sts' => 1, 'msg' => 'Registrasi berhasil']);
        } else {
            echo json_encode(['sts' => 0, 'msg' => 'Gagal menyimpan data']);
        }
    }
}
