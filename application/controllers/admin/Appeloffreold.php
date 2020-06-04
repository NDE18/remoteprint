<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appeloffre extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Secretariat_model','Secretariat');
        $this->load->model('Client_model','Client');
        $this->load->model('Appeloffre_model','Appeloffre');
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->helper('general');

    }

    public function index()
    {
        $this->data['appeloffre']=$this->Appeloffre->getAppels();
        $this->render("admin/appeloffre/index",'liste des appels d offres');
    }

    public function afficher()
    {
        $this->data['client'] = $this->Appeloffre->get_client();
        $this->render('admin/appeloffre/add');

    }

    public function save()
    {
        var_dump($_POST);

            $this->form_validation->set_error_delimiters('<p style="color:red">',"<p>");
            $this->form_validation->set_rules('client', 'client', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('service', 'service', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('region', 'region', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
             $this->form_validation->set_rules('li_quartier', 'quartier', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');


          if($this->form_validation->run())
            {
                $lastNumAppel = $this->Appeloffre->getLastNumberAppel()->numeroAppel + 1;
                $data=array('client'=>$_POST['client'],
                            'service'=>$_POST['service'],
                            'num'=>'RP-'.castNumberId($lastNumAppel,4,0).'/'.date("y"),
                            'region'=>$_POST['region'],
                            'detail'=>$_POST['detail'],
                            'quartier'=>$_POST['li_quartier']);

                 $resultat= $this->Appeloffre->save_appeloffre($data);

                 if($resultat['val']==0)
                 {
                    $this->render('admin/appeloffre/add','ajout un appel d offre');
                    $this->form_validation->error_array();
                 }
                 else{
                    redirect('admin/appeloffre/index');
                 }

            }
            else
            {
                $this->render('admin/appeloffre/add','ajout un appel d offre');
                $this->form_validation->error_array();

            }
    }
     public function myformAjax($id) {

        $result = $this->db->where("id",$id)->get("user")->result();

        echo json_encode($result);

        }
        public function selectionregion($id) {

        $result = $this->db->where("region",$id)->get("ville")->result();

        echo json_encode($result);

        }

         public function myformAjax1($id) {

        $result = $this->db->select('*')
                ->from('caracteristique')
                ->where(array('service'=>$id))
                ->get()->result();
                /*$data=array();
                $data['caractirsitique'] = [];
                //var_dump($result);
                foreach($result as $liste)
                {
                    $var=json_decode($liste->detail);

                    $data['caractirsitique'][] = $var->caractiristique;



                }
                $donne=array('resultat'=>$result,'data'=>$data);
                //var_dump($data);*/


        echo json_encode($result);

        }

        public function statutappeloffre()
        {
            $valeur = $_POST['valeur'];
            if($valeur == 1){
                $appP = $this->Appeloffre->getAppels();
                //var_dump($appP);
                //$result = array();
              /*foreach($appP as $app){
                    if( $this->Appeloffre->ifExist($app->id) == 0){
                        $result[] = $app;
                    }

                }*/
                $this->data['appels'] =$appP;
            }else{
                $appP = $this->Appeloffre->getAppelTraite();
                $this->data['appels'] = $appP;
            }
            $this->data['option'] = $valeur;
              $this->load->view('admin/appeloffre/displayResults',$this->data);

        }

}
