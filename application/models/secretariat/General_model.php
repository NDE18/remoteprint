<?php

/**
 * Created by PhpStorm.
 * User: alberttheophane
 * Date: 09/02/2018
 * Time: 10:14
 */
class General_model extends My_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function caracteristique($service){
        return $this->db->select('*')->from($this->caracteristique)->where('service',$service)->get()->result();
    }
    public function existance($service){
        $variable = $this->db->select('*')->from($this->configuration)->where(array('service'=>$service,'user'=>session_data('secre')))->get()->result();
        return count($variable);
    }
    public function existanceCarac($carac){
        $variable = $this->db->select('*')->from($this->configuration)->where(array('caracteristique'=>$carac,'user'=>session_data('secre')))->get()->result();
        return count($variable);
    }
    public function value($carac , $critere){//retourne la valeur d'un critere déjà paramétré

        $ligne = $this->db->select('*')->from($this->configuration)->where(array('caracteristique'=>$carac,'user'=>session_data('secre')))->get()->result();
        if(count($ligne) == 1){
            $prix = json_decode($ligne[0]->prixU,true);

            foreach($prix as $key=>$value){
                if($critere == $key){
                    return $value;
                }
            }
            return 0;
        }else{
            return 0;
        }

    }
    public function get($table){
        return $this->db->select('*')->from($table)->get()->result();
    }
    public function getInfo($caracteristique)
    {
        if (isset($this->db->select('*')->from($this->configuration)->where(array('user' => session_data('secre'), 'caracteristique' => $caracteristique))->get()->result()[0])) {
            return $this->db->select('*')->from($this->configuration)->where(array('user' => session_data('secre'), 'caracteristique' => $caracteristique))->get()->result()[0];
        }
    }
    public function configurate($data,$mode,$carac = NULL){
        if($mode == 1)
        return $this->db->set($data)->insert($this->configuration);
        else
            return $this->db->set($data)->where(array('caracteristique'=>$carac,'user'=>session_data('secre')))->update($this->configuration);
    }
    public function getAppel(){
        return $this->db->select("$this->service.*,$this->appelOffre.*,$this->ville.ville,$this->region.nomregion")
            ->from($this->service)
            ->join($this->appelOffre,"$this->service.id = $this->appelOffre.service")
            ->join($this->ville,"$this->appelOffre.ville = $this->ville.id")
            ->join($this->region,"$this->ville.region = $this->region.id")
            ->where(array("$this->appelOffre.statut"=>0))
            ->get()
            ->result();
    }
    public function getAppelSpe($id){
        return $this->db->select('*')->from($this->service)->join($this->appelOffre,"$this->service.id = $this->appelOffre.service")->where("$this->appelOffre.id",$id)->get()->result()[0];
    }
    public function totalPage($appel){
       $query =  $this->db->select('*')->from($this->document)->where('appel_offre',$appel)->get()->result();
        $total = 0;
        foreach($query as $que){
            $total = $total+$que->nombrepage;
        }
        return $total;
    }
    public function getCarac($id)
    {
        return $this->db->select('*')->from($this->caracteristique)->where('id',$id)->get()->result()[0]->nom;

    }

    public function getPrix($id)
   {
       return $this->db->select('*')->from($this->configuration)->where(array('user'=>session_data('secre'),'caracteristique'=>$id))->get()->result();
   }
   public function  addOffre($data)
   {
       return $this->db->set($data)->insert($this->offre);

   }
   public function ifExist($appel_offre){
       $query = $this->db->select('*')
           ->from($this->offre)
           ->where(array("appel_offre"=>$appel_offre,"secretariat"=>session_data('secre')))
           ->get()
           ->result();
       return count($query);
   }
   public function getAppelTraite(){
       return $this->db->select("$this->service.*,$this->appelOffre.*,$this->ville.ville,$this->region.nomregion")
           ->from($this->service)
           ->join($this->appelOffre,"$this->service.id = $this->appelOffre.service")
           ->join($this->ville,"$this->appelOffre.ville = $this->ville.id")
           ->join($this->region,"$this->ville.region = $this->region.id")
           ->join($this->offre,"$this->appelOffre.id = $this->offre.appel_offre")
           ->where(array("$this->offre.secretariat"=>session_data('secre')))
           ->get()
           ->result();

   }
    public function apercuDevis($appel){
        return $this->db->select("$this->appelOffre.caracteristique as detailAppel , $this->appelOffre.num ,$this->appelOffre.id as idAppel, $this->offre.*,$this->service.*")
            ->from($this->service)
            ->join($this->appelOffre,"$this->service.id = $this->appelOffre.service")
            ->join($this->offre,"$this->appelOffre.id = $this->offre.appel_offre")
            ->where(array('appel_offre'=>$appel,'secretariat'=>session_data('secre')))
            ->get()
            ->result()[0];

    }
    public function ifConfigurer($service){
        $query = $this->db->select('*')
            ->from($this->configuration)
            ->where(array("user"=>session_data('secre') , "service"=>$service))
            ->get()
            ->result();
        return count($query);
    }
   public function getTarif($prix){
       $query = $this->db->select('min(prix_max), frais')->from($this->tarif)->where("prix_max >= $prix")->get()->result()[0]->frais;
       if(count($query) == 1){
           return $query;
       }else{
           return  $query = $this->db->select('max(frais) as frais')->from($this->tarif)->get()->result()[0]->frais;
       }
   }
   public function getDocuments($appel){
       return $this->db->select('*')->from($this->appelOffre)
           ->join($this->document,"$this->appelOffre.id = $this->document.appel_offre")
           ->where('appel_offre',$appel)
           ->get()
           ->result();

   }



}