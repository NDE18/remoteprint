<?php

class Appeloffre_model extends My_model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_client()
    {
        $client= $this->db->select('*')
            ->from($this->user)
            //->where(array('ex.student' => $idStudent, 'm.categorie_matiere' => $catMatiere, 'm.statue' => '0'))
            ->get()->result();
        $service=$this->db->select('s.*')
                ->from($this->service . ' s')
                ->get()->result();
        $region=$this->db->select('r.id as identifiant,r.*')
                ->from($this->region . ' r')
                ->get()->result();
                $resultat=array('client'=>$client,'service'=>$service,'region'=>$region);

                return $resultat;
    }

    public function save_appeloffre($data)
    {

        $client=$this->db->select('u.id')
                ->from($this->user .' u')
                ->join($this->user_role . ' ur', 'ur.user=u.id')
                ->where(array('u.id'=>$data['client']))
                ->get()->result();

            if(count($client)==0)
            {
                $resultat=array('val'=>0,'msg'=>'desole mais cet utilisateur n existe pas');

            }

            else{

                $service=$this->db->select('s.id as identifiant,s.nom,c.*')
                        ->from($this->service.' s')
                        ->join($this->caracteristique .' c','c.service=s.id','left')
                        ->where(array('c.service'=>$data['service']))
                        ->get()->result();

                        if(count($service)==0)
                        {
                             $resultat=array('val'=>0,'msg'=>'desole mais ce service n existe pas');
                        }
                        else {
                            $adresse=$this->db->select('id')
                                    ->from($this->ville)
                                    ->where(array('id'=>$_POST['region']))
                                    ->get()->result();

                                   if(count($adresse)==0)
                                   {
                                    $resultat=array('val'=>0,'msg'=>'desole mais cet adresse n existe pas');
                                   }
                                    else {
                                        $data1 = [];
                                        foreach($service as $liste)
                                        {
                                            $data1[]=$liste->nom;
                                        }
                                         $caracteristique=[];
                                        for($i=0;$i<count($data1);$i++)
                                        {
                                            $caracteristique[]=array("$data1[$i]"=>$data['detail'][$i]);
                                        }
                                        $valeur_inserer=array("num"=>$data['num'],"caracteristique"=>json_encode($caracteristique),"user"=>$data['client'],
                                                              "service"=>$data['service']);
                                          $this->db->set($valeur_inserer)->insert($this->appelOffre);
                                          $resultat=array('val'=>1,'msg'=>'insertion reussie');
                                $data2 = array(
                                 'numeroAppel'=> $this->getLastNumberAppel()->numeroAppel + 1
                               );
                               $this->db->set($data2)->update($this->parametre);

                                   }

                        }

            }

            return !empty($resultat)?$resultat:null;
    }

     public function getLastNumberAppel(){
        return $this->db->select('*')->from($this->parametre)->get()->result()[0];
    }
    public function getAppels(){
        $data= $this->db->select("ap.*,s.id as idservice,s.nom,u.id as iduser,u.login as nomuser,o.id as offre")
        
           ->from($this->appelOffre.' ap')
           ->join($this->service.' s',"ap.service = s.id",'left')
           ->join($this->user.' u',"ap.user=u.id",'left')
           ->join($this->offre.' o',"o.appel_offre=ap.id",'left')
           //->where(array("ap.statut"=>0))
           ->get()->result();
           

          return !empty($data)?$data:null;
    }
    public function getoffreid($id)
    {
      $offre=$this->db->select("o.*,o.id as idoffre,se.*, se.id as idsecretariat,se.statut as statusecretariat")
         ->from($this->offre.' o')
         ->join($this->secretariat.' se',"o.secretariat=se.id",'left')
         ->where(array("o.appel_offre"=>$id))
         ->get()->result();

         return !empty($offre)?$offre:null;
    }
    public function getAppelTraite(){
        return $this->db->select("ap.*,s.nom,u.login as nomuser,o.id as offre")
           ->from($this->appelOffre.' ap')
           ->join($this->service.' s',"ap.service = s.id")
           ->join($this->user.' u',"ap.user=u.id",'left')
           ->join($this->offre.' o',"o.appel_offre=ap.id",'left')
            ->where(array("ap.statut"=>-1))
            ->get()
            ->result();

    }
}
