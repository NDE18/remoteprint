<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Client_model','Client');
        $this->load->library('form_validation');
        //$this->load->library('m_pdf');
    }
    

    public function afficher()
    {
        $this->data['adresse'] = $this->Client->get_adresse();
        $this->render('admin/client/new');

    }
    public function myformAjax($id) {

        $result = $this->db->where("region",$id)->get("ville")->result();
        
        echo json_encode($result);
        
        }
        
        public function test()
        {
             $this->render('admin/client/test');
        }
       
  
    public function save()
    {


            $this->form_validation->set_error_delimiters('<p style="color:red">',"<p>");
            $this->form_validation->set_rules('nom', 'nom', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('prenom', 'prenom', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('telephone', 'telephone', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('login', 'login', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
            $this->form_validation->set_rules('mdp', 'Mots de passe', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
         //  $this->form_validation->set_rules('region', 'region du client', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');
          //  $this->form_validation->set_rules('ville', 'ville du client', 'trim|required|min_length[1]|max_length[255]|encode_php_tags');

            if($this->form_validation->run())
            {
                

                $nom=$this->input->post('nom');
                $prenom=$this->input->post('prenom');
                $telephone=$this->input->post('telephone');
                $email=$this->input->post('email');
                $login=$this->input->post('login');
                $mdp=$this->input->post('mdp');
               // $region=$this->input->post('region');
                //$ville=$this->input->post('ville');

                $data = array('nom' => $nom,'prenom' => $prenom,'telephone' => $telephone,'mail' => $email,'login' => $login,'mdp' =>$mdp);
               // $adresse=array('region'=>$region,'ville'=>$ville);

               $resultat= $this->Client->insert($data);
               /*var_dump($resultat);
               die;*/
               if($resultat['val']==1)
               {
                redirect('admin/Client/liste');
                //$this->render('Client/liste','liste des clients');
               }
               else
               {
                if($resultat['val']==0){
                    $this->data['error'] = $resultat['msg'];
                $this->render('admin/client/new','ajout client');
                }
               }
            }
            else
            {
                $this->data['adresse'] = $this->Client->get_adresse();
                $this->render('admin/client/new','ajout client');
                $this->form_validation->error_array();
            }
    }

    public function upload()
    {
        $this->load->view('uploadform',array('error' => ' ' ));
    }
    public function save_upload()
    {
        $config['upload_path'] = 'assets/uploads/';
    $userfile='uploadfile1';
    // Uploading all type of file
    $config['allowed_types'] = '*';
    $this->load->library('upload', $config);
    if (! $this->upload->do_upload($userfile))
    {
      $data['error'] = array('error' => $this->upload->display_errors());
 
      $this->load->view('uploadform',$data);
    }
    else
    {
      $data = array('upload_data' => $this->upload->data($userfile));
 
      $this->load->view('uploadsuccess', $data);
    }
    }
    /* Afficher la liste des secretariats */ 

    public function liste(){

        $this->data['client'] = $this->Client->get_Client();
        $this->render('admin/client/liste','Liste des Clients');
    }
    
    
    public function l_client()
    {
        
        $this->data['client'] = $this->Client->get_Client(1);
        $this->render('admin/client/liste','Liste des Clients');
    }
    
    public function l_secretariat()
    {
        
        $this->data['client'] = $this->Client->get_Client(2);
        $this->render('admin/client/liste','Liste des Secretariats');
    }
    public function mypdf() {
         
         $data['page'] = 'export-pdf';
        $data['title'] = 'Export PDF data | Web Preparations';
       // $data['mobiledata'] = $this->pdf->mobileList();
		// load view file for output
       // $this->load->view('header');
        $this->load->view('service/mpdf', $data);
       // $this->load->view('footer');
         }
         public function save_pdf()
	{ 
		//load mPDF library
		$this->load->library('m_pdf'); 
		//now pass the data//
		//$data['mobiledata'] = $this->pdf->mobileList();
		$html=$this->load->view('service/mpdf', [], true); //load the pdf.php by passing our data and get all data in $html varriable.
		$pdfFilePath ="webpreparations-".time().".pdf";		
		//actually, you can pass mPDF parameter on this load() function
		$pdf = $this->m_pdf->load();
		//generate the PDF!
		$stylesheet = '<style>'.file_get_contents('assets/css/bootstrap.min.css').'</style>';
		// apply external css
		$pdf->WriteHTML($stylesheet,1);
		$pdf->WriteHTML($html,2);
		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
		$pdf->Output($pdfFilePath, "D");
		exit;
	}
    public function l_admin()
    {
        
        $this->data['client'] = $this->Client->get_Client(3);
        $this->render('admin/client/liste','Liste des Administrateurs');
    }
    public function changerrole()
    {
        $data=array('iduser'=>$_POST['iduser'],'role'=>$_POST['role']);
        $this->Client->changerole($data);
    }
    public function bloquer()
    {
        if($_POST['id'])
        {
            $id=$_POST['id'];
            $this->Client->bloquer($id);
        }
        //var_dump($_POST);
    }
    public function nombre()
    {
        $this->data['nombre'] = $this->Secretariat->get_user_number();
        $this->render();
    }

    public function updateinfo(){
        
                
        if($this->input->post('ajax') == '1') {
            $this->form_validation->set_rules('id', 'id', 'trim|required|min_length[1]|max_length[64]|encode_php_tags');
            $this->form_validation->set_rules('nom', 'nom', 'trim|required|min_length[1]|max_length[64]|encode_php_tags');
            $this->form_validation->set_rules('prenom', 'prenom', 'trim|required|min_length[1]|max_length[64]|encode_php_tags');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required|min_length[1]|max_length[64]|encode_php_tags');
            $this->form_validation->set_rules('mail', 'mail', 'trim|required|min_length[1]|max_length[64]|encode_php_tags');
            //$this->form_validation->set_message('required', 'Please fill in the fields');
            if($this->form_validation->run() == FALSE) {
                
            echo json_encode(validation_errors());
            } 
            else {
                $id=$this->input->post('id');          
                $nom=$this->input->post('nom');
                $prenom=$this->input->post('prenom');
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
                $this->Client->update($data);
                $data=array('val'=>1,'msg'=>'modification reussie');
            echo json_encode($data);
           
            }

        }
                //$this->render('client/liste','Liste des Clients');
            }

}