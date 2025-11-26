
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

    public function data_cabang()
    {
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

    public function tambah_cabang()
    {
        $nama_cabang        = $this->input->post("nama_cabang");
        $kabkot_id       = $this->input->post("kabkot_id");
        $latitude       = $this->input->post("latitude");
        $longitude       = $this->input->post("longitude");
        $status          = $this->input->post("status");

        if ($status == "insert") {
            $data = array(
                "nama_cabang"    => $nama_cabang,
                "kabkot_id"        => $kabkot_id,
                "longitude"        => $longitude,
                "latitude"        => $latitude,
            );

            $insert = $this->model_cabang->insert_data($data);

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
                "nama_cabang"    => $nama_cabang,
                "kabkot_id"        => $kabkot_id,
                "longitude"        => $longitude,
                "latitude"        => $latitude,
            );

            $where  = array("id" => $id_laporan);
            $update = $this->model_cabang->update_data($data, $where);

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

    public function hapus_cabang()
    {

        $delete = $this->model_cabang->delete_data($this->input->post("id"));

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

	public function get_cabang(){
        // Accept query from Select2: usually 'q' or 'term'
        $term = $this->input->get('q');
        if ($term === null) $term = $this->input->get('term');
		if ($term === null) $term = '';

        // Use provided helper to fetch raw cabang rows
        $rows = $this->model_cabang->src($term);

        $out = [];
        if (is_array($rows) || is_object($rows)) {
            foreach ($rows as $r) {
                // determine id and name fields flexibly
                $id = isset($r->id) ? $r->id : (isset($r->id_cabang) ? $r->id_cabang : null);
                $nama = isset($r->nama) ? $r->nama : (isset($r->nama_cabang) ? $r->nama_cabang : '');

                if ($term) {
                    if (stripos($nama, $term) !== false || stripos((string)$id, $term) !== false) {
                        $out[] = ['id' => $id, 'nama' => $nama];
                    }
                } else {
                    $out[] = ['id' => $id, 'nama' => $nama];
                }
            }
        }

        // Return JSON array (client-side maps to {id,text} as needed)
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($out));
        return;
    }
}
