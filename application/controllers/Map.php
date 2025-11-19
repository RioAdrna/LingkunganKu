<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Map extends CI_Controller
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
		$this->load->model('model_map');
	}

	public function index()
	{
		$data["jumlah_laporan_average"] = json_encode($this->model_map->jumlah_laporan_average());
		$data["kategori_terbanyak"] = json_encode($this->model_map->kategori_terbanyak());
		$data["jumlah_laporan_average_7"] = json_encode($this->model_map->jumlah_laporan_average_7());
		$data["kategori_terbanyak_7"] = json_encode($this->model_map->kategori_terbanyak_7());
		$data["kategori_laporan"] = $this->model_map->get_kategori();

		$this->load->view('head');
		$this->load->view('map/main.php', $data);
	}

	public function show_pin()
	{
		$request = $this->input->post();
		$res = $this->model_map->get_laporan_by_kategori($request);
		$data = [
			'status' => 200,
			'message' => 'Berhasil request',
			'data' => $res
		];
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
		return;
	}
}
