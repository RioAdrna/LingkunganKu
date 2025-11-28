<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utama extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model("model_lapor");
		$this->load->model("model_login");
	}

	public function index()
	{
		if (!empty($_GET['p'])) {
			$page = base64_decode($_GET['p']);

			if ($page == 'login') {
				redirect('login');
			}
		}

		if ($this->session->userdata('status') != "login") {
			$data['title'] = 'Landing Page';
			$this->load->view('landingpage/header', $data);
			$this->load->view('landingpage/body', $data);
		} else {
			// Sudah login → dashboard
			$data = [];

			if ($this->session->userdata('level') === "user") {
				$user_id = $this->session->userdata('user_id');

				$data['jumlah_terkirim'] = $this->db
					->where('user_id', $user_id)
					->where('status', 'terkirim')
					->count_all_results('laporan');

				$data['jumlah_selesai'] = $this->db
					->where('user_id', $user_id)
					->where('status', 'selesai')
					->count_all_results('laporan');

				$data['jumlah_ditolak'] = $this->db
					->where('user_id', $user_id)
					->where('status', 'ditolak')
					->count_all_results('laporan');

				$data['jumlah_proses'] = $this->db
					->where('user_id', $user_id)
					->where('status', 'proses')
					->count_all_results('laporan');
			}
			if (isset($_GET['p'])) {
				if (base64_decode($_GET['p']) == "peta_laporan") {
					$this->load->model('model_map');
					$this->load->model('model_kabkot');
					$data["jumlah_laporan_average"] = json_encode($this->model_map->jumlah_laporan_average());
					$data["kategori_terbanyak"] = json_encode($this->model_map->kategori_terbanyak());
					$data["jumlah_laporan_average_7"] = json_encode($this->model_map->jumlah_laporan_average_7());
					$data["kategori_terbanyak_7"] = json_encode($this->model_map->kategori_terbanyak_7());
					$data["kategori_laporan"] = $this->model_map->get_kategori();

					$data["kabkot"] = $this->model_kabkot->get();
				}

				if (base64_decode($_GET['p']) == "dashboard" && $this->session->userdata('level') === "admin") {
					$data["jumlah_total"] = $this->model_lapor->dashboard_data();
					$data["stat_per_bulan"] = $this->model_lapor->dashboard_stat();
					$data["stat_kategori"] = $this->model_lapor->dashboard_stat2();
					$data["stat_kabkot"] = $this->model_lapor->dashboard_stat3();
				}

				if (base64_decode($_GET['p']) == "cabang" && $this->session->userdata('level') === "admin") {
					$this->load->model('model_kabkot');
					$data["kabkot"] = $this->model_kabkot->get();
				}
			} else if ($this->session->userdata('level') === "admin") {
				$data["jumlah_total"] = $this->model_lapor->dashboard_data();
				$data["stat_per_bulan"] = $this->model_lapor->dashboard_stat();
				$data["stat_kategori"] = $this->model_lapor->dashboard_stat2();
				$data["stat_kabkot"] = $this->model_lapor->dashboard_stat3();
			}
			$this->load->view('head', $data);
			$this->load->view('body', $data);
		}
	}
}
