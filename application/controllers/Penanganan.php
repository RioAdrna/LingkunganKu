<?php

class Penanganan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_lapor");
        $this->load->model("model_kabkot");
        $this->load->model("model_petugas");
        $this->load->model("model_penanganan");
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
}
