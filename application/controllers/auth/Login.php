<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('auth/welcome_message');
		
	}

    public function checklogin()
    {
        if(isset($_POST['submit'])){
			$email 	    = htmlspecialchars($this->input->post('email', TRUE));
			$password 		= $this->input->post('password', TRUE);

			$account = $this->db->get_where('mt_admin', ['email' => $email])->row_array();

			if($account){
				// admin ada
				if($account['is_active'] == 1){
					// Cek Password
					if(password_verify($password, $account['password'])){
						$data = [
							'id_admin'	        => $account['id_admin'],
							'fullname'	        => $account['fullname'],
							'email'	    		=> $account['email'],
							'role'	    		=> $account['role'],
							'login'		        => 'OK',
						];
						$this->session->set_userdata($data);
						redirect('dashboard');
					}else{
						// Password Salah
						$this->session->set_flashdata('notif_false','Maaf, Password Yang Anda Masukan Salah.');
						redirect($_SERVER['HTTP_REFERER']);
					}
				}else{
					// Email belum di aktivasi
					$this->session->set_flashdata('notif_false','Email Belum Aktif');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}else{
				// Email Tidak Terdaftar
				$this->session->set_flashdata('notif_false','Maaf, Email Anda Gunakan Belum Terdaftar.');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }

	public function logout2()
    {
        $this->session->sess_destroy();
        redirect('/');
    }

	public function checkgtk()
    {
        if(isset($_POST['submit'])){
			$email 	    	= htmlspecialchars($this->input->post('email', TRUE));
			$password 		= $this->input->post('password', TRUE);

			$account = $this->db->get_where('mt_gtk', ['email' => $email])->row_array();

			if($account){
				// admin ada
				if($account['is_active'] == 1){
					// Cek Password
					if(password_verify($password, $account['password'])){
						$data = [
							'id_gtk'	        => $account['id_gtk'],
							'nama'	        	=> $account['nama'],
							'instansi'	        => $account['instansi'],
							'email'	    		=> $account['email'],
							'level'	        	=> $account['level'],
							'lat_kantor'	    => $account['lat_kantor'],
							'long_kantor'	    => $account['long_kantor'],
							'photo_gtk'	    	=> $account['photo_gtk'],
							'login'		        => 'KuOke',
						];
						$this->session->set_userdata($data);
						redirect('home');
					}else{
						// Password Salah
						$this->session->set_flashdata('notif_false','Maaf, Password Yang Anda Masukan Salah.');
						redirect($_SERVER['HTTP_REFERER']);
					}
				}else{
					// Email belum di aktivasi
					$this->session->set_flashdata('notif_false','Email Belum Aktif');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}else{
				// Email Tidak Terdaftar
				$this->session->set_flashdata('notif_false','Maaf, Email Anda Gunakan Belum Terdaftar.');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

}

/* End of file Login.php */
