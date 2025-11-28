<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_profile');
    }

    public function update()
    {
        $id       = $this->session->userdata("id_user");
        $nama     = $this->input->post("nama");
        $nik     = $this->input->post("nik");
        $email    = $this->input->post("email");
        $no_hp    = $this->input->post("no_hp");
        $alamat   = $this->input->post("alamat");

        $data = [
            "nama"   => $nama,
            "nik"   => $nik,
            "email"  => $email,
            "no_hp"  => $no_hp,
            "alamat" => $alamat
        ];

        $update = $this->Model_profile->update_profile($id, $data);

        if ($update) {

            $this->session->set_userdata($data);

            $res = [
                "sts" => "1",
                "msg" => "Profile berhasil diperbarui!"
            ];
        } else {
            $res = [
                "sts" => "0",
                "msg" => "Gagal memperbarui data."
            ];
        }

        echo json_encode($res);
    }

    public function upload_foto()
    {
        $id_user  = $this->session->userdata("id_user");
        $old_foto = $this->input->post("old_foto");

        $config['upload_path']   = './assets/img/profile/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['file_name']     = "user_" . $id_user . "_" . time();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            echo json_encode([
                "sts" => "0",
                "msg" => $this->upload->display_errors('', '')
            ]);
            return;
        }

        $uploadData = $this->upload->data();
        $new_foto = $uploadData['file_name'];

        if ($old_foto && $old_foto != "no-image.png") {
            $old_path = './assets/img/profile/' . $old_foto;
            if (file_exists($old_path)) unlink($old_path);
        }
        $update = $this->Model_profile->update_profile($id_user, [
            "foto" => $new_foto
        ]);

        if ($update) {
            $this->session->set_userdata("foto", $new_foto);

            echo json_encode([
                "sts" => "1",
                "msg" => "Foto berhasil diperbarui!"
            ]);
        } else {
            echo json_encode([
                "sts" => "0",
                "msg" => "Gagal update foto!"
            ]);
        }
    }
}
