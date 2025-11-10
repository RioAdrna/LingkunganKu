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
                "<button onclick='hapus(\"$laporan->id_laporan\")' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> Hapus </button> &nbsp; &nbsp;" .
                    "<button onclick='ubah(\"$laporan->id_laporan\")' class='btn btn-primary btn-sm'><i class='fas fa-edit'></i> Edit </button>"
            ));
        endforeach;

        echo json_encode($data);
    }
}
