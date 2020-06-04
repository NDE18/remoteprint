<?php
/**
 * Created by PhpStorm.
 * User: alberttheophane
 * Date: 18/12/2017
 * Time: 21:58
 */
Class Home extends My_Controller{
    function __construct()
    {
        parent::__construct();

    }
   public function index(){
     $this->data['services'] = $this->db->select('*')->from('service')->where('statut',0)->get()->result();
     $this->renderFront('frontpage/home','Accueil');
    }
     public function staticPage($page){
        $this->renderFront("frontpage/$page",'Accueil');
    }
     public function  service($service){
        $this->data['service'] = $this->db->select('*')->from('service')->where('id',$service)->get()->result()[0];
        $this->renderFront("frontpage/service",'Service '.$this->data['service']->nom);
    }
}