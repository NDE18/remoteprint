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
          $transaction =$this->db->select('t.id as identifiant,t.statut as statuttransaction,t.*,of.*,ap.*,s.id as secretariat,s.*,u.*')
          ->from($this->transaction.' t')
          ->join($this->offre.' of','t.offre=of.id','left')
          ->join($this->appelOffre.' ap','ap.id=of.appel_offre','left')
          ->join($this->secretariat.' s','s.id=of.secretariat','left')
          ->join($this->user.' u','u.id=ap.user')
          ->get()->result();
        }
        return $transaction;
    }
    public function get_transactionend($id ='')
    {
      if($id)
      $transaction =$this->db->select('t.id as identifiant,t.statut as statuttransaction,t.*,of.*,ap.*,s.*,u.*,cont.id as idcontentieux ,cont.statut as statutcontentieux,cont.*')
      ->from($this->transaction.' t')
      ->join($this->offre.' of','t.offre=of.id','left')
      ->join($this->appelOffre.' ap','ap.id=of.appel_offre','left')
      ->join($this->secretariat.' s','s.id=of.secretariat','left')
      ->join($this->user.' u','u.id=ap.user')
      ->join($this->contentieux.' cont','cont.offre=of.id','left')
      ->where(array('id'=>$id,'of.statut'=>OFTERMINERENCONTENCIEUX,'payer'=>1))
      ->get()->result();

        else {
// faire une jointure avec le table appel_offre,offre,user,secretariat
          $transaction =$this->db->select('t.id as identifiant,t.statut as statuttransaction,t.*,of.*,ap.*,s.id as secretariat,s.*,u.*,cont.id as idcontentieux ,cont.statut as statutcontentieux,cont.*')
          ->from($this->transaction.' t')
          ->join($this->offre.' of','t.offre=of.id','left')
          ->join($this->appelOffre.' ap','ap.id=of.appel_offre','left')
          ->join($this->secretariat.' s','s.id=of.secretariat','left')
          ->join($this->user.' u','u.id=ap.user')
          ->join($this->contentieux.' cont','cont.offre=of.id','left')
          ->where(array('of.statut'=>OFTERMINERENCONTENCIEUX,'payer'=>1))
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
              $modification_offre= array('statut' => OFFRECHOISIE ,'payer'=>OFFREPAYEE,'dateValidation'=>date('Y-m-d H:i:s'));
              $this->db->where('id',$value->offre);
              $this->db->update('offre',$modification_offre);
              /*$changestatut= array('statut' => 1,'dateValidation'=>date('Y-m-d h:i:sa'));
              $this->db->where('id',$data['id']);
              $this->db->update('transaction',$changestatut);*/
            $resultat= array('val'=>1,'msg'=>'la transaction a bien été validée');
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

    public function getcontentieux($id)
    {
      $offre=$this->db->select("o.*,o.id as idoffre,se.*, se.id as idsecretariat,se.statut as statusecretariat,cont.id as idcontentieux, cont.*,ap.id as idappeloffre,ap.*,u.id as userid,u.*")
        ->from($this->contentieux.' cont')
         ->join($this->offre.' o',"o.id=cont.offre",'left')
         ->join($this->appelOffre.' ap',"o.appel_offre=ap.id",'left')
         ->join($this->secretariat.' se',"o.secretariat=se.id",'left')
         ->join($this->user.' u',"u.id=ap.user",'left')
         //->where(array("o.appel_offre"=>$id))
         ->get()->result();

         return !empty($offre)?$offre:null;
    }

    public function Payer_transaction($data)
    {
      $transaction = $this->db->select('*')
        ->from($this->transaction)
        ->where(array('id'=>$data['id']))
        ->get()->result();
        foreach($transaction as $liste)
        {
          if($liste->intitule==$data['intitule'])
          {
            $resultat= array('val'=>0,'msg'=>'desole mais les numeros de transactions ne peut pas etre identique');
             echo json_encode($resultat);
          }
          else
          {
            $offre=$this->db->select('*')
            ->from($this->offre)
            ->where(array('id'=>$liste->offre))
            ->get()->result();
              foreach($offre as $offreliste)
              {
                if($offreliste->statut==OFTERMINERENCONTENCIEUX and $offreliste->payer==1)
                {
                  $d1=new datetime($offreliste->dateRecuperation);
                  $d2=new datetime("now");
                  $d3=$d1->diff($d2);
                  if($d3->format('%d')<7)
                  {
                    $resultat= array('val'=>0,'msg'=>'desole mais le nombre de jours avant le lancement d un contentieux n est pas encore terminé' );
                    echo json_encode($resultat);
                  }
                  else {
                  $contentieux=$this->db->select('*')
                  ->from($this->contentieux)
                  ->where(array('offre'=>$offreliste->id))
                  ->get()->result();

                  foreach($contentieux as $contentieuxliste)
                  {
                    if($contentieuxliste->statut==0)
                    {
                      $payementsecretariat= array('numtransactionadmin' => $data['intitule']);
                         $this->db->where('id',$data['id']);
                        $this->db->update('transaction',$payementsecretariat);
                        $updatestatoffre= array('statut' =>OFPAYERPARADMIN);
                         $this->db->where('id',$liste->offre);
                        $this->db->update('offre',$updatestatoffre);
                        $resultat= array('val'=>1,'msg'=>'payement effectué avec success en entente de la confirmation du secretariat');
                      echo json_encode($resultat);
                    }
                    else
                    {
                      $resultat= array('val'=>0,'msg'=>'desole mais le contentieux n est pas encore terminée');
                      echo json_encode($resultat);
                    }
                  }
                }
                }
                else
                {
                  $resultat= array('val'=>0,'msg'=>'desole mais l offre n est pas encore terminée');
                  echo json_encode($resultat);
                }
              }
          }
        }
        return !empty($resultat)?$resultat:null;
    }

}
