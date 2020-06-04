<?php

/**
 * Created by PhpStorm.
 * User: alberttheophane
 * Date: 09/02/2018
 * Time: 10:14
 */
class Commande_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCommandes()
    {
        return $this->db->select("$this->appelOffre.caracteristique as detailAppel , $this->appelOffre.num ,$this->appelOffre.id as idAppel,
        $this->offre.*,$this->service.nom,$this->ville.ville,$this->region.nomregion,$this->user.telephone,$this->user.nom as nomClient,$this->user.numeroClient ")
                ->from($this->service)
                ->join($this->appelOffre,"$this->service.id = $this->appelOffre.service")
                ->join($this->offre,"$this->appelOffre.id = $this->offre.appel_offre")
                ->join($this->user,"$this->appelOffre.user = $this->user.id")
                ->join($this->ville,"$this->appelOffre.ville = $this->ville.id")
                ->join($this->region,"$this->ville.region = $this->region.id")
                ->where(array("$this->offre.payer"=>OFFREPAYEE,"$this->offre.secretariat"=>session_data('secre')))
                ->order_by("$this->offre.dateValidation ASC")
                ->get()
                ->result();
    }
    public function  updateImpression($offre){
        return $this->db->set("statut",OFFREIMPRIMEE)->where('id',$offre)->update($this->offre);
    }
    public function getDevis($offre){
        return $this->db->select("$this->appelOffre.caracteristique as detailAppel , $this->appelOffre.num ,$this->appelOffre.id as idAppel,
         $this->offre.*,$this->service.*,$this->ville.ville,$this->region.nomregion,$this->secretariat.quartier")
            ->from($this->service)
            ->join($this->appelOffre,"$this->service.id = $this->appelOffre.service")
            ->join($this->offre,"$this->appelOffre.id = $this->offre.appel_offre")
            ->join($this->secretariat,"$this->offre.secretariat = $this->secretariat.id")
            ->join($this->ville,"$this->secretariat.ville = $this->ville.id")
            ->join($this->region,"$this->ville.region = $this->region.id")
            ->where(array('appel_offre'=>$offre,'secretariat'=>session_data('secre')))
            ->get()
            ->result()[0];
    }

    public function getClient($offre){
        return $this->db->select("$this->user.*,$this->appelOffre.num")
            ->from($this->offre)
            ->join($this->appelOffre,"$this->offre.appel_offre = $this->appelOffre.id")
            ->join($this->user,"$this->appelOffre.user = $this->user.id")
            ->where("$this->offre.id",$offre )
            ->get()
            ->result()[0];
    }
}