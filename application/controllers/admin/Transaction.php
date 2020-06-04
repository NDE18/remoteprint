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
    public function endtransaction()
    {
      $this->data['transaction'] = $this->Transaction->get_transactionend();
      $this->render("admin/transaction/transactionend",'liste des transaction');
    }
    public function Valider()
    {
      $data=array('id' => $_POST['id'],'intitule'=>$_POST['motif']);

      $resultat=$this->Transaction->Valider_transaction($data);
      //var_dump($_POST);
    }

    public function Payer()
    {
      $data=array('id' => $_POST['id'],'intitule'=>$_POST['motif']);
      $resultat=$this->Transaction->Payer_transaction($data);

    }
    public function contentieux()
    {

      $appP = $this->Transaction->getcontentieux($_GET['modal']);

        $data= array('appeloffre' =>$appP);
        $this->load->view('admin/transaction/contentieux',$data);
    }
    public function suspension()
    {
      $data= array('id' => $_POST['id'],'motif'=>$_POST['motif']);
    $resultat=  $this->Transaction->suspendre_transaction($data);
    //  var_dump($_POST);
    }

}
