<?php
/**
 * Created by PhpStorm.
 * User: admnguewo
 * Date: 18/05/2018
 * Time: 09:35
 */
Class Users extends My_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('secretariat/user_model','user');

        $this->load->model('settings_model','mSet');
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
    public function userList(){
        $this->data['lists']  = $this->mSet->selectTableCriterion('*','user',array('secretariat'=>session_data('secre')),'nom','ASC');
        $this->renderSecretariat('frontpage/secretariat/user/userList','Liste des utilisateurs');
    }

}