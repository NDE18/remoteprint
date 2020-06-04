<?php

class Offre_model extends My_model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_offre($id ='')
    {
      if($id==1){
        echo "ici1";
      $offre =$this->db->select('t.id as identifiant,t.statut as statuttransaction,t.*,of.*,ap.*,s.*,u.*')
      ->from($this->transaction.' t')
      ->join($this->offre.' of','t.offre=of.id','left')
      ->join($this->appelOffre.' ap','ap.id=of.appel_offre','left')
      ->join($this->secretariat.' s','s.id=of.secretariat','left')
      ->join($this->user.' u','u.id=ap.user')
      ->where(array('of.statut' => $id,'payer'=>0))
      ->get()->result();
    }
    else if($id==2)
    {
      echo "ici2";
      $offre =$this->db->select('t.id as identifiant,t.statut as statuttransaction,t.*,of.*,ap.*,s.*,u.*')
      ->from($this->transaction.' t')
      ->join($this->offre.' of','t.offre=of.id','left')
      ->join($this->appelOffre.' ap','ap.id=of.appel_offre','left')
      ->join($this->secretariat.' s','s.id=of.secretariat','left')
      ->join($this->user.' u','u.id=ap.user')
      ->where(array('of.statut' => $id,'payer'=>0))
      ->get()->result();
    }
    else if($id==3)
    {
      echo "ici3";
      $offre =$this->db->select('t.id as identifiant,t.statut as statuttransaction,t.*,of.*,ap.*,s.*,u.*')
      ->from($this->transaction.' t')
      ->join($this->offre.' of','t.offre=of.id','left')
      ->join($this->appelOffre.' ap','ap.id=of.appel_offre','left')
      ->join($this->secretariat.' s','s.id=of.secretariat','left')
      ->join($this->user.' u','u.id=ap.user')
      ->where(array('payer'=>1))
      ->get()->result();
    }
    else if($id==4)
    {
      echo "ici4";
      $offre =$this->db->select('t.id as identifiant,t.statut as statuttransaction,t.*,of.*,ap.*,s.*,u.*')
      ->from($this->transaction.' t')
      ->join($this->offre.' of','t.offre=of.id','left')
      ->join($this->appelOffre.' ap','ap.id=of.appel_offre','left')
      ->join($this->secretariat.' s','s.id=of.secretariat','left')
      ->join($this->user.' u','u.id=ap.user')
      ->where(array('of.statut' => $id,'payer'=>1))
      ->get()->result();
      
    }
    else if($id==5)
    {
      echo "ici5";
      $offre =$this->db->select('t.id as identifiant,t.statut as statuttransaction,t.*,of.*,ap.*,s.*,u.*')
      ->from($this->transaction.' t')
      ->join($this->offre.' of','t.offre=of.id','left')
      ->join($this->appelOffre.' ap','ap.id=of.appel_offre','left')
      ->join($this->secretariat.' s','s.id=of.secretariat','left')
      ->join($this->user.' u','u.id=ap.user')
      ->where(array('of.statut' => $id,'payer'=>1))
      ->get()->result();
      
    }
    else if($id==6)
    {
      echo "ici6";
      $offre =$this->db->select('t.id as identifiant,t.statut as statuttransaction,t.*,of.*,ap.*,s.*,u.*')
      ->from($this->transaction.' t')
      ->join($this->offre.' of','t.offre=of.id','left')
      ->join($this->appelOffre.' ap','ap.id=of.appel_offre','left')
      ->join($this->secretariat.' s','s.id=of.secretariat','left')
      ->join($this->user.' u','u.id=ap.user')
      ->where(array('of.statut' => $id,'payer'=>1))
      ->get()->result();
      
    }
    else if($id==7)
    {
      echo "ici7";
      $offre =$this->db->select('t.id as identifiant,t.statut as statuttransaction,t.*,of.*,ap.*,s.*,u.*')
      ->from($this->transaction.' t')
      ->join($this->offre.' of','t.offre=of.id','left')
      ->join($this->appelOffre.' ap','ap.id=of.appel_offre','left')
      ->join($this->secretariat.' s','s.id=of.secretariat','left')
      ->join($this->user.' u','u.id=ap.user')
      ->where(array('of.statut' => $id,'payer'=>1))
      ->get()->result();
      
    }

        else {
// faire une jointure avec le table appel_offre,offre,user,secretariat
          $offre =$this->db->select('t.id as identifiant,t.*,of.id as identifiantoffre,of.*,ap.*,s.id as secretariat,s.*,u.*,service.nom as nomservice')
          ->from($this->transaction.' t')
          ->join($this->offre.' of','t.offre=of.id','left')
          ->join($this->appelOffre.' ap','ap.id=of.appel_offre','left')
          ->join($this->secretariat.' s','s.id=of.secretariat','left')
          ->join($this->service.' service','service.id=ap.service','left')
          ->join($this->user.' u','u.id=ap.user')
          ->where(array('of.statut' => 4,'payer'=>1))
          ->get()->result();
        }
        return !empty($offre)?$offre:null;
    }

    public function get_offretraiter($id ='')
    {
      if($id)
      $offre =$this->db->select('t.id as identifiant,t.statut as statuttransaction,t.*,of.*,ap.*,s.*,u.*')
      ->from($this->offre.' of')
      ->join($this->transaction.' t','t.offre=of.id','left')
      ->join($this->appelOffre.' ap','ap.id=of.appel_offre','left')
      ->join($this->secretariat.' s','s.id=of.secretariat','left')
      ->join($this->user.' u','u.id=ap.user')
      ->where(array('of.statut'=>7,'payer'=>2))
      ->get()->result();

        else {
// faire une jointure avec le table appel_offre,offre,user,secretariat
          $offre =$this->db->select('t.id as identifiant,t.*,of.*,ap.*,s.id as secretariat,s.*,u.*,service.nom as nomservice')
          ->from($this->transaction.' t')
          ->join($this->offre.' of','t.offre=of.id','left')
          ->join($this->appelOffre.' ap','ap.id=of.appel_offre','left')
          ->join($this->secretariat.' s','s.id=of.secretariat','left')
          ->join($this->service.' service','service.id=ap.service','left')
          ->join($this->user.' u','u.id=ap.user')
          ->where(array('of.statut'=>7,'payer'=>2))
          ->get()->result();
        }
        return !empty($offre)?$offre:null;
    }


    public function Valider_transaction($data)
    {
    $transaction = $this->db->select('*')
      ->from($this->transaction)
      ->where(array('id'=>$data['id']))
      ->get()->result();

      if($transaction==null)
      {
      //  var_dump($transaction);
      }
      else {

        foreach ($transaction as $value) {

          if(strcmp($data['intitule'],$value->intitule)==0)
          {
            // changer le statut de la transaction
          /*  $modification_transaction= array('statut' => 1);
            $this->db->where('id',$data['id']);
            $this->db->update('transaction',$modification_transaction);*/
            // changer le statut de l offre et modifier ainsi l etat de l attribue payer à 1
              $modification_offre= array('statut' => 2,'payer'=>1);
              $this->db->where('id',$value->offre);
              $this->db->update('offre',$modification_offre);
              $changestatut= array('statut' => 1,'date'=>date('Y-m-d h:i:sa'));
              $this->db->where('id',$data['id']);
              $this->db->update('transaction',$changestatut);
            $resultat= array('val'=>1,'msg'=>'la transaction a bien ete valider');
          echo json_encode($resultat);
          }
          else {
            $resultat= array('val'=>0,'msg'=>'desole mais les numeros sont differents');
          echo json_encode($resultat);
          }
        }
      }

      return !empty($resultat)?$resultat:null;
    }

    public function stopper($data)
    {
      $offre = $this->db->select('*')
        ->from($this->offre)
        ->where(array('id'=>$data['id']))
        ->get()->result();

        if($offre==null)
        {
        //  var_dump($transaction);
      }
      else {
        foreach ($offre as $value) {

        $modification_offre= array('statut' => -4);
        $this->db->where('id',$data['id']);
        $this->db->update('offre',$modification_offre);

        $appeloffre = $this->db->select('appel_offre,secretariat')
          ->from($this->offre)
          ->where(array('id'=>$data['id']))
          ->get()->result();
          foreach ($appeloffre as $liste) {
            $modification_offre= array('statut' => 1);
            $this->db->where('id',$liste->appel_offre);
            $this->db->update('appel_offre',$modification_offre);
          }

          $this->db->set(array('designation' =>$data['motif'],'id_secretariat'=>$liste->secretariat,'id_offre'=>$data['id']))->insert($this->motif);
        $resultat= array('val'=>1,'msg'=>'l offre a bien ete stoppée');
      echo json_encode($resultat);
      }
      }

      return !empty($resultat)?$resultat:null;
    }

}
