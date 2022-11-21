<?php defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Admin_Controller extends MY_Controller {

    function __construct(){
        parent::__construct();
        checkakun();
    }

    public $vars = [
		'navbar' 	=> 'backend/navbar',
		'sidebar' 	=> 'backend/sidebar',
	];

}

/* End of file Admin_Controller.php */
