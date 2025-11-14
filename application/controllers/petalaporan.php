<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class petalaporan extends CI_Controller {

    public function index()
    {
        $this->load->view('peta_laporan');
    }
}