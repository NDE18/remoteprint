<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarifs extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tarifs_model','Tarifs');

    }

    public function index()
    {
      $this->data['tarifs'] = $this->Tarifs->get_Tarifs();
      $this->render("admin/tarifs/liste",'liste des Tarifs');
    }

    public function add()
    {

      $data=array();
      if(!empty($_POST['caracteristique'])){
              for($i = 0; $i <=count($_POST['caracteristique']); $i++){
                  if(!empty($_POST['caracteristique'][$i])){
                        $data=array(
                  'prix_max'=>$_POST['caracteristique'],
                  'frais'=>$_POST['detail']
               );
                  $resultat=  $this->Tarifs->save_tarifs($data);
                  }
              }
               }
    }

    public function update()
    {
      //var_dump($_POST);
      $data= array('id' =>$_POST['id'], 'prix_max'=>$_POST['nom'],'frais'=>$_POST['prenom']);
      $result=$this->Tarifs->update_tarifs($data);
    }

}
