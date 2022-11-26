<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

    private $_table = 'mt_pegawai';

    // Mengambil data dari database
    public function getPegawai()
    {
    if(!isset($login_button))
    {

        $user_data = $this->session->userdata('user_data');
        $this->db->where('admin_peg', $this->session->userdata('user_data')['name']);
        $this->db->order_by('id_pegawai', 'DESC');
        return $this->db->get($this->_table)->result_array();
        }
        else
        {
        // echo '<div align="center">'.$login_button . '</div>';
        }
    }

     // Insert data ke database
	public function entry($data)
	{
		return $this->db->insert($this->_table, $data);
	}

    // ubah data
    public function update($data, $id_pegawai){
        $query = $this->db->where('id_pegawai', $id_pegawai);
        $query = $this->db->update($this->_table, $data);
        return $query;
    }

    // Menghapus data dari database
	public function delete()
	{
		$key = $this->uri->segment(2);
		return $this->db->delete($this->_table,['id_pegawai' => $key]);
	}

    function get_data_pegawai_bynip($nip){
        $hsl=$this->db->query("SELECT * FROM mt_pegawai WHERE nip='$nip'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'nip' => $data->nip,
                    'nm_pegawai' => $data->nm_pegawai,
                    // 'harga' => $data->harga,
                    // 'satuan' => $data->satuan,
                    );
            }
        }
        return $hasil;
    }

}

/* End of file M_pegawai.php */
