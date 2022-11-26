<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pptk extends Admin_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pegawai', 'pegawai');
        $this->load->model('M_pptk', 'pptk');
        
    }
    

    public function index()
    {
        $this->vars['pptk']	= $this->pptk->getPptk();

        $this->vars['title']    = 'Data PPTK';
        $this->vars['content']  = 'master/pptk';
        $this->load->view('backend/main', $this->vars);
    }

    public function hasil()
	{

        $this->vars['cari'] 		= $this->pegawai->cariOrang();

        $this->vars['title']    	= 'Verval Form Inputan';
        $this->vars['content']  	= 'master/cari_pegawai';
        $this->load->view('backend/main', $this->vars);
    }


    public function store()
	{
		$this->form_validation->set_rules('admin_pptk', 'Admin Pegawai', 'required');
		$this->form_validation->set_rules('nip', 'NIP', 'required');
		$this->form_validation->set_rules('nm_pegawai', 'Nama Pegawai', 'required');
		$this->form_validation->set_rules('anggaran', 'Anggaran', 'required');
		

		if ($this->form_validation->run() == TRUE) {
			if (isset($_POST['submit'])) {
				$admin_pptk 		= $this->input->post('admin_pptk', TRUE);
				$nip 		    	= $this->input->post('nip', TRUE);
				$nm_pegawai 		= $this->input->post('nm_pegawai', TRUE);
				$anggaran 			= $this->input->post('anggaran', TRUE);
				

				$data = [
					'admin_pptk'		=> $admin_pptk,
					'nip'		        => $nip,
					'nm_pegawai'		=> $nm_pegawai,
					'anggaran'			=> $anggaran,
					'created_at'	    => date('Y-m-d')
				];
			}
			$notif = $this->pptk->entry($data);
			if ($notif) {
				$this->session->set_flashdata('notrue', 'Data Berhasil Disimpan.');
			} else {
				$this->session->set_flashdata('nofalse', 'Data Gagal Disimpan.');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function updated()
	{
		$this->form_validation->set_rules('admin_pptk', 'Admin Pegawai', 'required');
		$this->form_validation->set_rules('nip', 'NIP', 'required');
		$this->form_validation->set_rules('nm_pegawai', 'Nama Pegawai', 'required');
		$this->form_validation->set_rules('anggaran', 'Anggaran', 'required');

		if ($this->form_validation->run() == TRUE) {
			if (isset($_POST['submit'])) {
				$id_pptk 		= $this->input->post('id_pptk', TRUE);
				$admin_pptk 	= $this->input->post('admin_pptk', TRUE);
				$nip 		    = $this->input->post('nip', TRUE);
				$nm_pegawai 	= $this->input->post('nm_pegawai', TRUE);
				$anggaran 		= $this->input->post('anggaran', TRUE);

				$data = [
					'id_pptk'	    	=> $id_pptk,
					'admin_pptk'		=> $admin_pptk,
					'nip'		        => $nip,
					'nm_pegawai'		=> $nm_pegawai,
					'anggaran'			=> $anggaran,
					'updated_at'	    => date('Y-m-d')
				];
			}
			$notif = $this->pptk->update($data, $id_pptk);
			if ($notif) {
				$this->session->set_flashdata('notrue', 'Data Berhasil Diupdate.');
			} else {
				$this->session->set_flashdata('nofalse', 'Data Gagal Diupdate.');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	// Hapus data jurusan
	public function deleted()
	{
		$notif = $this->pptk->delete();
		if ($notif) {
			$this->session->set_flashdata('notrue', 'Data Berhasil Dihapus.');
		} else {
			$this->session->set_flashdata('nofalse', 'Data Gagal Dihapus.');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

}

/* End of file Pptk.php */
