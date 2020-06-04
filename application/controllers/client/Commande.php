<?php
/**
 * Created by PhpStorm.
 * User: alberttheophane
 * Date: 18/12/2017
 * Time: 21:58
 */
Class Commande extends My_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->helper('configuration');
        $this->load->model('client/commandes_model','commandes');
        if(session_data('connect') == false){
            redirect(base_url('account/signIn?redirect=client/appel'));
        }elseif(session_data('admin') == true){
            redirect();
        }
    }

    public function index(){
        $this->liste();
    }
    public function liste(){
        $this->data['cmds'] = $this->commandes->getCommandes();
        if(isset($_POST['transaction'])){
            $this->form_validation->set_rules('numeroTransac', '"numeroTransac"', 'trim|required|encode_php_tags');
            if ($this->form_validation->run()) {
                $this->load->model('client/AppelOffre_model','appelO');
                $dataInsert = array(
                    'intitule'=>htmlspecialchars($this->input->post('numeroTransac')),
                    'offre'=>htmlspecialchars($_POST['offre'])
                );
                $dataUpdateOffre = array(
                    'statut'=>OFFRECHOISIE,
                    'payer'=>OFFREIMPAYEE
                );
                $dataUpdateAppelOffre = array(
                    'statut'=>APPELTRAITE
                );
                $this->appelO->insertPaiement($dataInsert,$dataUpdateOffre,$dataUpdateAppelOffre,$_POST);
                set_flash_data("Votre numéro de transaction a bien été  enrégistré.Nous allons vérifier l\'effectivité de ce paiement avant de lancer votre impression");
                redirect(base_url('client/commande/liste'));
        }
        }
        if(isset($_POST['contencieux'])){
            $this->form_validation->set_rules('objet', '"objet"', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('message', '"message"', 'trim|required|encode_php_tags');
            if ($this->form_validation->run()) {

                $dataInsert = array(
                    'objet'=>htmlspecialchars($this->input->post('objet')),
                    'detail'=>htmlspecialchars($this->input->post('message')),
                    'user'=>session_data('id'),
                    'offre'=>htmlspecialchars($this->input->post('offre'))
                );

                $this->commandes->insertContencieux($dataInsert);
                $this->db->set('statut',OFTERMINERENCONTENCIEUX)->where('id',$this->input->post('offre'))->update('offre');
                set_flash_data("Votre contencieux a bien été enrégistré.Nous allons le traiter sous peu.");
                redirect(base_url('client/commande/liste'));
            }
        }
        $this->renderFront('frontpage/client/commande/list','Apercu de mes commandes',array('Espace membre','Apercu de mes commandes'));
    }

    public function detail(){
        $offre = $_POST['offre'];
        $secretariat = $_POST['secretariat'];
        $this->data['prixT'] =  $_POST['prixT'];
        $this->data['offres'] =  $_POST['offres'];
        $this->data['offre'] = $offre;
        $this->data['secre'] = $secretariat;
        $this->data['apercu'] = $this->commandes->getDetails($offre,$secretariat);



        $this->load->view('frontpage/client/commande/details',$this->data);
    }
    public  function  edittransac(){
        $offre = $_POST['offre'];
        $tenta = $this->commandes->CountTransactionOffre($offre);
        if((3 - $tenta) > 0){
            $this->data['offre'] = $offre;
            $this->data['tenta'] = $tenta;
            $this->load->view('frontpage/client/commande/edittransac',$this->data);
        }
    }
    public function contencieux(){
        $offre = $_POST['offre'];
        $this->data['offre'] = $offre;
        $this->load->view('frontpage/client/commande/contencieux',$this->data);
    }
    public function detailSecre(){
        $offre = $_POST['offre'];
        $this->data['secre'] = $this->commandes->getSecre($offre);
        $this->load->view('frontpage/client/commande/detailSecre',$this->data);
    }


}