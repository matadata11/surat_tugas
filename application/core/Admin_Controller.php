<?php defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Admin_Controller extends MY_Controller {

    function __construct(){
        parent::__construct();
        // checkakungoogle();
        checkakun();
    }

    public $vars = [
		'navbar' 	=> 'backend/navbarA',
		'sidebar' 	=> 'backend/sidebarA',
	];

}

/* End of file Admin_Controller.php */
