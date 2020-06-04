<?php
class Register_model extends My_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertUser($data){
        $currentNumbre = intval($this->getLastNumber()->numeroClient)+ 1;
        $data['numeroClient'] = generateCode($currentNumbre);
        $this->db->set($data)->insert($this->user);
        $id = $this->db->insert_id();
        $this->db->set('numeroClient',$currentNumbre)->update($this->parametre);
        $this->db->set(array('user'=>$id,'role'=>1,'statut'=>1))->insert($this->userRole);
        return $id;

    }
    public function inserSecre($secre,$data){
        $this->db->set($secre)->insert($this->secretariat);
        $id1 = $this->db->insert_id();
        $data['secretariat'] = $id1;
        $this->db->set($data)->insert($this->user);
        $id = $this->db->insert_id();
        $this->db->set('user',$id)->where('id',$id1)->update($this->secretariat);
        return  $this->db->set(array('user'=>$id,'role'=>2,'statut'=>0))->insert($this->userRole);

    }
    public function auth($data)
    {
        $user = $this->db->select('*')
            ->from($this->userRole)
            ->join($this->user,"$this->user.id = $this->userRole.user")
            ->group_start()
            ->where("login", $data['login'])
            ->or_where("mail", $data['login'])
            ->group_end()
            ->where(array('mdp'=>$data['mdp']))
            ->get()->result();
        if(isset($user) And count($user)==1 )
        {
            $user = $user[0];
            $name = $this->db->select('*')
                ->from($this->user)
                ->join($this->secretariat,"$this->user.secretariat = $this->secretariat.id",'left')
                ->where("$this->user.id = $user->id")
                ->get()
                ->result();
            $connect= array(
                'id'=>$user->id,
                'secre'=>$user->secretariat,
                'firstname'=>$user->nom,
                'lastname'=>$user->prenom,
                'login'=>$user->login,
                'role'=>$user->role,
                'secName'=>$name[0]->nomsecretariat,
                'secRespo'=>$name[0]->user,
                'secTel'=>$name[0]->telephone,
                'numeroClient'=>$user->numeroClient,
                'connect'=>true
            );
            if($user->statut == 1){
                if($user->role == SECRETARIAT){
                    $secre = $this->db->select('*')
                        ->from($this->secretariat)
                        ->where(array("id"=>$user->secretariat,"statut"=>1))
                        ->get()->result();
                    if(count($secre) == 1){
                        set_session_data($connect);
                        return 1;
                    }else{
                        return -3;
                    }
                }else{
                    set_session_data($connect);
                    return 1;
                }
            }else{
                return -2;
            }

        }else{
            return -1;
        }

    }
    public function authReseau($data){
        $user = $this->db->select('*')
            ->from($this->userRole)
            ->join($this->user,"$this->user.id = $this->userRole.user")
            ->group_start()
            ->where("login", $data['mail'])
            ->or_where("mail", $data['mail'])
            ->group_end()
            ->get()->result();
        if(isset($user) And count($user)==1 )
        {
            $user = $user[0];
            $name = $this->db->select('*')
                ->from($this->user)
                ->join($this->secretariat,"$this->user.secretariat = $this->secretariat.id",'left')
                ->where("$this->user.id = $user->id")
                ->get()
                ->result();
            $connect= array(
                'id'=>$user->id,
                'secre'=>$user->secretariat,
                'firstname'=>$user->nom,
                'lastname'=>$user->prenom,
                'login'=>$user->login,
                'role'=>$user->role,
                'secName'=>$name[0]->nomsecretariat,
                'secRespo'=>$name[0]->user,
                'secTel'=>$name[0]->telephone,
                'numeroClient'=>$user->numeroClient,
                'connect'=>true
            );
            if($user->statut == 1){
                if($user->role == SECRETARIAT){
                    $secre = $this->db->select('*')
                        ->from($this->secretariat)
                        ->where(array("id"=>$user->secretariat,"statut"=>1))
                        ->get()->result();
                    if(count($secre) == 1){
                        set_session_data($connect);
                        return 1;
                    }else{
                        return -3;
                    }
                }else{
                    set_session_data($connect);
                    return 1;
                }
            }else{
                return -2;
            }

        }else{
            return -1;
        }

    }
    public function getLastNumber(){
        return $this->db->select("*")->from($this->parametre)->get()->result()[0];
    }
    public function getVilles($val){
        return $this->db->select("*")->from($this->ville)->where('region',$val)->get()->result();
    }
    public function get($table){
        return $this->db->select("*")->from($this->$table)->get()->result();
    }
    public function checkIfExistEmail($email){
        return $this->db->select('*')->from($this->user)->where('mail',$email)->get()->result();

    }
    public function getInformations($email){
        return $this->db->select('*')
            ->from($this->userRole)
            ->join($this->user,"$this->user.id = $this->userRole.user")
            ->where('mail',$email)
            ->get()->result()[0];
    }
}
