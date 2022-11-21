<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Mobile_Controller extends MY_Controller {

    function __construct(){
        parent::__construct();
    }

    public $vars = [
		'header' 	=> 'mobile/header',
		'navbar' 	=> 'mobile/navbar',
	];

}

/* End of file Mobile_Controller.php */
