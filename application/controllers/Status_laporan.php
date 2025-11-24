<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status_laporan extends CI_Controller
{
    //Constructor

    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_lapor");
        $this->load->model("model_kabkot");
        date_default_timezone_set("Asia/Jakarta");
    }

    function data_status()
    {
        $data['data'] = array();
        $data_lapor   = $this->model_lapor->data_lapor();
        $no = 1;
        foreach ($data_lapor->result() as $laporan):
            array_push($data['data'], array(

                $no++,
                $laporan->deskripsi,
                $laporan->status,
                "<button onclick='detail(\"$laporan->id_laporan\")' class='btn btn-primary btn-sm'><i class='fas fa-search-plus'></i> Detail</button> &nbsp;"

            ));
        endforeach;

        echo json_encode($data);
    }
}
