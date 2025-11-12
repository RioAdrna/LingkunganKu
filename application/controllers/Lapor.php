<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapor extends CI_Controller
{
    //Constructor

    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_lapor");
        date_default_timezone_set("Asia/Jakarta");
    }

    function forum_laporan(){
        $this->load->view('head');
		$this->load->view('forum/main.php');
    }

    function data_lapor()
    {
        $data['data'] = array();
        $data_lapor   = $this->model_lapor->data_lapor();
        $no = 1;
        foreach ($data_lapor->result() as $laporan):
            array_push($data['data'], array(
                "",
                $no++,
                $laporan->deskripsi,
                "<button onclick='detail(\"$laporan->id_laporan\")' class='btn btn-primary btn-sm'><i class='fas fa-search-plus'></i> Detail</button> &nbsp;"

            ));
        endforeach;

        echo json_encode($data);
    }

    public function tambah_laporan()
    {
        $kategori        = $this->input->post("kategori");
        $deskripsi       = $this->input->post("deskripsi");
        $tanggal_laporan = $this->input->post("tanggal_laporan");
        $foto            = $this->input->post("nm_file");
        $status          = $this->input->post("status");

        if ($status == "insert") {
            $data = array(
                "kategori"         => $kategori,
                "deskripsi"        => $deskripsi,
                "tanggal_laporan"  => $tanggal_laporan,
                "foto"             => $foto
            );

            $insert = $this->model_lapor->insert_data($data);

            if ($insert)
                echo json_encode(array(
                    "icon"  => "success",
                    "judul" => "Berhasil Di Upload"
                ));
            else
                echo json_encode(array(
                    "icon"  => "error",
                    "judul" => "Gagal Di Upload"
                ));
        } else if ($status == "update") {
            $id_laporan = $this->input->post("id");
            $data = array(
                "kategori"         => $kategori,
                "deskripsi"        => $deskripsi,
                "tanggal_laporan"  => $tanggal_laporan,
                "foto"             => $foto
            );

            $where  = array("id_laporan" => $id_laporan);
            $update = $this->model_lapor->update_data($data, $where);

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


    //UPLOAD FILE
    public function upload_file()
    {
        if ($this->input->get("file")) {
            $path = $this->input->get("file");
        } else {
            $path = $_FILES['file_foto']['name'];
        }
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $filename = time() . "." . $ext;

        $config['upload_path']          = './assets/img/dokumentasi/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 7000;
        $config['file_name']            = $filename;
        $this->load->library('upload', $config);

        $this->upload->overwrite = true;

        if (! $this->upload->do_upload('file_foto')) {
            $res = array('sts' => "0", 'msg' => $this->upload->display_errors());
        } else {
            // $data = array('sts' => $this->upload->data());
            $res = array('sts' => '1', 'msg' => "SUKSES", "nm_file" => $filename);
        }

        echo json_encode($res);
    }

    public function hapus_file()
    {
        $file = $this->input->post("nm_file");

        unlink("./assets/img/dokumentasi/$file");
        echo json_encode(array("status" => "Foto berhasil dihapus"));
    }

    public function detail_laporan()
    {
        $id_laporan           = $this->input->post('id');
        $data_lapor   = $this->model_lapor->data_lapor($id_laporan)->row();

        echo json_encode($data_lapor);
    }
}
