<?php
/**
 * Created by PhpStorm.
 * User: alberttheophane
 * Date: 18/12/2017
 * Time: 21:58
 */
Class Appel extends My_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->helper('configuration');
        $this->load->model('settings_model','mSet');
        $this->load->model('client/AppelOffre_model','appelO');
        $this->load->model('secretariat/General_model','general');
        if(session_data('connect') == false){
            redirect(base_url('account/signIn?redirect=client/appel'));
        }elseif(session_data('admin') == true or session_data('role') == SECRETARIAT ){
            redirect();
        }


    }
    public function index(){
        $this->appel();
    }
    public function displayInputs(){
        $service = $_POST['service'];

        $this->data['caracteristique'] = $this->general->caracteristique($service);
        $this->load->view('frontpage/client/appelOffre/displayInputs',$this->data);

    }
    public function nbrepages(){
        $doc = $_POST['document'];

        if (false !== ($file = file_get_contents($doc))) {
            $pages = preg_match_all("/\/Page\W/", $file, $matches);
            echo  $pages;

        }

    }
    public function appel(){
        if($this->appelO->countAppelOffre() == 5){
            $this->data['success'] = 'Vous ne pouvez pas faire plus de 5 appels d\'offre par jour. Pour se faire Vous devez disposer d\'un compte prénium';
            set_flash_data(array('Vous ne pouvez pas faire plus de 5 appels d\'offre par jour. Pour se faire Vous devez disposer d\'un compte prénium','error','Erreur'));
            redirect(base_url('client/appel/liste'));
        }
        $this->load->model('frontpage/register_model','register');
        $this->data['services'] =  $this->appelO->getServices();
        $this->data['regions'] = $this->register->get('region');
        $this->load->model('secretariat/general_model','general');
        if (isset( $_POST['submitButton'])){
            $caracteristique = $this->general->caracteristique($this->input->post('service'));
            $this->form_validation->set_error_delimiters('<p class="text-danger small" style="margin-top: -15px;margin-bottom: 9px;">', '</p>');
            $this->form_validation->set_rules('service', '"Service"', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('nombreEx', '"Nombre exemplaires"', 'trim|required|encode_php_tags|is_natural');
            $this->form_validation->set_rules('villes', '"Ville"', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('quartier', '"quartier"', 'trim|required|min_length[2]|max_length[128]|encode_php_tags');
            foreach ($caracteristique as $carac) {
                $this->form_validation->set_rules('valeur' . $carac->id, $carac->nom, 'trim|required|encode_php_tags');
            }
            $this->form_validation->set_rules('description', '"Description"', 'min_length[2]|encode_php_tags');

            if ($this->form_validation->run()) {


                $caract = array(
                    'nombreExemplaire' => htmlspecialchars($this->input->post('nombreEx')),
                    'description' => $this->input->post('description'),
                );
                foreach ($caracteristique as $carac) {
                    $caract[$carac->id] = $this->input->post('valeur' . $carac->id);
                }
                $lastNumAppel = $this->appelO->getLastNumberAppel()->numeroAppel + 1;
                $data = array(
                    'num' => 'RP-' . castNumberId($lastNumAppel, 4, 0) . '/' . date("y"),
                    'caracteristique' => json_encode($caract),
                    'user' => session_data('id'),
                    'service' => htmlspecialchars($this->input->post('service')),
                    'ville' => htmlspecialchars($this->input->post('villes')),
                    'quartier' => htmlspecialchars($this->input->post('quartier'))
                );

                if (!empty($_FILES['fichiers']['name'][0])) {
                    $appel = $this->appelO->insertAppel($data);
                    if ($this->upload_files($_FILES['fichiers'], $appel) === FALSE) {
                        $this->data['error'] = $this->upload->display_errors('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" onclick="$(this).parrent().hide()"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>', '</div>');
                    }else{
                        $secs = $this->mSet->selectTableCriterion('*','user_role',array("role"=>SECRETARIAT,'statut'=>1));
                        foreach($secs as $sec){
                            $dataNotif = array(
                                'receiver_id'  => $sec->user,
                                'message'=>"Un client vient de lancer un appel d'offre" ,
                                'url'=>LESAPPELSOFFRES.'/'.$appel
                            );
                            $this->notif->create($dataNotif);
                        }
                        $this->data['success'] = 'Votre appel d\'offre abien été enrégisté';
                        set_flash_data(array('Votre appel d\'offre a bien été enrégisté', 'success', 'Succès'));
                        redirect(base_url('client/appel/liste'));
                    }
                } else {
                    $this->data['error'] = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" onclick="$(this).parrent().hide()"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Veuillez choisir un fichier</div>';
                }

            } else {
                $this->data['error'] = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" onclick="$(this).parrent().hide()"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Une erreur s\'est produite; veiuillez réessayer</div>';
            }
        }
        $this->renderFront('frontpage/client/appelOffre/lancer','Lancer appel offre',array('Espace membre'));
    }
    private function nombrepages($fichier){


        if (false !== ($file = file_get_contents($fichier))) {
            $pages = preg_match_all("/\/Page\W/", $file, $matches);
          return $pages;

        }
    }

    private function upload_files($files , $appel)
    {
        $config = array(
            'upload_path'   => './assets/uploads/documents/',
            'allowed_types' => array('pdf','jpg','jpeg','png'),
            'overwrite'     => 1,
        );
        $file = $_FILES;
        $this->load->library('upload', $config);


        foreach ($files['name'] as $key => $image) {

            $_FILES['fichiers']['name']= $files['name'][$key];
            $_FILES['fichiers']['type']= $files['type'][$key];
            $_FILES['fichiers']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['fichiers']['error']= $files['error'][$key];
            $_FILES['fichiers']['size']= $files['size'][$key];
            $fichiers[] = 'image_'.$image;
            $fichier = $info = new SplFileInfo($image);
            $ext = strtolower($fichier->getExtension());
            $config['file_name'] =  md5(uniqid(rand())).'_'.permalink($image, array($image), "_");
            $this->upload->initialize($config);

            if ($this->upload->do_upload('fichiers')) {
                $this->upload->data();
                $array = array(
                    'nom'=>$image,
                    'taille'=>$_FILES['fichiers']['size'],
                    'lien'=>'/assets/uploads/documents/'.$config['file_name'].".$ext",
                    'type'=>$_FILES['fichiers']['type'],
                    'nombrepage'=>($ext=='pdf')?$this->nombrepages($_FILES['fichiers']['tmp_name']):1,
                    'appel_offre'=>$appel
                );
                $this->appelO->insertDoc($array);

            } else {

                return false;
            }
        }

        return true;
    }
    public function liste(){
        $this->data['appels'] = $this->appelO->getAppels();
        $this->renderFront('frontpage/client/appelOffre/list','Mes appels d\'offre',array('Espace membre','Mes appels d\'offre'));
    }
    public function printOffre($appel){
        if(count($this->appelO->getInfoAppel($appel)) == 0){
            redirect(base_url('client/home'));
        }
        if($this->appelO->checkIfExistChoosen($appel) == 1){
            redirect(base_url('client/commande/liste'));
        }

        $this->data['info']  = $this->appelO->getInfoAppel($appel);
        $this->data['offres'] = $this->appelO->printOffre($appel);
        $this->form_validation->set_rules('numeroTransac', '"numeroTransac"', 'trim|required|encode_php_tags');
        if ($this->form_validation->run()) {
            $dataInsert = array(
                'intitule'=>htmlspecialchars($this->input->post('numeroTransac')),
                'offre'=>htmlspecialchars($_POST['offre'])
            );
            $dataUpdateOffre = array(
                'statut'=>OFFRECHOISIE,
                'dateChoisi'=>moment()->format('Y-m-d H:i:s')

            );
            $dataUpdateAppelOffre = array(
                'statut'=>APPELTRAITE
            );
            $this->appelO->insertPaiement($dataInsert,$dataUpdateOffre,$dataUpdateAppelOffre,$_POST);
            set_flash_data("Votre paiement a bien été  enrégistré.Nous allons vérifier l\'effectivité de ce paiement avant de lancer votre impression");
            redirect(base_url('client/commande/liste'));

        }else{

        }
        $this->renderFront('frontpage/client/appelOffre/printOffre','Offres',array('Espace membre','Mes appels d\'offre','Offres'));
    }
    public function displayDevis(){
        $offres = $_POST['offres'];
        $offre = $_POST['offre'];
        $secretariat = $_POST['secretariat'];
        $this->data['appelO'] = $_POST['appelO'];
        $this->data['prixT'] =  $_POST['prixT'];
        $this->data['offre'] = $offre;
        $this->data['offres'] = $offres;
        $this->data['secre'] = $secretariat;
        $this->data['apercu'] = $this->appelO->getDevis($offre,$secretariat);
        $this->load->view('frontpage/client/appelOffre/displayDevis',$this->data);
    }
    public function paiement(){
        $offre = $_POST['offre'];
        $secretariat = $_POST['secretariat'];
        $this->data['prixT'] =  $_POST['prixT'];
        $this->data['offres'] =  $_POST['offres'];
        $this->data['offre'] = $offre;
        $this->data['secre'] = $secretariat;

        $this->load->view('frontpage/client/appelOffre/paiementCmd',$this->data);
    }
    public function detail(){
        $offre = $_POST['offre'];
        $secretariat = $_POST['secretariat'];
        $this->data['prixT'] =  $_POST['prixT'];
        $this->data['offres'] =  $_POST['offres'];
        $this->data['offre'] = $offre;
        $this->data['secre'] = $secretariat;
        $this->data['apercu'] = $this->appelO->getDevis($offre,$secretariat);
        $this->load->view('frontpage/client/commande/details',$this->data);
    }
    public function detailSecre(){
        $offre = $_POST['Aoffre'];
        $this->data['apercu'] = $this->appelO->getDevis($offre,session_data('secre'));
        $this->load->view('frontpage/secretariat/commande/detail',$this->data);
    }

}