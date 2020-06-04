<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;


class Pdf extends  My_Controller {


  function __construct()
  {
      parent::__construct();
      $this->load->model('Client_model','Client');
      $this->load->model('Appeloffre_model','Appeloffre');
      $this->load->helper("pdf");
  }
  
   public function index()

   {

	$this->load->view('welcome_message');

   }


   public  function mypdf(){

      $data['client'] = $this->Client->get_Client();
      $content=$this->load->view("admin/pdf/listeClients",$data,true);
  
    try{
      $npdf = new Dompdf();
      $npdf->loadHtml($content);

      $npdf->render();

      $npdf->stream("welcome.pdf");

    }catch(DOMPDF_Execption $e){
      echo $e->getMessage();
      die;
    }


  }
 public function l_clientpdf()
     {
      $data['client'] = $this->Client->get_Client(1);
      $content=$this->load->view("admin/pdf/listeClients",$data,true);
  
    try{
      $npdf = new Dompdf();
      $npdf->loadHtml($content);

      $npdf->render();

      $npdf->stream("welcome.pdf");

    }catch(DOMPDF_Execption $e){
      echo $e->getMessage();
      die;
    }
     }
     public function l_secretariatpdf()
     {
      $data['client'] = $this->Client->get_Client(2);
      $content=$this->load->view("admin/pdf/listeClients",$data,true);
  
    try{
      $npdf = new Dompdf();
      $npdf->loadHtml($content);

      $npdf->render();

      $npdf->stream("welcome.pdf");

    }catch(DOMPDF_Execption $e){
      echo $e->getMessage();
      die;
    }
     }
     public function l_adminpdf()
     {
      $data['client'] = $this->Client->get_Client(3);
      $content=$this->load->view("admin/pdf/listeClients",$data,true);
  
    try{
      $npdf = new Dompdf();
      $npdf->loadHtml($content);

      $npdf->render();

      $npdf->stream("client.pdf");

    }catch(DOMPDF_Execption $e){
      echo $e->getMessage();
      die;
    }

   }
   public function appeloffrepdf()
   {
    $data['appeloffre'] = $this->Appeloffre->getAppels();
    
    $content= $this->load->view("admin/pdf/appelofrepdf",$data,true);
    
  try{
    $npdf = new Dompdf();
    $npdf->loadHtml($content);

    $npdf->render();

    $npdf->stream("appeloffre.pdf");

  }catch(DOMPDF_Execption $e){
    echo $e->getMessage();
    die;
  }
   }
}