<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model','Transaction');

    }

    public function index()
    {
      $this->data['transaction'] = $this->Transaction->get_transaction();
      $this->render("admin/transaction/liste",'liste des transaction');
    }

    public function Valider()
    {
      $data=array('id' => $_POST['id'],'intitule'=>$_POST['motif']);

      $resultat=$this->Transaction->Valider_transaction($data);
      //var_dump($_POST);
    }

    public function suspension()
    {
      $data= array('id' => $_POST['id'],'motif'=>$_POST['motif']);
    $resultat=  $this->Transaction->suspendre_transaction($data);
    //  var_dump($_POST);
    }

}
