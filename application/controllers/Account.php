<?php
/**
id css filter: blur(1px)
 */
Class Account extends My_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('google');
        $this->load->helper('facebook');

        $this->load->model('frontpage/register_model','register');


    }
    public function index(){
        $this->signUp();
    }
    public function signUp(){

        if(session_data('connect') ==true){
            redirect();
        }
        $this->data['regions'] = $this->register->get('region');
        if(isset($_POST['send'])) {


            $this->form_validation->set_error_delimiters('<p class="text-danger small" style="margin-top: -15px;margin-bottom: 9px;">', '</p>');
            $this->form_validation->set_rules('nom', '"Nom"', 'trim|required|min_length[2]|max_length[128]|encode_php_tags');
            $this->form_validation->set_rules('prenom', '"Prénom"', 'trim|min_length[2]|max_length[128]|encode_php_tags');
            $this->form_validation->set_rules('telephone', '"Téléphone"', 'trim|required|min_length[9]|max_length[16]|encode_php_tags|is_natural');
            $this->form_validation->set_rules('email', '"E-mail"', 'trim|required|min_length[9]|max_length[128]|encode_php_tags|valid_email|is_unique[user.mail]');
            $this->form_validation->set_rules('username', '"Nom d\'utilisateur"', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('mdp', '"Mot de passe"', 'trim|required|min_length[8]|encode_php_tags');
            $this->form_validation->set_rules('rmdp', '"Mot de passe"', 'trim|required|min_length[8]|matches[mdp]|encode_php_tags');
            $this->data['client'] = 1;

            if ($this->form_validation->run()) {
                //var_dump($this->input->post()); die(0);
                //var_dump(htmlspecialchars($this->input->post('lastName')));die();
                $post = array(
                    'nom' => htmlspecialchars($this->input->post('nom')),
                    'prenom' => htmlspecialchars($this->input->post('prenom')),
                    'telephone' => htmlspecialchars($this->input->post('telephone')),
                    'mail' => htmlspecialchars($this->input->post('email')),
                    'login' => htmlspecialchars($this->input->post('username')),
                    'mdp' => htmlspecialchars(sha1($this->input->post('mdp')))
                );
                $id = $this->register->insertUser($post);
                $dataNotif = array(
                    'receiver_id'  => $id,
                    'message'=>"Bienvenue sur la plateforme remoteprint. Pour toutes vos questions, nous sommes disponibles" ,
                    'url'=>"#"
                );
                $this->notif->create($dataNotif);
                    $this->data['message'] = "Vous avez été parfaitement enrégistré. <br>Cliquez sur le boutton \"Commencer\" pour débuter votre expérience";
                    foreach($_POST as $key=>$value){
                        unset($_POST[$key]);
                    }
                    unset($this->data['client']);


            }

        }
        if(isset($_POST['inscris'])){


            $this->form_validation->set_error_delimiters('<p class="text-danger small" style="margin-top: -15px;margin-bottom: 9px;">', '</p>');
            $this->form_validation->set_rules('noms', '"Nom"', 'trim|required|min_length[2]|max_length[128]|encode_php_tags');
            $this->form_validation->set_rules('bp', '"Boite postale"', 'trim|min_length[2]|max_length[20]');
            $this->form_validation->set_rules('description', '"Activité"', 'trim|required|min_length[2]|max_length[500]');
            $this->form_validation->set_rules('villes', '"Ville"', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('quartier', '"quartier"', 'trim|required|min_length[2]|max_length[128]|encode_php_tags');
            $this->form_validation->set_rules('telephones', '"Téléphone"', 'trim|required|min_length[9]|max_length[16]|encode_php_tags|is_natural');
            $this->form_validation->set_rules('emails', '"E-mail"', 'trim|required|min_length[9]|max_length[128]|encode_php_tags|valid_email|is_unique[user.mail]');
            $this->form_validation->set_rules('usernames', '"Nom d\'utilisateur"', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('mdps', '"Mot de passe"', 'trim|required|min_length[8]|encode_php_tags');
            $this->form_validation->set_rules('rmdps', '"Mot de passe"', 'trim|required|min_length[8]|matches[mdps]|encode_php_tags');
            $this->data['secre'] = 1;

            if ($this->form_validation->run()) {

                //var_dump($this->input->post()); die(0);
                //var_dump(htmlspecialchars($this->input->post('lastName')));die();
                $secre = array(
                    'nomsecretariat' => htmlspecialchars($this->input->post('noms')),
                    'telephone'=> htmlspecialchars($this->input->post('telephones')),
                    'boitepostal'=> htmlspecialchars($this->input->post('bp')),
                    'ville'=> htmlspecialchars($this->input->post('villes')),
                    'quartier'=>htmlspecialchars($this->input->post('quartier')),
                    'description'=>$this->input->post('description'),
                    'frequence'=>htmlspecialchars($this->input->post('freq')),
                    'contrat'=>1
                );
                $post = array(
                    'mail' => htmlspecialchars($this->input->post('emails')),
                    'login' => htmlspecialchars($this->input->post('usernames')),
                    'mdp' => htmlspecialchars(sha1($this->input->post('mdps')))
                );
                if ($this->register->inserSecre($secre,$post)) {
                    $this->data['message'] = "Compte créé avec succès.Nous allons vérifier l'exactidude de vos informations avant de valider votre compte en vous envoyant un mail";

                    foreach($_POST as $key=>$value){
                        unset($_POST[$key]);
                    }
                    unset($this->data['secre']);

                }

            }
            //var_dump($this->form_validation->error_array());
        }
        $this->renderFront('frontpage/compte/signUp','Je m\'inscris ',array('Je m\'inscris'));
    }
    public function signIn(){
        if(session_data('connect') == true){
            redirect();
        }
        if(isset($_POST['submit'])){
            $this->form_validation->set_error_delimiters('<p class="text-danger small" style="margin-top: -15px;margin-bottom: 9px;">', '</p>');
            $this->form_validation->set_rules('username', '"Login"', 'trim|required|min_length[1]|encode_php_tags');
            $this->form_validation->set_rules('mdp', '"Mot de passe"', 'trim|required|min_length[1]|encode_php_tags');
            if ($this->form_validation->run()) {
                //var_dump($this->input->post()); die(0);
                //var_dump(htmlspecialchars($this->input->post('lastName')));die();
                $post = array(
                    'login' => htmlspecialchars($this->input->post('username')),
                    'mdp' => htmlspecialchars(sha1($this->input->post('mdp')))

                );

                if($this->register->auth($post) === 1){
            
                    if(session_data('role') ==  CLIENT){
                        $redirectUri=isset($_GET['redirect'])?$_GET['redirect']:"client/home";

                            redirect($redirectUri);
                    }elseif(session_data('role') ==  SECRETARIAT){
                        redirect(base_url('secretariat/home'));
                    }else{
                        $this->logout();
                    }
                }else{

                    switch($this->register->auth($post)){
                        case -1 : $erreur = "Login ou mot de passe incorrect"; break;
                        case -2 : $erreur = "Compte bloqué"; break;
                        case -3 : $erreur = "Compte secretariat bloqué"; break;
                    }
                    $this->data['erreur'] = $erreur;

                }


            }
        }elseif(isset($_POST['facebook'])){


        }


        $this->renderFront('frontpage/compte/signIn','Je me connecte',array('Je me connecte'));
    }
    public function fbcallback(){
        die("bonjour");
    }
    public function gCallback(){
        $gClient = redirectGoogle();
        $token = "";
        if(isset($_SESSION['acces_token'])){
         $gClient->setAccessToken(session_data('acces_token'));
        }else if(isset($_GET['code'])){

            $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
            $connect = array('acces_token'=>$token);
            set_session_data($connect);
        }else{
            redirect(base_url('account/signIn'));
        }
        $oAuth = new Google_Service_Oauth2($gClient);
        $userData = $oAuth->userinfo_v2_me->get();
        $existe = $this->register->checkIfExistEmail($userData['email']);
        $post = array(
            'nom' => $userData['givenName']." ".$userData['family_name'],
            'telephone' => '',
            'mail' => $userData['email'],
            'login' =>$userData['email'],
            'mdp' => sha1($userData['email'])
        );

        if(count($existe) == 0){
            $id = $this->register->insertUser($post);
            $dataNotif = array(
                'receiver_id'  => $id,
                'message'=>"Bienvenue sur la plateforme remoteprint. Pour toutes vos questions, nous sommes disponibles" ,
                'url'=>"#"
            );
            $this->notif->create($dataNotif);
        }

        

       /* $connect = array(
            'id'=>$this->register->getInformations($userData['email'])->id,
            'secre'=>$this->register->getInformations($userData['email'])->secretariat,
            'acces_token'=>$token,
            'firstname'=>$userData['givenName'],
            'lastname'=>$userData['family_name'],
            'login'=>$this->register->getInformations($userData['email'])->login,
            'role'=>$this->register->getInformations($userData['email'])->role,
            'numeroClient'=>$this->register->getInformations($userData['email'])->numeroClient,
            'connect'=>true
        );*/
        if($this->register->authReseau($post) == 1){
            if(session_data('role') ==  CLIENT){
                redirect(base_url('client/home'));
            }elseif(session_data('role') ==  SECRETARIAT){
                redirect(base_url('secretariat/home'));
            }else{
                $this->logout();
            }
        }else{

            switch($this->register->authReseau($post)){
                case -1 : $erreur = "Login ou mot de passe incorrect"; break;
                case -2 : $erreur = "Compte bloqué"; break;
                case -3 : $erreur = "Compte secretariat bloqué"; break;
            }
            $this->data['erreur'] = $erreur;
            $this->renderFront('frontpage/compte/signIn','Je me connecte',array('Je me connecte'));

        }

    }
    public function displayOptions(){
        $region = $_POST['val'];
        $this->data['villes'] = $this->register->getVilles($region);
        $this->load->view('frontpage/compte/displayOptions',$this->data);
    }

    public function logout()
    {
        parent::logout(); // TODO: Change the autogenerated stub
        redirect();
    }
}