<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends My_Controller
{
    protected $data = array();

    function __construct()
    {
        parent::__construct();

        if(session_data('connect')===true and session_data('admin')===true){
            redirect();
        }
    }

    public function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p style="color:red">',"<p>");
        $this->form_validation->set_rules('login', 'Login', 'trim|required|min_length[1]|max_length[64]|encode_php_tags');
        $this->form_validation->set_rules('pwd', 'Mots de passe', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');

        if($this->form_validation->run())
        {
            if($this->authM->auth($this->input->post('login'), $this->input->post('pwd'))) {
                redirect('admin/Welcome');
            }
            $this->data['error'] = 'Login ou Mot de passe incorrect!';
        }
       // $this->renderhome('auth/index', 'Authentification', ' - ',false);
        $this->load->view('admin/auth/index');
    }

    public function loggout()
    {
        unset_session_data();
        redirect('admin/auth');
    }
}