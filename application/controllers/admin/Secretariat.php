<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secretariat extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Secretariat_model','Secretariat');
        $this->load->model('Client_model','Client');
        $this->load->model('User_model');
        $this->load->model('Notification_model');
        $this->load->library('form_validation');
        $this->load->helper('date');
    }
    public function add(){
    //$this->data['scolaire'] = $this->Secretariat->anneeScolaire();
   // $this->data['classe'] = $this->Secretariat->classes();
    $this->render("Secretariat/new","Enrégistrement des élèves");
    }

    public function afficher()
    {
        $this->render('admin/secretariat/new','ajout secretariat');

    }
    public function myformAjax($id) {

        $result = $this->db->where("region",$id)->get("ville")->result();

        echo json_encode($result);

        }

        public function notification() {
                $last_notification_id = $this->User_model->get_last_notif()->last;
                $data = $this->Notification_model->getByUserID(
                    $this->input->get('sender_id'), # di dapat dari HTTP GET
                    $last_notification_id
                );
                echo json_encode($data);
            }
    public function create() {

    //  if ("POST" === $this->input->server('REQUEST_METHOD')) {
      $valeur  = array('sender_id'=>$_POST['user_id'],'message'=>$_POST['message'],'receiver_id'=>1);
            $data=$this->Notification_model->create($valeur);

    }
    public function getnotification() {
        $notif = $this->Notification_model->getByUserID(1);
        $this->load->view('admin/secretariat/new', ['notif' => $notif]);
    }
    public function notif_all() {
        $notif_all = $this->Notification_model->getByUserID(1, false);
        echo json_encode($notif_all);
    }
    public function update_last_notif() {
        $this->User_model->update_last_notif(
            $this->input->get('notif_id')
        );
        echo json_encode([
            'status' => 200,
            'message' => 'ok'
        ]);
    }
    public function deconnexion()
    {
        $this->logout();
    }
    public function save()
    {

            $this->form_validation->set_error_delimiters('<p style="color:red">',"<p>");
            $this->form_validation->set_rules('nomsecretariat', 'nomsecretariat', 'trim|required|min_length[1]|max_length[64]|encode_php_tags');
           // $this->form_validation->set_rules('localisation', 'localisation', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('nom', 'nom', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('prenom', 'prenom', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('telephone', 'telephone', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('login', 'login', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('mdp', 'Mots de passe', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('phone', 'telephone du secretariat', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('boitepostal', 'la boite postal du secretariat', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('region', 'region du secretatriat', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('ville', 'ville du secretariat', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');

            if($this->form_validation->run())
            {

               /* if($this->authM->auth($this->input->post('login'), $this->input->post('pwd'))) {
                    redirect();
                }*/
//var_dump($_POST);
                $nomsecretariat=$this->input->post('nomsecretariat');
               // $localisation=$this->input->post('localisation');
                $nom=$this->input->post('nom');
                $prenom=$this->input->post('prenom');
                $telephone=$this->input->post('telephone');
                $email=$this->input->post('email');
                $login=$this->input->post('login');
                $mdp=$this->input->post('mdp');
                $bp=$this->input->post('boitepostal');
                $region=$this->input->post('region');
                $ville=$this->input->post('ville');
                $phone=$this->input->post('phone');
                $data = array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'telephone' => $telephone,
                    'mail' => $email,
                    'login' => $login,
                    'mdp' =>$mdp

                );
                $insert = array(
                    'nom' => $nomsecretariat,
                    'telephone'=>$phone,
                    'boite-postal'=>$bp
                );
                $adresse=array(
                    'region'=>$region,
                    'ville'=>$ville,
                );
                $this->Secretariat->insert($data,$insert,$adresse);

                redirect('admin/Secretariat/liste');
              //: $this->render('student/liste','ajout secretariat');
            }
            else
            {
              $this->data['adresse'] = $this->Client->get_adresse();
                $this->render('admin/secretariat/new','ajout secretariat');
                $this->form_validation->error_array();
            }

    }

    /* Afficher la liste des secretariats */

    public function liste(){

        $this->data['secretariats'] = $this->Secretariat->get_Secretariat();
        $this->render('admin/secretariat/liste','Liste des secretariats');
    }
    public function affilier(){

        $this->data['secretariats'] = $this->Secretariat->getsecretariat_affilier();
        $this->render('admin/secretariat/affilier','Liste des secretariats affilier');
    }
    public function secretariat_suspendu(){

                $this->data['secretariats'] = $this->Secretariat->get_suspension_Secretariat();

                $this->render('admin/secretariat/suspension','Liste des secretariats');
    }

    public function nombre()
    {
        $this->data['nombre'] = $this->Secretariat->get_secretariat_number();
        $this->render();
    }
    public function test()
    {

        $this->load->view('admin/student/test');
    }

    public function verif_condition()
    {
        if($this->input->post('ajax') == '1') {
            $this->form_validation->set_rules('id', 'id', 'trim|required');
        }
        if($this->form_validation->run() == FALSE) {
        echo validation_errors();

        }
        else {
            $id=$this->input->post('id');
            $data = array(
                'id' =>$id
            );
            $resultat=$this->Secretariat->condition($data);
            if($resultat['val']==1)
            {

            }
            else{
              $this->Secretariat->sendMailAttachement($data);
            }

        }
    }

    public function active_compte()
    {
        if($this->input->post('ajax') == '1') {
            $this->form_validation->set_rules('id', 'id', 'trim|required');
        }
        if($this->form_validation->run() == FALSE) {
            echo validation_errors();

            }
            else {
                $id=$this->input->post('id');
                $data = array(
                    'id' =>$id
                );

                $this->Secretariat->activecompte($data);

            }
    }

    public function updateinfo()
    {
        if($this->input->post('ajax') == '1') {
            $this->form_validation->set_rules('id', 'id', 'trim|required');
            $this->form_validation->set_rules('nom', 'nom', 'trim|required');
            $this->form_validation->set_rules('prenom', 'prenom', 'trim|required');
            $this->form_validation->set_rules('ville', 'ville', 'trim|required');
            $this->form_validation->set_rules('region', 'region', 'trim|required');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');
            $this->form_validation->set_rules('mail', 'mail', 'trim|required');
            //$this->form_validation->set_message('required', 'Please fill in the fields');
            if($this->form_validation->run() == FALSE) {

            echo validation_errors();
            }
            else {
                //var_dump($_POST);
                $id=$this->input->post('id');
                $nom=$this->input->post('nom');
                $prenom=$this->input->post('prenom');
                $ville=$this->input->post('ville');
                $region=$this->input->post('region');
                $phone=$this->input->post('phone');
                $mail=$this->input->post('mail');
//var_dump($_POST);
                $data = array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'telephone' => $phone,
                    'mail' => $mail,
                    'id' =>$id
                );
                $adresse=array('region'=>$region,'ville' => $ville);

                $this->Secretariat->update($data,$adresse);
            echo 'modification reussie';
            }

        }
    }

    public function suspension()
    {
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

                $this->Secretariat->suspension($data);
            }
        }
    }

}
