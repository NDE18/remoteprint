<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Secretariat_model','Secretariat');
        $this->load->model('Service_model','Service');
        $this->load->library('form_validation');
        $this->load->helper('date');
    }

    public function index()
    {

        $this->data['service'] = $this->Service->get_service();
        $this->render("admin/service/liste",'liste des appels d offres');
    }

    public function afficher()
    {

        $this->render('admin/service/add');

    }

    public function save()
    {

            $this->form_validation->set_rules('nom', 'nom', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('description', 'description', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');

             if($this->form_validation->run())
            {

                if($_FILES['fiche']==null)
                {
                    $this->data['error'] = "desole mais un service doit obligatoirement avoir une image descriptive";
                     $this->form_validation->error_array();
                }
                else
                {
                $config['upload_path'] = 'assets/uploads/images/service';
                $userfile='fiche';
                // Uploading all type of file
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($userfile))
                {
                  $data['error'] = array('error' => $this->upload->display_errors());

                }
                else
                {

                  $data = array('upload_data' => $this->upload->data($userfile));
                  $data=array(
                    'image'=>$_FILES['fiche']['name'],
                    'nom'=>strtoupper($_POST['nom']),
                    'description'=>$_POST['description']
                );
                  $resultat=  $this->Service->insert($data);
                  redirect('admin/Service');
                }

                }

             //die();
               /* if(!empty($caracteristique)){
                for($i = 0; $i < count($caracteristique); $i++){
                    if(!empty($caracteristique[$i])){
                        $name = $caracteristique[$i];
                        $fiche = $image[$i];

                    }
                }
                 }*/

            }
            else{

                 $this->render('admin/service/add','ajout d un service');
                $this->form_validation->error_array();
            }

    }

    public function caracteristique()
    {

        $data=array();
        if(!empty($_POST['caracteristique'])){
                for($i = 0; $i <=count($_POST['caracteristique']); $i++){
                    if(!empty($_POST['caracteristique'][$i])){
                         /*$data=array(
                            'caractiristique'=>$_POST['caracteristique'],
                            'details'=>$_POST['detail']
                          );*/
                          $donne=array(
                    'service'=>$_POST['id'],
                    'nom'=>$_POST['caracteristique'],
                    'detail'=>$_POST['detail']
                 );
                     $resultat=  $this->Service->caracteristique($donne);
                    }
                }
                 }
                if($resultat['val']==0)
                {
                    $this->data['error'] = $resultat['msg'];
                    redirect('admin/Service');
                    
                }
                else
                {
                    $this->data['error'] = $resultat['msg'];
                    redirect('admin/Service');
                    
                }

    }

        public function bloquer()
        {

              if($_POST['id']!=null)
              {
                  $resultat = $this->Service->bloquer_service($_POST['id']);
                  echo $resultat;
              }
              else {

              }
        }
        public function statutservice()
        {
                $valeur = $_POST['valeur'];
                $this->data['service'] = $this->data['service'] = $this->Service->get_service($valeur);
                //var_dump($resultat);
                  $this->load->view('admin/service/displayResults',$this->data);


        }
        public function Valider()
    {
      $data=array('id' => $_POST['id'],'priorite'=>$_POST['motif']);

      $resultat=$this->Service->Valider_service($data);
      //var_dump($_POST);
    }

        public function image()
        {
          $this->data['service'] = $this->Service->get_service();
          $this->render('admin/service/image','liste des images des service');
        }

        public function save_image()
        {
          var_dump($_FILES);
          if($_FILES['fiche']==null)
          {
            $this->data['error'] = "desole mais un service doit obligatoirement avoir une image descriptive";
             $this->form_validation->error_array();

          }
          else {

            $config['upload_path'] = 'assets/uploads/images/service';
            $userfile='fiche';
            echo $userfile;
            // Uploading all type of file
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($userfile))
            {

              $data['error'] = array('error' => $this->upload->display_errors());

              var_dump($data['error']);

            }
            else
            {
              $data = array('upload_data' => $this->upload->data($userfile));
                      /*if(!file_exists('dw-bw.jpeg')) {
                	     $img = imagecreatefromjpeg($_FILES['fiche']['name']);
                	      imagefilter($img,IMG_FILTER_GAUSSIAN_BLUR);
                	       imagejpeg($img,'db-bw.jpeg');
                	        imagedestroy($img);
                        }*/

              $data=array(
                'image'=>$_FILES['fiche']['name'],
                'id'=>$_POST['id']
            );

              $resultat=  $this->Service->insert_image($data);
              redirect('Service');
            }
          }
      

        }

}
