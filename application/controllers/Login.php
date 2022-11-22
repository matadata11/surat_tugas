<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		include_once APPPATH . "../vendor/autoload.php";
		  $google_client = new Google_Client();
		  $google_client->setClientId('456981154521-tdej2oulelhqfmj1s48hvgup1pmum71b.apps.googleusercontent.com'); //masukkan ClientID anda 
		  $google_client->setClientSecret('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'); //masukkan Client Secret Key anda
		  $google_client->setRedirectUri('http://localhost/surat_tugas'); //Masukkan Redirect Uri anda
		  $google_client->addScope('email');
		  $google_client->addScope('profile');

		  if(isset($_GET["code"]))
		  {
		   $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
		   if(!isset($token["error"]))
		   {
		    $google_client->setAccessToken($token['access_token']);
		    $this->session->set_userdata('access_token', $token['access_token']);
		    $google_service = new Google_Service_Oauth2($google_client);
		    $data = $google_service->userinfo->get();
		    $current_datetime = date('Y-m-d H:i:s');
		    $user_data = array(
		      'first_name' => $data['given_name'],
		      'last_name'  => $data['family_name'],
		      'email_address' => $data['email'],
		      'profile_picture'=> $data['picture'],
		      'updated_at' => $current_datetime
		     );
		    $this->session->set_userdata('user_data', $data);
		   }									
		  }
		  $login_button = '';
		  if(!$this->session->userdata('access_token'))
		  {
		  	
		   $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="https://1.bp.blogspot.com/-gvncBD5VwqU/YEnYxS5Ht7I/AAAAAAAAAXU/fsSRah1rL9s3MXM1xv8V471cVOsQRJQlQCLcBGAsYHQ/s320/google_logo.png" /></a>';
		   $data['login_button'] = $login_button;
		   $this->load->view('google_login', $data);
		  }
		  else
		  {
		  	// uncomentar kode dibawah untuk melihat data session email
		  	// echo json_encode($this->session->userdata('access_token')); 
		  	// echo json_encode($this->session->userdata('user_data'));
		   echo "Login success";
		  }
	}
	public function logout()
	 {
	  $this->session->unset_userdata('access_token');

	  $this->session->unset_userdata('user_data');
	  echo "Logout berhasil";
	 }
}