<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_lapor");
        $this->load->model("model_kabkot");
        date_default_timezone_set("Asia/Jakarta");
    }

    public function data_status()
    {
        // Ambil ID user & level dari session
        $id_user = $this->session->userdata('id_user');
        $level   = $this->session->userdata('level');

        // Jika tidak login → kembalikan kosong
        if (!$id_user) {
            echo json_encode(['data' => []]);
            return;
        }

        // ADMIN = melihat semua data
        if ($level === "admin") {
            $data_lapor = $this->model_lapor->data_lapor();
        }
        // USER = hanya melihat laporannya sendiri
        else {
            $data_lapor = $this->model_lapor->data_lapor_by_user($id_user);
        }

        // Format data untuk datatable
        $data['data'] = [];
        $no = 1;
        foreach ($data_lapor->result() as $laporan) {

            // Tombol detail
            $btnDetail = "<button onclick='detail(\"$laporan->id_laporan\")' 
                    class='btn btn-primary btn-sm'>
                    <i class='fas fa-search-plus'></i> Detail
                  </button>";
            $status_badge = '';

            switch (strtoupper($laporan->status)) {
                case 'BELUM DITANGANI':
                    $status_badge = '<span class="badge bg-secondary">' . $laporan->status . '</span>';
                    break;

                case 'DITUGASKAN':
                    $status_badge = '<span class="badge bg-primary">' . $laporan->status . '</span>';
                    break;

                case 'SUDAH DITANGANI':
                    $status_badge = '<span class="badge bg-success">' . $laporan->status . '</span>';
                    break;

                case 'SELESAI':
                    $status_badge = '<span class="badge bg-info">' . $laporan->status . '</span>';
                    break;

                case 'DITOLAK':
                    $status_badge = '<span class="badge bg-danger">' . $laporan->status . '</span>';
                    break;

                default:
                    $status_badge = '<span class="badge bg-dark">' . $laporan->status . '</span>';
                    break;
            }

            $data['data'][] = [
                $no++,
                $laporan->deskripsi,
                $status_badge,
                $btnDetail
            ];
        }


        echo json_encode($data);
    }
}
