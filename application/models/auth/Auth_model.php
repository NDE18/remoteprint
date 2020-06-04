<?php
class Auth_model extends My_Model {

    protected $data = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function auth($login, $pwd)
    {
        //$this->vardump($this);
        $user = $this->db->select('u.id')
            ->from($this->user.' u')
            ->join($this->admin.' a', 'a.user = u.id', 'left')
            ->where(array('a.login'=>$login, 'a.password'=>sha1($pwd), 'u.statue'=>'0'))
            ->where('u.role != \'2\'')
            ->get()->result();

        if(isset($user) And count($user)==1 )
        {
            $user = $user[0];
            $this->db->set('last_connexion',  moment()->format('Y-m-d H:i:s'))->where('user', $user->id)->update($this->admin);
            $this->data = array(
                'id'=>$user->id,
                'connect'=>true
            );
            set_session_data($this->data);
            return true;
        }
        return false;
    }
}