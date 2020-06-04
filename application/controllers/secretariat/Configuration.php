<?php
class Configuration extends My_Controller
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
        $this->configuration();
    }
    public function configuration(){
        $this->data['secre'] = $this->general->get('service');
        if(isset($_POST['submit'])){

            $caracteristique = $this->general->caracteristique($this->input->post('service'));
            $this->form_validation->set_error_delimiters('<p class="text-danger small" style="margin-top: -15px;margin-bottom: 9px;">', '</p>');

            foreach($caracteristique as $carac){
                $detail = json_decode($carac->detail);
                foreach($detail as $key=>$value)
                    $this->form_validation->set_rules('prix'.permalink($value,array($value),"_"), $carac->nom, 'trim|required|encode_php_tags');
            }
            if ($this->form_validation->run()) {

                if($this->general->existance($this->input->post('service')) == 0){ //si le sevrice n'est pas encore configuré
                    foreach($caracteristique as $carac) {
                        $detail = json_decode($carac->detail);
                        $prix = array();
                        foreach ($detail as $key => $value)
                            $prix[$value] = $this->input->post('prix' . permalink($value, array($value), "_"));
                        $prixfinal = json_encode($prix);
                        $data = array(
                            'user' => session_data('secre'),
                            'service' => $this->input->post('service'),
                            'caracteristique' => $carac->id,
                            'prixU' => $prixfinal,
                            'allpage'=>$this->input->post('check' . permalink($carac->nom, array($carac->nom), "_")) ? "1" : "0"
                        );

                        $this->general->configurate($data,1);

                        $this->data['success'] = 1;
                    }
                }else{
                    foreach($caracteristique as $carac) {
                        $detail = json_decode($carac->detail);
                        $prix = array();
                        foreach ($detail as $key => $value)
                            $prix[$value] = $this->input->post('prix' . permalink($value, array($value), "_"));
                        $prixfinal = json_encode($prix);
                        if($this->general->existanceCarac($carac->id) == 0){ // Si la carcteristique nest pas encore configurée on insère
                            $data = array(
                                'user' => session_data('secre'),
                                'service' => $this->input->post('service'),
                                'caracteristique' => $carac->id,
                                'prixU' => $prixfinal,
                                'allpage'=>$this->input->post('check'.permalink($carac->nom, array($carac->nom), "_"))? "1" : "0"
                            );
                            $this->general->configurate($data,1);
                        }else {
                            $data = array(
                                'prixU' => $prixfinal,
                                'allpage' => $this->input->post('check' . permalink($carac->nom, array($carac->nom), "_")) ? "1" : "0"
                            );
                            $this->general->configurate($data,2,$carac->id);
                        }
                        $this->data['success'] = 1;
                    }
                }


            }else{
                $this->data['affi'] = 1;
            }
        }
        $this->renderSecretariat('frontpage/secretariat/configuration/configuration','accueil');
    }
    public function displayInputs(){
        $service = $_POST['service'];
        if($this->general->existance($service) == 0){
            $this->data['caracteristique'] = $this->general->caracteristique($service);
            $this->load->view('frontpage/secretariat/configuration/displayInputs',$this->data);
        }else{
            $this->data['caracteristique'] = $this->general->caracteristique($service);
            $this->load->view('frontpage/secretariat/configuration/displayInputModif',$this->data);
        }

    }
}
