<?php
class Logs extends MY_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('settings_model','mSet');
        $this->load->library('form_validation');
        $this->load->model('logs_model','logs');
    }


    public function showAll($user = NULL)
    {

        $this->load->model('User_model', 'users');
        $this->data['user'] = "";
        if (empty($_POST)){
            if($user != NULL ){
                $this->data['user'] = $user;
                $this->data['logs']=$this->logs->get(null, null ,null , $user);
            }

            else
                $this->data['logs']=$this->logs->get(null,null, null ,null);
        } else
        {
            $this->data['title'] = $this->input->post('cuser')!="allcuser"?strtolower($this->input->post('cuser')):'Tous les utilisateurs';
            $cat=$this->input->post('cat')!="allcat"?$this->input->post('cat'):null;
            $cuser=$this->input->post('cuser')!="allcuser"?strtolower($this->input->post('cuser')):null;
            $debut=$this->input->post('debut')!=""?$this->input->post('debut'):null;
            $fin=$this->input->post('fin')!=""?$this->input->post('fin'):null;
            //var_dump($cat, $debut, $fin, $cuser); die;
            $this->data['logs']=$this->logs->get($cat, $debut, $fin, $cuser);
        }
        $this->data['cusers'] = $this->mSet->selectTableCriterion('*','user',array('secretariat'=>session_data('secre')),'nom','ASC');
        $this->renderSecretariat('frontpage/secretariat/logs/logList','Liste des logs');
    }
}