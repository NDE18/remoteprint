<?php

class Client_model extends My_model
{
    function __construct()
    {
        parent::__construct();
    }
// ce modele permet de recuperé tous les informations sur un utilisateurs (les secretariats)
    public function get_Client($id = '')
    {
        /* cette fonction permet de selectionnér tout les secretariats
        en fonction de l'id et de maniere global*/


        if ($id==1){

            $client = $this->db->select('u.*,st.*')
                ->from($this->user.' u')
                ->join($this->user_role.' st', 'st.user = u.id', 'left')
               //->join($this->ville.' s', 's.id = u.adresse','left')
                //->join($this->region.' v','s.region=v.id','left')
                ->where(array('st.role'=>$id,'st.statut'=>1))
                ->order_by('user ASC')
                ->get()->result();


            return $client;
        }
        if ($id==2){

            $client = $this->db->select('u.*,st.*')
                ->from($this->user.' u')
                ->join($this->user_role.' st', 'st.user = u.id', 'left')
                //->join($this->ville.' s', 's.id = u.adresse','left')
                //->join($this->region.' v','s.region=v.id','left')
                ->where(array('st.role'=>$id,'st.statut'=>1))
                ->order_by('user ASC')
                ->get()->result();


            return $client;
        }
        if ($id==3){

            $client = $this->db->select('u.*,st.*')
                ->from($this->user.' u')
                ->join($this->user_role.' st', 'st.user = u.id', 'left')
                //->join($this->ville.' s', 's.id = u.adresse','left')
                //->join($this->region.' v','s.region=v.id','left')
                ->where(array('st.role'=>$id,'st.statut'=>0))
                ->order_by('user ASC')
                ->get()->result();


            return $client;
        }
    
        else
        //j aimerais selectionné les informations dans la table secretariat
        // dans la table user
        // dans la table adresse
        //dans la table region
            $client = $this->db->select('t.*,u.*')
                ->from($this->user . ' t')
                //->join($this->ville . ' s','s.id = t.adresse','left')
                //->join($this->region . ' v','s.region = v.id','left')
                ->join($this->user_role . ' u','u.user = t.id','left')
                ->order_by('user ASC')
                //->where(array('u.statut'=>0))
                ->get()->result();

        return $client;
    }

    public function insert($inset = array()){

        $this->db->trans_begin();

                $user = $this->db->select("*")->from($this->user)->where(array('mail'=>$inset['mail'],'telephone'=>$inset['telephone']))->get()->result();
                if($user==null)
                {
                     $this->db->set(array('nom'=>$inset['nom'],'prenom'=>$inset['prenom'],'mail'=>
                            $inset['mail'],'login'=>$inset['login'],'mdp'=>$inset['mdp'],'telephone'=>$inset['telephone']))->insert($this->user);
                            $id=$this->db->insert_id();
                            $this->db->set(array('user'=>$id,'role'=>'1','statut'=>'0'))->insert($this->user_role);
                           $resultat=array('val'=>1,'msg'=>"le client".$inset['nom']."a ete ajouté  avec success");
                }
                else{
                    $resultat=array('val'=>0,'msg'=>'desole mais cet email ou se numero de telephone existe deja existe deja');
                }

        if ($this->db->trans_status() === FALSE)
        {
         $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
            return !empty( $resultat)? $resultat:null;
        }

    }


    public function bloquer($identifiant)
    {
        $users=$this->db->select('u.*,us.*')
                        ->from($this->user.' u')
                        ->join($this->user_role.' us','us.user = u.id','left')
                        ->where(array('u.id'=>$identifiant))
                        ->get()->result();
        if($users==null)
        {

        }
        else
        {
            foreach($users as $m_users)
            {
                if($m_users->role==1)
                {
                    $donne=array(
                  'statut'=>3
                );
                $this->db->where('user',$identifiant);
                $this->db->update('user_role',$donne);
                $data=array('val'=>1,'message'=>'reussie');
                echo json_encode($data);
                }
                else {
                    if($m_users->role==2)
                    {
                         $donne=array(
                        'statut'=>3 );
                         $this->db->where('user',$identifiant);
                         $this->db->update('user_role',$donne);
                         $data=array('val'=>1,'message'=>'reussie');
                         echo json_encode($data);
                    }
                    else {
                        if($m_users->role==3)
                        {
                            $data=array('val'=>0,'msg'=>'Desole vous n avez pas le droit de bloquer un administrateur');
                            echo json_encode($data);
                        }
                    }
                }
            }


        }

            //var_dump($users);
    }
    public function get_user_number()
    {
        $nombre = $this->db->count_all('user');

        return $nombre;
    }

    public function get_adresse()
    {
        $adresse=  $this->db ->select('reg.*, adre.*')
            ->from($this->region.' reg')
            ->join($this->ville.' adre', 'adre.region = reg.id', 'left')
            ->group_by('adre.region')
            ->get()->result();
            return !empty($adresse)?$adresse:null;
    }

    public function changerole($data)
    {
       
        if($data['role']==1)
        {
            $donne=array(
                'role'=>$data['role'],
                'statut'=>0);
    $this->db->where('user', $data['iduser']);
    $this->db->update('user_role', $donne);
    $data=array('val'=>1,'msg'=>'votre modification a bien été prise en compte');
    echo json_encode($data);
        }
      /*  if($data['role']==2)
        {
            $donne=array(
                'role'=>$data['role'],
                'statut'=>0);
    $this->db->where('id', $data['iduser']);
    $this->db->update('user_role', $donne);
        }*/
        else
        {
            $donne=array(
                'role'=>$data['role'],
                'statut'=>0);
    $this->db->where('user', $data['iduser']);
    $this->db->update('user_role', $donne);
    $data=array('val'=>1,'msg'=>'votre modification a bien été prise en compte');
    echo json_encode($data);
        }

    }

    public function update($data)
    {

        /*$verif= $this->db->select('st.id , st.adresse')
        ->from($this->user.' st')
        ->where(array('st.id'=>$data['id']))
        ->get()->result();*/

        /*foreach($verif as $verification)
        {

          /*  $verif1= $this->db->select('st.id,st.ville ,t.nomregion,st.region')
            ->from($this->ville.' st')
            ->join($this->region.' t', 't.id=st.region')
            ->where(array('st.ville'=>$data['ville'],'t.nomregion'=>$data['region']))
            ->get()->result();*/

            /*if(empty($verif1))
            {
                $this->db->set(array('nomregion'=>$data['region']))->insert($this->region);

                $id_region=$this->db->insert_id();

                $this->db->set(array('ville'=>$data['ville'],'region'=>$id_region))->insert($this->ville);

                $id_adresse=$this->db->insert_id();*/

               /* $donne=array(

                        'nom'=>$data['nom'],
                        'prenom'=>$data['prenom'],
                        'mail'=>$data['mail'],
                        'telephone'=>$data['telephone']
                );

                $this->db->where('id', $data['id']);
                $this->db->update('user', $donne);

            }

            else{

                foreach($verif1 as $verification1)
                {*/



               /* }
            }
            //var_dump($verif1);

        }*/
         $donne=array(
                        'nom'=>$data['nom'],
                        'prenom'=>$data['prenom'],
                        'mail'=>$data['mail'],
                        'telephone'=>$data['telephone']);
            $this->db->where('id', $data['id']);
            $this->db->update('user', $donne);

    }
}
