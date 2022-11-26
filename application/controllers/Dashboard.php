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
        $this->vars['content']  = 'backend/dashboard';
        $this->load->view('backend/main', $this->vars);
    }

}

/* End of file Dashboard.php */
