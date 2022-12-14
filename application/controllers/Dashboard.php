<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Public_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_st', 'surat_tugas');
        
    }
    
    public function index()
    {

        $this->vars['st'] 		= $this->surat_tugas->get_surat();

        $this->vars['title']    = 'Dashboard';
        $this->vars['content']  = 'public/dashboard';
        $this->load->view('public/main', $this->vars);
    }

}

/* End of file Dashboard.php */
