<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('Form_login');
            $this->load->view('templates/footer');
        }else{

            $cek = $this->Model_auth->cek_login();

            if ($cek == FAlSE) {
                $this->session->set_flashdata('pesan' ,'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password salah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                    redirect ('Auth/login');
                
            }else{
                $this->session->set_userdata('username',$cek->username);
                redirect('Admin/Dashboard_admin');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
        
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username','Username', 'required', ['required' => 'Username Wajib Diisi!']);
        $this->form_validation->set_rules('password','Password', 'required', ['required' => 'Password Wajib Diisi!']);
    }

}

/* End of file Auth.php */

?>