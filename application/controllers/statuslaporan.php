<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class statuslaporan extends CI_Controller {

    public function index()
    {
        $this->load->view('status_laporan');
    }
}