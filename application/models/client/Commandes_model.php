<?php
class Commandes_model extends My_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCommandes()
    {
        return $this->db->select("$this->appelOffre.caracteristique as detailAppel , $this->appelOffre.num ,$this->appelOffre.id as idAppel,
        $this->offre.*,$this->service.nom,$this->ville.ville,$this->region.nomregion,$this->secretariat.quartier ")
            ->from($this->service)
            ->join($this->appelOffre,"$this->service.id = $this->appelOffre.service")
            ->join($this->offre,"$this->appelOffre.id = $this->offre.appel_offre")
            ->join($this->secretariat,"$this->offre.secretariat = $this->secretariat.id")
            ->join($this->ville,"$this->secretariat.ville = $this->ville.id")
            ->join($this->region,"$this->ville.region = $this->region.id")
            ->group_start()
            ->where("$this->offre.statut", OFFRECHOISIE)
            ->or_where("$this->offre.statut", OFFREIMPRIMEE)
            ->or_where("$this->offre.statut", OFFRERECUPEREE)
            ->or_where("$this->offre.statut",  OFTERMINERENCONTENCIEUX)
            ->or_where("$this->offre.statut", OFTERMINER)
            ->group_end()
            ->where("$this->appelOffre.user",session_data('id'))
            ->order_by("$this->offre.dateChoisi DESC")
            ->get()
            ->result();

    }
    public function getDetails($offre,$secretariat){
        return $this->db->select("$this->appelOffre.caracteristique as detailAppel , $this->appelOffre.num ,$this->appelOffre.id as idAppel,
         $this->offre.*,$this->service.*,$this->ville.ville,$this->region.nomregion,$this->secretariat.quartier")
            ->from($this->service)
            ->join($this->appelOffre,"$this->service.id = $this->appelOffre.service")
            ->join($this->offre,"$this->appelOffre.id = $this->offre.appel_offre")
            ->join($this->secretariat,"$this->offre.secretariat = $this->secretariat.id")
            ->join($this->ville,"$this->secretariat.ville = $this->ville.id")
            ->join($this->region,"$this->ville.region = $this->region.id")
            ->where(array('appel_offre'=>$offre,'secretariat'=>$secretariat))
            ->get()
            ->result()[0];
    }
    public function CountTransactionOffre($offre){
      $query = $this->db->select('*')->from($this->transaction)->where("offre",$offre)->get()->result();
        return count($query);
    }
    public function getSecre($offre){
        return $this->db->select("*")
            ->from($this->offre)
            ->join($this->secretariat,"$this->secretariat.id = $this->offre.secretariat")
            ->join($this->ville,"$this->secretariat.ville = $this->ville.id")
            ->join($this->region,"$this->ville.region = $this->region.id")
            ->where("$this->offre.id",$offre )
            ->get()
            ->result()[0];
    }
    public function insertContencieux($data){
        return $this->db->set($data)->insert($this->contencieux);
    }
}