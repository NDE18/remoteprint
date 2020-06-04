<?php
/**
 * Created by PhpStorm.
 * User: alberttheophane
 * Date: 18/12/2017
 * Time: 21:58
 */
Class AppelOffre extends My_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->helper('configuration');
        $this->load->model('secretariat/general_model','general');
        if(session_data('connect') == false){
            redirect(base_url('account/signIn'));
        }elseif(session_data('role') == CLIENT or session_data('admin') == true){
            redirect();
        }


    }
    public function index(){
        $this->appelOffre();
    }
    public function appelOffre(){
        $appP = $this->general->getAppel();
        $result = array();
        foreach($appP as $app){
            if( $this->general->ifExist($app->id) == 0){
                $result[] = $app;
            }
            
        }
        $this->data['appels'] = $result;
        $this->renderSecretariat('frontpage/secretariat/appelsOffre/appelsOffre','accueil');
    }
    public function devis($appel)
    {

        $this->data['infos'] = $this->general->getAppelSpe($appel);
        if($this->general->ifConfigurer($this->data['infos']->service) == 0){
            $this->data['noconfigure'] = 1;
        }

        $this->renderSecretariat('frontpage/secretariat/appelsOffre/devis', 'accueil');
        if (isset($_POST['submit'])) {

            $info = $this->general->getAppelSpe($appel);
            $nbreChamp = $this->input->post('nombreChamp');
            if(intval($nbreChamp) != 0 ) {
                for ($i = 0; $i < intval($nbreChamp); $i++) {
                    $k = $i + 1;
                    if(isset($_POST['existe'.$k])) {
                        $this->form_validation->set_rules('descri' . $k, 'description', 'trim|required|encode_php_tags');
                        $this->form_validation->set_rules('nombrepage' . $k, 'description', 'trim|required|encode_php_tags');
                        $this->form_validation->set_rules('nombreExem' . $k, 'description', 'trim|required|encode_php_tags');
                        $this->form_validation->set_rules('prixU' . $k, 'description', 'trim|required|encode_php_tags');
                        $this->form_validation->set_rules('prixTotal' . $k, 'description', 'trim|required|encode_php_tags');
                    }
                }
            }
            $this->form_validation->set_rules('prixGlobal', 'description', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('message', 'description', 'trim|encode_php_tags');
            $this->form_validation->set_rules('totalOm', 'description', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('remise', 'description', 'trim|encode_php_tags');

            if ($this->form_validation->run()) {

                $tab_json = array();
                if (!empty(htmlspecialchars(trim($this->input->post('remise'))))) $tab_json['remise'] = htmlspecialchars(trim($this->input->post('remise')));
                if (!empty(htmlspecialchars(trim($this->input->post('message'))))) $tab_json['message'] = htmlspecialchars(trim($this->input->post('message')));
                $tab_json['total_om'] = htmlspecialchars(trim($this->input->post('totalOm')));
                if(intval($nbreChamp) != 0 ) {
                    $tab_json['nbrechamp'] = $this->input->post('nombreChamp');
                    for ($i = 0; $i < intval($nbreChamp); $i++) {
                        $k = $i + 1;
                        if(isset($_POST['existe'.$k])){
                            $tab_json['descri'.$k] = htmlspecialchars(trim($this->input->post('descri' . $k)));
                            $tab_json['nombrepage' . $k] = htmlspecialchars($this->input->post('nombrepage' . $k));
                            $tab_json['nombreExem' . $k] = htmlspecialchars($this->input->post('nombreExem' . $k));
                            $tab_json['prixU' . $k] = htmlspecialchars($this->input->post('prixU' . $k));
                            $tab_json['prixTotal' . $k] = htmlspecialchars($this->input->post('prixTotal' . $k));
                        }

                    }

                }

                    $data = array(
                        'appel_offre'=>$appel,
                        'secretariat'=>session_data('secre'),
                        'caracteristique'=>json_encode($tab_json),
                        'prix'=>BackupPrix($info->caracteristique),
                        'prixTotal'=>htmlspecialchars(trim($this->input->post('prixGlobal')))

                    );


                    $this->general->addOffre($data);
                    $dataNotif = array(
                        'receiver_id'  => $this->data['infos']->user,
                        'message'=>"Un sécrétariat a répondu  à votre appel d'offre <b>N°".$this->data['infos']->num."</b>" ,
                        'url'=>AFFIOFFRE.'/'.$appel
                    );
                    $this->notif->create($dataNotif);
                    set_flash_data('Le devis a été enrégistré et envoyé avec succès');
                    redirect(base_url('secretariat/appelOffre/appelOffre'));



                }
            } else {
                $this->data['error'] = 1;
            }
        }
    public function apercuDevis($appel){
        $this->data['apercu'] = $this->general->apercuDevis($appel);
        $this->renderSecretariat('frontpage/secretariat/appelsOffre/apercuDevis','accueil');
    }
    public function changeCritere(){
        $valeur = $_POST['valeur'];
        if($valeur == 0){
            $appP = $this->general->getAppel();
            $result = array();
            foreach($appP as $app){
                if( $this->general->ifExist($app->id) == 0){
                    $result[] = $app;
                }

            }
            $this->data['appels'] = $result;
        }else{
            $appP = $this->general->getAppelTraite();
            $this->data['appels'] = $appP;
        }
        $this->data['option'] = $valeur;
        $this->load->view('frontpage/secretariat/appelsOffre/displayResults',$this->data);


    }
    public function recupOm(){
        $prix = htmlspecialchars(trim($_POST['prix']));
        echo getFrais($prix);
    }
    public function displayDoc(){
        $appel = $_POST['offre'];
        $this->data['documents'] = $this->general->getDocuments($appel);

        $this->load->view('frontpage/secretariat/appelsOffre/printdoc',$this->data);
    }

    public  function PrintDoc($document){
        $this->data['document'] = $document;
        $this->renderSecretariat('frontpage/secretariat/appelsOffre/printdoc','accueil');

    }

}