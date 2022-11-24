<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('', '');
        
    }
    
    public function index()
    {
        $this->vars['title']    = 'Dashboard';
        $this->vars['content']  = 'backend/dashboard';
        $this->load->view('backend/main', $this->vars);
    }

}

/* End of file Dashboard.php */
