<?php
Class Commande extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->helper('configuration');
        $this->load->model('secretariat/Commande_model', 'commande');
        $this->load->model('client/AppelOffre_model','appelO');
        $this->load->model('secretariat/General_model','general');
        if (session_data('connect') == false) {
            redirect(base_url('account/signIn'));
        } elseif (session_data('role') == CLIENT or session_data('admin') == true) {
            redirect();
        }


    }
    public function index(){

    }
    public function liste(){
        $this->data['commandes'] = $this->commande->getCommandes();
        $this->renderSecretariat('frontpage/secretariat/commande/list', 'Liste commandes');
}
    public function updateImpression(){
        $offre = $_POST['id'];
        $this->commande->updateImpression($offre);
        $numero = $this->commande->getClient($offre);
        $dataNotif = array(
            'receiver_id'  => $numero->id,
            'message'=>"La commande <b>Cmd".$numero->num."</b> a bien été imprimée veuillez rentrer en contact avec le secretariat" ,
            'url'=>MESCOMMANDES
        );
        $this->notif->create($dataNotif);

    }

    public function updateRecuperer(){
        $offre = $_POST['id'];
        $this->db->set('statut',OFFRERECUPEREE)
            ->set('dateRecuperation',moment()->format('Y-m-d H:i:s'))
            ->where('id',$offre)->update('offre');
        $numero = $this->commande->getClient($offre);
        $dataNotif = array(
            'receiver_id'  =>  $numero->id,
            'message'=>"Notre système indique que la commande <b>Cmd".$numero->num."</b>a bien été récupérée. Vous disposez de 7 jours pour ouvrir un contencieux.Passés
            ces jours la commande sera fermée" ,
            'url'=>MESCOMMANDES
        );
        $this->notif->create($dataNotif);

    }

    public function detail(){
        $Aoffre = $_POST['Aoffre'];
        $this->data['apercuSec'] = $this->commande->getDevis($Aoffre,session_data('secre'));
        $this->load->view('frontpage/secretariat/commande/detail',$this->data);
    }
    public function detailClient(){
        $offre = $_POST['offre'];
        $this->data['client'] = $this->commande->getClient($offre);
        $this->load->view('frontpage/secretariat/commande/detailClient',$this->data);

    }
    public function telechargerDoc($appel){
        $this->load->model('secretariat/general_model','general');
        if(count($this->general->getDocuments($appel))>0)
        $this->data['documents'] = $this->general->getDocuments($appel);
        else
            redirect(base_url('secetariat/home'));
        $this->renderSecretariat('frontpage/secretariat/commande/telechargerDoc','accueil');
    }
    public function telechargerRecu($appel){
        $this->data['apercu'] = $this->appelO->getDevis($appel,session_data('secre'));
        $this->load->helper("html2pdf_helper");
        $content = $this->load->view('frontpage/secretariat/commande/pdfCommande', $this->data, TRUE);//die();
        try{
            $pdf = new HTML2PDF('P', 'A4', 'fr',true,"UTF-8",array(1,1,1,1));
            $pdf->pdf->setDisplayMode('fullpage');
            $pdf->writeHTML($content,isset($_GET['vuehtml']));
            ob_end_clean();
            $pdf->Output("appel_$appel.pdf");
        }catch (HTML2PDF_exception $e){
            die($e);
        }

    }
    public function printImage(){
        $doc = $_POST['doc'];
        ?>
        <a class='btn btn-primary' onclick="printJS('<?php echo base_url('assets/uploads/documents/').$doc?>', 'image');return false;"><i class='fa fa-print'></i> Imprimer</a>
        <a class='btn btn-primary' onclick="printJS('<?php echo base_url('assets/uploads/documents/').$doc?>', 'image');return false;"><i class='fa fa-download'></i> Télécharger</a>
        <br>
        <img src="<?php echo base_url('assets/uploads/documents/').$doc?>" alt=""/>
        <?php
    }


}