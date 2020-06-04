<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offre extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Offre_model','Offre');
        $this->load->library('form_validation');
        $this->load->helper('date');
    }

    public function index()
    {
      $this->data['offre'] = $this->Offre->get_Offre();
      $this->render("admin/offres/index",'liste des Offres');
    }

    public function terminer()
    {
      $this->data['offre'] = $this->Offre->get_offretraiter();
      $this->render("admin/offres/offretraiter",'liste des Offres traitées ');
    }

    public function statutoffre()
    {
       // var_dump($_POST['valeur']);
        $valeur = $_POST['valeur'];
            //if($valeur == 1){
                $appP = $this->Offre->get_offre($valeur);
                //var_dump($appP);
                $this->data['appels'] =$appP;
           /* }else{
                $appP = $this->Offre->get_offretraité();
                $this->data['appels'] = $appP;
            }*/
              $this->data['option'] = $valeur;
              $this->load->view('admin/offres/displayResults',$this->data);

    }
    public function bloquer()
    {
     //var_dump($_POST);
    if($this->input->post('ajax') == '1') {

      $this->form_validation->set_rules('id', 'id', 'trim|required');
      $this->form_validation->set_rules('motif', 'motif', 'trim');

      if($this->form_validation->run() == FALSE) {

          echo validation_errors();
      }

      else{
          $format = "%Y-%m-%d %h:%i:%s";
          $date= mdate($format);
          $motif=$this->input->post('motif');
          $id=$this->input->post('id');
          $data = array('id'=>$id,'motif' =>$motif,'date'=>$date);

          $this->Offre->stopper($data);
      }
  }
    }

}
