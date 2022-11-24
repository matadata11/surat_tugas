<?php defined('BASEPATH') OR exit('No direct script access allowed');

function checkakun()
{
	$CI =& get_instance();
    if(!$CI->session->userdata('login') == 'OK'){
        redirect('/');
    }
}
