<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		include_once APPPATH . "../vendor/autoload.php";
		  $google_client = new Google_Client();
		  $google_client->setClientId('67743246176-3nbpdjmjcv771g0lvlfin4ed0ebuui2u.apps.googleusercontent.com'); //masukkan ClientID anda 
		  $google_client->setClientSecret('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'); //masukkan Client Secret Key anda
		  $google_client->setRedirectUri('http://localhost:8080/surat_tugas/'); //Masukkan Redirect Uri anda
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
		  	
		   $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="https://onymos.com/wp-content/uploads/2020/10/google-signin-button-1024x260.png" style="width:22rem;margin-top:-10px;" /></a>';
		   $data['login_button'] = $login_button;
		   $this->load->view('welcome_message', $data);
		   
		  }
		  else
		  {
		  	// uncomentar kode dibawah untuk melihat data session email
		  	// echo json_encode($this->session->userdata('access_token')); 
		  	// echo json_encode($this->session->userdata('user_data'));
			  redirect('Dashboard');
			
		//    echo "Login success";
		   
		  }
		  
	}
	public function logout()
	 {
	  $this->session->unset_userdata('access_token');

	  $this->session->unset_userdata('user_data');
	  echo "Logout berhasil";
	  redirect('/');
	 }
}