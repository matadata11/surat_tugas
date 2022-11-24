<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pptk extends CI_Model {

    private $_table = 'mt_pptk';

    // Mengambil data dari database
    public function getPptk()
    {
        $this->db->select('*');
		$this->db->join('mt_pegawai', 'mt_pegawai.nip = mt_pptk.nip');
		// $this->db->join('mt_instansi', 'mt_instansi.instansi = mt_gtk.instansi');
		$this->db->order_by('id_pptk', 'ASC');
		return $this->db->get($this->_table)->result_array();
    }

    // Insert data ke database
	public function entry($data)
	{
		return $this->db->insert($this->_table, $data);
	}

	// ubah data
    public function update($data, $id_pptk){
        $query = $this->db->where('id_pptk', $id_pptk);
        $query = $this->db->update($this->_table, $data);
        return $query;
    }

	// Menghapus data dari database
	public function delete()
	{
		$key = $this->uri->segment(2);
		return $this->db->delete($this->_table,['id_pptk' => $key]);
	}

}

/* End of file M_pptk.php */
