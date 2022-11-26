<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiA extends Admin_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pegawai', 'pegawai');
        
    }
    

    public function index()
    {
        $this->vars['pegawai']	= $this->pegawai->getPegawai();

        $this->vars['title']    = 'Data Pegawai';
        $this->vars['content']  = 'master/pegawai';
        $this->load->view('backend/mainA', $this->vars);
    }
    
    public function store()
	{
		$this->form_validation->set_rules('admin_peg', 'Admin Pegawai', 'required');
		$this->form_validation->set_rules('nm_pegawai', 'Nama Pegawai', 'required');
		$this->form_validation->set_rules('nip', 'NIP', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('pg', 'Pangkat / Gol', 'required');
		$this->form_validation->set_rules('status', 'Statuys', 'required');

		if ($this->form_validation->run() == TRUE) {
			if (isset($_POST['submit'])) {
				$admin_peg 		= $this->input->post('admin_peg', TRUE);
				$nm_pegawai 	= $this->input->post('nm_pegawai', TRUE);
				$nip 		    = $this->input->post('nip', TRUE);
				$jabatan 		= $this->input->post('jabatan', TRUE);
				$pg 		    = $this->input->post('pg', TRUE);
				$status 		= $this->input->post('status', TRUE);

				$data = [
					'admin_peg'		    => $admin_peg,
					'nm_pegawai'		=> $nm_pegawai,
					'nip'		        => $nip,
					'jabatan'		    => $jabatan,
					'pg'		        => $pg,
					'status'		    => $status,
					'created_at'	    => date('Y-m-d')
				];
			}
			$notif = $this->pegawai->entry($data);
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
		$this->form_validation->set_rules('admin_peg', 'Admin Pegawai', 'required');
		$this->form_validation->set_rules('nm_pegawai', 'Nama Pegawai', 'required');
		$this->form_validation->set_rules('nip', 'NIP', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('pg', 'Pangkat / Gol', 'required');
		$this->form_validation->set_rules('status', 'Statuys', 'required');

		if ($this->form_validation->run() == TRUE) {
			if (isset($_POST['submit'])) {
				$id_pegawai 	= $this->input->post('id_pegawai', TRUE);
				$admin_peg 		= $this->input->post('admin_peg', TRUE);
				$nm_pegawai 	= $this->input->post('nm_pegawai', TRUE);
				$nip 		    = $this->input->post('nip', TRUE);
				$jabatan 		= $this->input->post('jabatan', TRUE);
				$pg 		    = $this->input->post('pg', TRUE);
				$status 		= $this->input->post('status', TRUE);

				$data = [
					'id_pegawai'	    => $id_pegawai,
					'admin_peg'		    => $admin_peg,
					'nm_pegawai'		=> $nm_pegawai,
					'nip'		        => $nip,
					'jabatan'		    => $jabatan,
					'pg'		        => $pg,
					'status'		    => $status,
					'updated_at'	    => date('Y-m-d')
				];
			}
			$notif = $this->pegawai->update($data, $id_pegawai);
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
		$notif = $this->pegawai->delete();
		if ($notif) {
			$this->session->set_flashdata('notrue', 'Data Berhasil Dihapus.');
		} else {
			$this->session->set_flashdata('nofalse', 'Data Gagal Dihapus.');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

    // import Excel
    public function import_excel()
	{
		$id_pegawai    				= $this->input->post('id_pegawai', TRUE);
		$admin_peg    			    = $this->input->post('admin_peg', TRUE);

		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$config['upload_path'] 		= realpath('assets/excel/');
		$config['allowed_types'] 	= 'xlsx|xls|csv';
		$config['max_size'] 		= 0;
		$config['encrypt_name'] 	= false;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('dataexcel')) {
			$this->session->set_flashdata('notif_false', 'Ditambahkan');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$data_upload       = $this->upload->data();
			$excelreader       = new PHPExcel_Reader_Excel2007();
			$loadexcel         = $excelreader->load('assets/excel/' . $data_upload['file_name']);
			$sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

			$data = array();
			$numrow = 1;
			foreach ($sheet as $row) {
				if ($numrow > 1) {
					array_push($data, array(
						'id_pegawai'   			=> $id_pegawai,
						'admin_peg'   		    => $admin_peg,
						'nm_pegawai'			=> $row['A'],
						'nip'			        => $row['B'],
						'jabatan'			    => $row['C'],
						'pg'			        => $row['D'],
						'status'			    => $row['E'],
						'created_at'    		=> date('Y-m-d H:m:s')
					));
				}
				$numrow++;
			}
			$notif = $this->db->insert_batch('mt_pegawai', $data);
			unlink(realpath('assets/excel/' . $data_upload['file_name']));
			if ($notif) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"id="notifications"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p> Data GTK Berhasil Di Upload</p></div>');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"id="notifications"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p> Data GTK Gagal di Upload</p></div>');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	// menampilkan data otomaTIS
	function get_pegawai(){
        $nip=$this->input->post('nip');
        $data=$this->pegawai->get_data_pegawai_bynip($nip);
        echo json_encode($data);
    }
}

/* End of file Pegawai.php */
