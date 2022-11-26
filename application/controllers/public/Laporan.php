<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends Public_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('', '');
        
    }
    

    public function index()
    {
        $this->vars['title']    = 'Pelaporan Perjalanan Dinas';
        $this->vars['content']  = 'master/laporan';
        $this->load->view('public/main', $this->vars);
    }

}

/* End of file Laporan.php */
