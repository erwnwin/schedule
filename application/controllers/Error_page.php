<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Error_page extends CI_Controller
{

    public function index()
    {

        $data['title'] = "Upsss! Sorry";
        $this->load->view('404_page', $data);
        
    }
}

/* End of file Error_page.php */
