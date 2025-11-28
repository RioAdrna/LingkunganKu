<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class petalaporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_map');
    }

    public function index()
    {
        $data = [
            "kabkot"                    => $this->db->get("kabkot")->result(),
            "kategori_laporan"         => $this->Model_map->get_kategori(),
            "jumlah_laporan_average"   => json_encode($this->Model_map->jumlah_laporan_average()),
            "kategori_terbanyak"       => json_encode($this->Model_map->kategori_terbanyak()),
            "jumlah_laporan_average_7" => json_encode($this->Model_map->jumlah_laporan_average_7()),
            "kategori_terbanyak_7"     => json_encode($this->Model_map->kategori_terbanyak_7()),
        ];

        $this->load->view('peta_laporan', $data);
    }

    // ==============================================================
    //          ENDPOINT UTAMA UNTUK TAMPILKAN PIN / MARKER
    // ==============================================================

    public function show_pin()
    {
        $filters = [
            "kategori_id"       => $this->input->post("kategori_id"),
            "tanggal_awal"      => $this->input->post("tanggal_awal"),
            "tanggal_akhir"     => $this->input->post("tanggal_akhir"),
            "kabkot_id"         => $this->input->post("kabkot_id"),
            "tingkat_keparahan" => $this->input->post("tingkat_keparahan"),
            "status"            => $this->input->post("status"),
        ];

        // PANGGIL MODEL KAMU (yang tidak diubah sama sekali)
        $result = $this->Model_map->get_laporan_by_kategori($filters);

        echo json_encode([
            "data" => $result
        ]);
    }

    public function show_cabang()
    {
        // Load model cabang jika belum diload
        $this->load->model('model_cabang');

        // Ambil semua cabang + kabkot
        $data = $this->db
            ->select("cabang.*, kabkot.nama as kabkot_nama")
            ->from("cabang")
            ->join("kabkot", "kabkot.id = cabang.kabkot_id", "left")
            ->get()
            ->result();

        echo json_encode($data);
    }

}
