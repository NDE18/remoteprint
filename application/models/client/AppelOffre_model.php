<?php
class AppelOffre_model extends My_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insertAppel($data){
        $this->db->set($data)->insert($this->appelOffre);
        $id = $this->db->insert_id();
        $data2 = array(
          'numeroAppel'=> $this->getLastNumberAppel()->numeroAppel + 1
        );
        $this->db->set($data2)->update($this->parametre);
        return  $id;

    }
    public function insertDoc($data){
        $this->db->set($data)->insert($this->document);
    }
    public function getLastNumberAppel(){
        return $this->db->select('*')->from($this->parametre)->get()->result()[0];
    }
    public function getAppels(){
       return $this->db->select("$this->service.nom , $this->appelOffre.*")
           ->from($this->appelOffre)
           ->join($this->service,"$this->appelOffre.service = $this->service.id")
           ->where(array('user'=>session_data('id'),"$this->appelOffre.statut"=>0))
           ->order_by("dateL DESC")
           ->get()->result();
    }
    public function getInfoAppel($apppel){
        return $this->db->select("$this->service.nom , $this->appelOffre.*")
            ->from($this->appelOffre)
            ->join($this->service,"$this->appelOffre.service = $this->service.id")
            ->where("$this->appelOffre.id",$apppel)
            ->get()->result()[0];
        }
    public function nombreReponses($appel){
        $query = $this->db->select("*")
            ->from($this->appelOffre)
            ->join($this->offre,"$this->appelOffre.id = $this->offre.appel_offre")
            ->where("$this->appelOffre.id",$appel)
            ->get()->result();
        return count($query);
    }
    public function printOffre($appel){
        return $this->db->select("$this->appelOffre.caracteristique as detailAppel , $this->appelOffre.num ,$this->appelOffre.id as idAppel,
        $this->offre.*,$this->service.nom,$this->ville.ville,$this->region.nomregion,$this->secretariat.quartier ")
            ->from($this->service)
            ->join($this->appelOffre,"$this->service.id = $this->appelOffre.service")
            ->join($this->offre,"$this->appelOffre.id = $this->offre.appel_offre")
            ->join($this->secretariat,"$this->offre.secretariat = $this->secretariat.id")
            ->join($this->ville,"$this->secretariat.ville = $this->ville.id")
            ->join($this->region,"$this->ville.region = $this->region.id")
            ->where(array('appel_offre'=>$appel))
            ->order_by("$this->offre.prixTotal ASC")
            ->get()
            ->result();
    }
    public function getDevis($offre,$secretariat){
        return $this->db->select("$this->appelOffre.caracteristique as detailAppel , $this->user.nom as nomuser, $this->appelOffre.num ,$this->appelOffre.id as idAppel,
         $this->offre.*,$this->service.*,$this->ville.ville,$this->region.nomregion,$this->secretariat.quartier")
            ->from($this->service)
            ->join($this->appelOffre,"$this->service.id = $this->appelOffre.service")
            ->join($this->user,"$this->appelOffre.user = $this->user.id")
            ->join($this->offre,"$this->appelOffre.id = $this->offre.appel_offre")
            ->join($this->secretariat,"$this->offre.secretariat = $this->secretariat.id")
            ->join($this->ville,"$this->secretariat.ville = $this->ville.id")
            ->join($this->region,"$this->ville.region = $this->region.id")
            ->where(array('appel_offre'=>$offre,"$this->offre.secretariat"=>$secretariat))
            ->get()
            ->result()[0];
    }
    public function insertPaiement($dataInsert,$dataUpdateOffre,$dataUpdateAppelOffre,$data){
        $this->db->set($dataInsert)->insert($this->transaction);
        $this->db->set($dataUpdateOffre)->where('id',$data['offre'])->update($this->offre);
        $this->db->set($dataUpdateAppelOffre)->where('id',$data['Appeloffre'])->update($this->appelOffre);

    }
    public function checkIfExistChoosen($appel){
       $query = $this->db->select("*")
            ->from($this->service)
            ->join($this->appelOffre,"$this->service.id = $this->appelOffre.service")
            ->join($this->offre,"$this->appelOffre.id = $this->offre.appel_offre")
            ->join($this->secretariat,"$this->offre.secretariat = $this->secretariat.id")
            ->join($this->ville,"$this->secretariat.ville = $this->ville.id")
            ->join($this->region,"$this->ville.region = $this->region.id")
            ->where(array('appel_offre'=>$appel,"$this->offre.statut"=>OFFRECHOISIE))
            ->get()
            ->result();
        return count($query);
    }
    public function getServices(){
        return $this->db->select("*")->from($this->service)->where('statut',SERVICEACTIF)->get()->result();
    }
    public function countAppelOffre(){
        $query = $this->db->select('*')->from($this->appelOffre)->where("dateL LIKE '%".moment()->format('Y-m-d')."%'")
        ->where('user',session_data('id'))->get()->result();
        return count($query);
    }


}
