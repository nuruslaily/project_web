<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') != 'admin') {
            $this->session->set_flashdata('pesan' ,'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        
        redirect('Auth/login');
        
        }
    }
    public function index(){
        $data['admin'] = $this->Model_auth->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('Admin/Dashboard', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit_profil($id){
        $where = array('id' =>$id);
        $data['user'] = $this->Model_auth->tampil_data_user_by_id($id);
        $data['user'] = $this->Model_auth->edit_user($where, 'tb_user')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('Admin/edit_profil', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $foto_admin=$_FILES['foto_admin']['name'];
        if ($foto_admin=''){}else{
            $config ['upload_path'] = './uploads';
            $config ['allowed_types']='jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('foto_admin')){
                echo "Gambar Gagal Diupload! (Format Gambar:jpg/jpeg/png/gif)";
            }else{
                $foto_admin=$this->upload->data('file_name');
            }
        }
                
        $data = array(
            'nama' => $nama,
            'nip' => $nip,
            'username' => $username,
            'password' => $password,
            'foto_admin'=>$foto_admin
        );
        $where = array(
            'id' => $id
        );
        $this->Model_auth->update_data($where,$data, 'tb_user');
        
        $this->session->set_flashdata('msg', 'Data Berhasil Di Update');
        redirect('Admin/Dashboard_admin/index');
    }

}

/* End of file Dashboard_admin.php */

?>