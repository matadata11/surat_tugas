<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_patch extends Admin_Controller {

    public function index()
    {
        $this->vars['title']        = 'Patch System';
        $this->vars['content']      = 'settings/patch';
        $this->load->view('backend/main', $this->vars);
    }

    public function patchsystem()
    {
        if(isset($_POST['submit'])){
            if(!empty($_FILES['patching']['name'])){ 
                // Set preference 
                $config['upload_path']      = 'system/patch/'; 
                $config['allowed_types']    = 'zip'; 
                $config['max_size']         = 0; // max_size in kb (5 MB)
                $config['file_name']        = $_FILES['patching']['name'];

                // Load upload library 
                $this->load->library('upload',$config); 

                // File upload
                if($this->upload->do_upload('patching')){ 
                    // Get data about the file
                    $uploadData = $this->upload->data(); 
                    $filename = $uploadData['file_name'];

                    ## Extract the zip file ---- start
                    $zip = new ZipArchive;
                    $res = $zip->open("system/patch/".$filename);
                    if ($res === TRUE) {

                        // Unzip path
                        $extractpath = "application/";

                        // Extract file
                        $zip->extractTo($extractpath);
                        $zip->close();

                        $this->session->set_flashdata('msg','Upload & Extract successfully.');
                    } else {
                        $this->session->set_flashdata('msg','Failed to extract.');
                    }
                    ## ---- end

                }else{ 
                    $this->session->set_flashdata('msg','Failed to upload');
                } 
            }else{ 
                $this->session->set_flashdata('msg','Failed to upload');
            } 
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function patchassets()
    {
        if(isset($_POST['submit'])){
            if(!empty($_FILES['patching']['name'])){ 
                // Set preference 
                $config['upload_path']      = 'system/patch/'; 
                $config['allowed_types']    = 'zip'; 
                $config['max_size']         = 0; // max_size in kb (5 MB)
                $config['file_name']        = $_FILES['patching']['name'];

                // Load upload library 
                $this->load->library('upload',$config); 

                // File upload
                if($this->upload->do_upload('patching')){ 
                    // Get data about the file
                    $uploadData = $this->upload->data(); 
                    $filename = $uploadData['file_name'];

                    ## Extract the zip file ---- start
                    $zip = new ZipArchive;
                    $res = $zip->open("system/patch/".$filename);
                    if ($res === TRUE) {

                        // Unzip path
                        $extractpath = "assets/";

                        // Extract file
                        $zip->extractTo($extractpath);
                        $zip->close();

                        $this->session->set_flashdata('msg','Upload & Extract successfully.');
                    } else {
                        $this->session->set_flashdata('msg','Failed to extract.');
                    }
                    ## ---- end

                }else{ 
                    $this->session->set_flashdata('msg','Failed to upload');
                } 
            }else{ 
                $this->session->set_flashdata('msg','Failed to upload');
            } 
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

}

/* End of file Master_patch.php */
