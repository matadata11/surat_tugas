<?php
class MY_Exceptions extends CI_Exceptions{
    function MY_Exceptions(){
        parent::CI_Exceptions();
    }

    function show_404($page=''){

        $this->config =& get_config();
        $base_url = $this->config['site_url'];

        $_SESSION['error_message'] = 'Error message';
        header("location: ".$base_url.'error.html');
        exit;
    }
}
?>