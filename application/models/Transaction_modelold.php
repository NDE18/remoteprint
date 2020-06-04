<?php

class Transaction_model extends My_model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_transaction($id ='')
    {
      if($id)
      $transaction =$this->db->select('t.id as identifiant,t.statut as statuttransaction,t.*,of.*,ap.*,s.*,u.*')
      ->from($this->transaction.' t')
      ->join($this->offre.' of','t.offre=of.id','left')
      ->join($this->appelOffre.' ap','ap.id=of.appel_offre','left')
      ->join($this->secretariat.' s','s.id=of.secretariat','left')
      ->join($this->user.' u','u.id=ap.user')
      ->where(array('id'=>$id))
      ->get()->result();

        else {
// faire une jointure avec le table appel_offre,offre,user,secretariat
          $transaction =$this->db->select('t.id as identifiant,t.*,of.*,ap.*,s.*,u.*')
          ->from($this->transaction.' t')
          ->join($this->offre.' of','t.offre=of.id','left')
          ->join($this->appelOffre.' ap','ap.id=of.appel_offre','left')
          ->join($this->secretariat.' s','s.id=of.secretariat','left')
          ->join($this->user.' u','u.id=ap.user')
          ->get()->result();
        }
        return $transaction;
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

    public function suspendre_transaction($data)
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

        $modification_transaction= array('statut' => -1);
        $this->db->where('id',$data['id']);
        $this->db->update('transaction',$modification_transaction);

        $appeloffre = $this->db->select('appel_offre')
          ->from($this->offre)
          ->where(array('id'=>$value->offre))
          ->get()->result();
          foreach ($appeloffre as $liste) {
            $modification_offre= array('statut' => -1);
            $this->db->where('id',$liste->appel_offre);
            $this->db->update('appel_offre',$modification_offre);
          }

          $this->db->set(array('designation' =>$data['motif'],'id_transaction'=>$data['id']))->insert($this->motif);
        $resultat= array('val'=>1,'msg'=>'la transaction a bien ete suspendu');
      echo json_encode($resultat);
      }
      }

      return !empty($resultat)?$resultat:null;
    }

}
