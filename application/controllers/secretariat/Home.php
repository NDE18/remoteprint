<?php
/**
 * Created by PhpStorm.
 * User: alberttheophane
 * Date: 18/12/2017
 * Time: 21:58
 */
Class Home extends My_Controller
{
    function __construct()
    {
        parent::__construct();
          if(session_data('connect') == false){
            redirect(base_url('account/signIn'));
        }elseif(session_data('role') == CLIENT or session_data('admin') == true){
            redirect();
        }
    }
    public function index(){
        $this->renderSecretariat('frontpage/secretariat/index','accueil');
    }

}