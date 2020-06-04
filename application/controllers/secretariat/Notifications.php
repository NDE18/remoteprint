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
        if(session_data('connect') == false){
            redirect(base_url('account/signIn'));
        }elseif(session_data('role') == CLIENT or session_data('admin') == true){
            redirect();
        }


    }
    public function index(){

            $this->notif->update();
            $this->data['notifications'] = $this->notif->getNotif();
            $this->renderSecretariat('frontpage/secretariat/notification','Vos notifications');


    }
    public function countNotif(){
        echo count($this->notif->countNotif());
    }
}