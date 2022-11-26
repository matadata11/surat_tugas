<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_Controller extends MY_Controller {

    function __construct(){
        parent::__construct();
        checkakungoogle();
        // checkakun();
    }

    public $vars = [
		'navbar' 	=> 'public/navbar',
		'sidebar' 	=> 'public/sidebar',
	];

}

/* End of file Public_Controller.php */
