<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contentieux extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Contentieux_model','Contentieux');
        $this->load->model('Notification_model','notif');
    }

    public function index()
    {
      $this->data['contentieux'] = $this->Contentieux->get_Contentieux();
      $this->render("admin/contentieux/index",'liste des Contentieux');
    }
    public function myformAjax($id) {

        $result =  $this->Contentieux->get_Contentieux($id);
        //$this->db->where("id",$id)->get("contencieux")->result();

        echo json_encode($result);

        }
   
public function traitement()
{
    
    $id=$_GET['id'];
    $this->data['contentieux'] = $this->Contentieux->get_Contentieux($id);
      $this->render("admin/contentieux/traitement",'liste des Contentieux');
}
public function message()
{
   
    if(!empty($_POST['client']))
    {
        $data=array("contentieux"=>$_POST['contentieux'],"message"=>$_POST['condition'],"client"=>$_POST['client']);
        $result=$this->Contentieux->regelemntcontentieux($data);
        $notification=array("receiver_id"=>$_POST['client'],"message"=>$_POST['condition'],"vu"=>0);
        $this->data['notifications'] = $this->notif->create($notification);

    }
    else
    {
        var_dump($_POST);
        $data=array("contentieux"=>$_POST['contentieux'],"message"=>$_POST['condition'],"secretariat"=>$_POST['secretariat']);
        $result=$this->Contentieux->regelemntcontentieux($data);
        $notification=array("receiver_id"=>$_POST['secretariat'],"message"=>$_POST['condition'],"vu"=>0);
        $this->data['notifications'] = $this->notif->create($notification);
    }
    
}
    public function update()
    {
      //var_dump($_POST);
      $data= array('id' =>$_POST['id'], 'prix_max'=>$_POST['nom'],'frais'=>$_POST['prenom']);
      $result=$this->Tarifs->update_tarifs($data);
    }

}
