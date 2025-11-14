<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Landing Page';

        $this->load->view('landingpage/header', $data);

        $this->load->view('landingpage/body', $data);
    }

}
