<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_tugas extends Public_Controller {

    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_st', 'surat_tugas');
        
    }
    

    public function index()
    {
        
        $this->vars['st'] 		= $this->surat_tugas->get_surat();

        $this->vars['title']    = 'Halaman Surat tugas';
        $this->vars['content']  = 'master_surat/surat_tugas';
        $this->load->view('backend/main', $this->vars);
    }

    public function store()
	{
		$this->form_validation->set_rules('admin_surat', 'Admin Pegawai', 'required');
		$this->form_validation->set_rules('nip', 'NIP', 'required');
		$this->form_validation->set_rules('nm_pegawai', 'Nama Pegawai', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal ST', 'required');
		$this->form_validation->set_rules('sampai', 'Tanggal ST', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan Perjalanan Dinas', 'required');
		

		if ($this->form_validation->run() == TRUE) {
			if (isset($_POST['submit'])) {
				$admin_surat 		= $this->input->post('admin_surat', TRUE);
				$nip 		        = $this->input->post('nip', TRUE);
				$nm_pegawai 	    = $this->input->post('nm_pegawai', TRUE);
				$tanggal 	        = $this->input->post('tanggal', TRUE);
				$sampai 	        = $this->input->post('sampai', TRUE);
				$keterangan 	    = $this->input->post('keterangan', TRUE);

				$data = [
					'admin_surat'		=> $admin_surat,
					'nip'		        => $nip,
					'nm_pegawai'		=> $nm_pegawai,
					'tanggal'		    => $tanggal,
					'sampai'		    => $sampai,
					'keterangan'		=> $keterangan,
					'created_at'	    => date('Y-m-d')
				];
			}
			$notif = $this->db->get_where('dt_surat', ['nm_pegawai' => $nm_pegawai,'tanggal' => $tanggal])->row_array();
			if($notif){
				$this->session->set_flashdata('notif_false', '<div class="alert alert-danger  alert-dismissible fade show" role="alert" id="notifications"><i class="mdi mdi-check-all me-2"></i> Anda Sudah ada pada tanggal ini  . </div>');
			}else{
				$notif  = $this->surat_tugas->entry($data);
			}
			if($notif){
				$this->session->set_flashdata('notif_true', 'Terima Kasih');
				$this->session->set_flashdata('audio', site_url('public/audio/terimakasih.mp3'));
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

    public function updated()
	{
		// $this->form_validation->set_rules('anggota1', 'anggota1', 'required');
		// $this->form_validation->set_rules('nip1', 'nip1', 'required');

        // $this->form_validation->set_rules('anggota2', 'anggota2', 'required');
		// $this->form_validation->set_rules('nip2', 'nip2', 'required');

        // $this->form_validation->set_rules('anggota3', 'anggota3', 'required');
		// $this->form_validation->set_rules('nip3', 'nip3', 'required');
		

		// if ($this->form_validation->run() == TRUE) {
			if (isset($_POST['submit'])) {
				$id_surat 	    = $this->input->post('id_surat', TRUE);
				$anggota1 		= $this->input->post('anggota1', TRUE);
				$nip1 		    = $this->input->post('nip1', TRUE);
                $anggota2 		= $this->input->post('anggota2', TRUE);
				$nip2 		    = $this->input->post('nip2', TRUE);
                $anggota3 		= $this->input->post('anggota3', TRUE);
				$nip3 		    = $this->input->post('nip3', TRUE);
				

				$data = [
					'id_surat'	        => $id_surat,
					'anggota1'		    => $anggota1,
					'nip1'		        => $nip1,
                    'anggota2'		    => $anggota2,
					'nip2'		        => $nip2,
                    'anggota3'		    => $anggota3,
					'nip3'		        => $nip3
					
				];
			}
			$notif = $this->surat_tugas->update($data, $id_surat);
			if ($notif) {
				$this->session->set_flashdata('notrue', 'Data Berhasil Diupdate.');
			} else {
				$this->session->set_flashdata('nofalse', 'Data Gagal Diupdate.');
			}
			redirect($_SERVER['HTTP_REFERER']);
		// }
	}
	

	 // Hapus data jurusan
	public function destroy()
	{
		$notif = $this->surat_tugas->delete();
		if ($notif) {
			$this->session->set_flashdata('notrue', 'Data Berhasil Dihapus.');
		} else {
			$this->session->set_flashdata('nofalse', 'Data Gagal Dihapus.');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

}

/* End of file Surat_tugas.php */
