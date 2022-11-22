<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_st extends CI_Model {

    private $_table = 'dt_surat';

    // Mengambil data dari database
    public function get_surat()
    {
        $this->db->select('*');
		$this->db->join('mt_pegawai', 'mt_pegawai.nip = dt_surat.nip');
		// $this->db->join('mt_instansi', 'mt_instansi.instansi = mt_gtk.instansi');
		$this->db->order_by('id_surat', 'ASC');
		return $this->db->get($this->_table)->result_array();
    }

    // Insert data ke database
	public function entry($data)
	{
		return $this->db->insert($this->_table, $data);
	}

    public function update($data, $id_surat){
        $query = $this->db->where('id_surat', $id_surat);
        $query = $this->db->update($this->_table, $data);
        return $query;
    }

    public function delete(){
        $query = $this->db->delete($this->_table, ['id_surat' => __uri(2)]);
        return $query;
    }

}

/* End of file M_st.php */
