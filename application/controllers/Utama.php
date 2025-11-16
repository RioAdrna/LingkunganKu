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
			$this->load->view('head');
			$this->load->view('body');
		}
	}
}
