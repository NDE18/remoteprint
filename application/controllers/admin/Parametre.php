<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parametre extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Parametre_model','Parametre');
    }

    public function index()
    {

    }
    public function Localite()
    {
      $this->data['localite']=$this->Parametre->get_localite();
      $this->render("admin/parametres/liste_localites");

    }

    public function location_update()
    {
      $this->Parametre->update_localite($data);
    }

}
