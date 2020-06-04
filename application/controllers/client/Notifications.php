<?php
/**
 * Created by PhpStorm.
 * User: alberttheophane
 * Date: 18/12/2017
 * Time: 21:58
 */
Class Notifications extends My_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->model('frontpage/register_model','register');
        if(session_data('connect') == false){
            redirect(base_url('account/signIn'));
        }


    }
    public function index(){
        if(session_data('role') == CLIENT and session_data('admin') !== true){
            $this->notif->update();
            $this->data['notifications'] = $this->notif->getNotif();
            $this->renderFront('frontpage/client/notification','Vos notifications',array('Espace membre'));
        }else if(session_data('admin') === true){
            redirect();
        }else{
            redirect(base_url('secretariat/home'));
        }

    }
    public function countNotif(){
        echo count($this->notif->countNotif());
    }
}