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
            ->join($this->user_role.' a', 'a.user = u.id', 'left')
           // ->where(array('u.login'=>$login, 'u.mdp'=>sha1($pwd), 'a.statue'=>'0'))
           ->where(array('u.login'=>$login, 'u.mdp'=>$pwd, 'a.statut'=>'0'))
            //->where('a.role != \'2\'')
            ->get()->result();
        
        if(isset($user) And count($user)==1 )
        {
            $user = $user[0];
            $id_user=$this->db->select('u.user')
                    ->from($this->user_role.' u')
                    ->where('u.user'==$user->id);
            $this->db->set('last_connexion',  moment()->format('Y-m-d H:i:s'))->where($id_user, $user->id)->update($this->user);
            $this->data = array(
                'id'=>$user->id,
                'role'=>$id_user->role,
                'connect'=>true,
				'admin'=>true
            );
            var_dump($this->data);
            set_session_data($this->data);
            return true;
        }
        return false;
    }
}