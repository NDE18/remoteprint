<?php

class Service_model extends My_model
{
    function __construct()
    {
        parent::__construct();
    }
// ce modele permet de recuperé tous les informations sur un utilisateurs (les secretariats)
    public function get_Service($id = '')
    {

        if ($id==1){
            $service = $this->db->select('s.id as identifiant,s.nom as nomservice,s.description,s.image,s.statut,c.*')
                ->from($this->service.' s')
                ->join($this->caracteristique .' c','c.service=s.id')
                ->where(array('s.statut'=>0))
                ->order_by('s.id ASC')
                ->get()->result();

            return $service;
        }
        elseif ($id==2) {
          $val=-1;
          $service = $this->db->select('s.id as identifiant,s.nom as nomservice,s.description,s.image,s.statut,c.*')
              ->from($this->service.' s')
              ->join($this->caracteristique .' c','c.service=s.id')
              ->where(array('s.statut'=>$val))
              ->order_by('s.id ASC')
              ->get()->result();

          return $service;
        }
        else
            $service = $this->db->select('s.id as identifiant,s.nom as nomservice,s.description,s.image,s.statut,c.*')
                ->from($this->caracteristique  . ' c')
                ->join($this->service.' s', 's.id=c.service')
                ->where(array('s.statut'=>0))
                ->order_by('service ASC')
                ->get()->result();

        return !empty($service)?$service:null;
    }

    public  function classes(){
        return $this->db->select("*")->from($this->classe)->get()->result();
    }

    public function insert($data){

        $this->db->trans_begin();

        $service_existe = $this->db->select("*")->from($this->service)->where(array('nom'=>$data['nom']))->get()->result();

       if($service_existe!=null)
       {
                $resultat=array('val'=>0,'msg'=>'desole mais se service existe deja');
       }
       else
       {
        /*var_dump($data);
        die;*/
                $this->db->set($data)->insert($this->service);
                $id = $this->db->insert_id();
                // $this->db->set(array('service'=>$id))->insert($this->caracteristique);

                $resultat=array('val'=>1,'msg'=>'service ajouter avec success');
       }
        if ($this->db->trans_status() === FALSE)
        {
         $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
            return !empty($resultat)?$resultat:null;
        }

    }
    public function insert_image($data)
    {
        $donne=array(
          'image'=>$data['image']
        );
        $this->db->where('id',$data['id']);
        $this->db->update('service',$donne);

        //echo "string";
    }
    public function caracteristique($data=array())
    {


        for($i=0;$i<count($data['nom']);$i++)
        {
             $service_existe = $this->db->select("*")->from($this->caracteristique)->where(array('service'=>$data['service'],'nom'=>$data['nom'][$i]))->get()->result();

        if($service_existe!=null)
       {
        $resultat=array('val'=>0,'msg'=>'desole mais la caracteiristique de se service existe deja');
       }
       else{

            $valeur=json_encode(explode(";",$data['detail'][$i]));

          $resultat= $this->db->set(array('service'=>$data['service'],'nom'=>$data['nom'][$i],'detail'=>$valeur))->insert($this->caracteristique);

        }
    }



        return !empty( $resultat)? $resultat:null;

    }
    public function get_Student_info($id_student)
    {
        return $this->db->select('cl.libelle, cl.abr')
            ->from($this->student.' st')
            ->join($this->classe.' cl', 'cl.id = st.classe_act', 'left')
            ->where(array('st.user'=>$id_student, 'cl.session'=>session_data('section')))
            ->get()->result();
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
    public function bloquer_service($data)
    {

      $service_existe=$this->db->select('ap.service')
              ->from($this->appelOffre.' ap')
              ->where(array('ap.service'=>$data))
              ->get()->result();

              if($service_existe!=null)
              {
                $resultat= array('val' =>0 ,'msg'=>'desole mais vous ne pouvez pas bloquer se service des appels d offre on ete lance le concernant');

              }
              else {
                $donne_modifier= array('statut' =>-1);
                $this->db->where('id',$data);
                $this->db->update('service',$donne_modifier);

                $resultat= array('val'=>1,'msg'=>'le service bien ete suspendu');

              }


              return !empty(json_encode($resultat))?json_encode($resultat):null;
        }


    public function get_adresse()
    {
        $adresse=  $this->db ->select('reg.*, adre.*')
            ->from($this->region.' reg')
            ->join($this->adresse.' adre', 'adre.region = reg.id', 'left')
            ->group_by('adre.region')
            ->get()->result();
            return !empty($adresse)?$adresse:null;
    }

    public function update($data)
    {

        $verif= $this->db->select('st.id , st.adresse')
        ->from($this->user.' st')
        ->where(array('st.id'=>$data['id']))
        ->get()->result();

        foreach($verif as $verification)
        {

            $verif1= $this->db->select('st.id,st.ville ,t.nomregion,st.region')
            ->from($this->adresse.' st')
            ->join($this->region.' t', 't.id=st.region')
            ->where(array('st.ville'=>$data['ville'],'t.nomregion'=>$data['region']))
            ->get()->result();

            if(empty($verif1))
            {
                $this->db->set(array('nomregion'=>$data['region']))->insert($this->region);

                $id_region=$this->db->insert_id();

                $this->db->set(array('ville'=>$data['ville'],'region'=>$id_region))->insert($this->adresse);

                $id_adresse=$this->db->insert_id();

                $donne=array(

                        'nom'=>$data['nom'],
                        'prenom'=>$data['prenom'],
                        'mail'=>$data['mail'],
                        'adresse'=>$id_adresse,
                        'telephone'=>$data['telephone']
                );

                $this->db->where('id', $data['id']);
                $this->db->update('user', $donne);

            }

            else{

                foreach($verif1 as $verification1)
                {

                    $donne=array(

                         'nom'=>$data['nom'],
                        'prenom'=>$data['prenom'],
                        'mail'=>$data['mail'],
                        'adresse'=>$verification1->id,
                        'telephone'=>$data['telephone']
                            );
                          $this->db->where('id', $data['id']);
                         $this->db->update('user', $donne);

                }
            }
            //var_dump($verif1);

        }

    }

  /*  public function getservicebloquer(){
        $data= $this->db->select("*")
           ->from($this->service.' s')
           ->where(array('s.statut'=>-1))
           ->get()->result();

          return !empty($data)?$data:null;
    }

    public function getServicevalide(){
        return $this->db->select("*")
            ->from($this->service.' s')
            ->where(array("$this->appelOffre.statut"=>1))
            ->get()
            ->result();

    }*/

}
