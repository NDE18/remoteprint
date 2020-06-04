<?php

class Contentieux_model extends My_model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_Contentieux($id="")
    {
        if($id){
            $contentieux=$this->db->select('cont.*,cont.id as idcontentieux,o.id as idoffre,o.*,o.caracteristique as offrecarac,secre.telephone as phonesecre,secre.id as idsecretariat,ap.id as idappeloffre,ap.*,ap.caracteristique as caracappel,secre.*,us.*')
            ->from($this->contentieux.' cont')
            ->join($this->offre.' o',"o.id=cont.offre","left")
            ->join($this->appelOffre.' ap',"ap.id=o.appel_offre","left")
            ->join($this->secretariat.' secre',"secre.id=o.secretariat","left")
            ->join($this->user.' us',"us.id=ap.user","left")
            ->where(array('cont.id'=>$id,'o.statut'=>5,'payer'=>1))
            ->get()->result();

        }
        else{

            $contentieux=$this->db->select('cont.*,cont.id as idcontentieux,o.id as idoffre,o.*,o.caracteristique as offrecarac,secre.telephone as phonesecre,secre.id as idsecretariat,ap.id as idappeloffre,ap.*,ap.caracteristique as caracappel,secre.*,us.*')
            ->from($this->contentieux.' cont')
            ->join($this->offre.' o',"o.id=cont.offre","left")
            ->join($this->appelOffre.' ap',"ap.id=o.appel_offre","left")
            ->join($this->secretariat.' secre',"secre.id=o.secretariat","left")
            ->join($this->user.' us',"us.id=ap.user","left")
            ->where(array('o.statut'=>5,'o.payer'=>1))
            ->get()->result();
        }
        return !empty($contentieux)?$contentieux:null;
    }

    public function regelemntcontentieux($inset = array())
    {
        
        if(!empty($inset['client']))
        {
            $this->db->set(array('contentieux'=>$inset['contentieux'],'administrateur'=>$_SESSION['id'],'message'=>$inset['message'],'client'=>
            $inset['client']))->insert($this->reglementContentieux);
        }
       else
        {
            $this->db->set(array('contentieux'=>$inset['contentieux'],'message'=>$inset['message'],'administrateur'=>$_SESSION['id'],'secretariat'=>
            $inset['secretariat']))->insert($this->reglementContentieux);
        }
        
       
    }

    public function all_Settings()
    {
         $result =$this->db->count_all_results('user');
                     //$this->db->from('user');
        $result1 =$this->db->count_all_results('secretariat');
         $result2 =$this->db->count_all_results('appel_offre'); 
         $result3 =$this->db->count_all_results('transaction');

                     //$this->db->from('user');
         /*$this->db->select('u.*,ur.*')
            ->from($this->user.' u')
            ->join($this->user_role.' ur','u.id = ur.user','left')
            ->where(array('role'=>1))
            ->get()
            ->result();*/
         $data=array('user'=>$result,'secretariat'=>$result1,'offre'=>$result2,'transaction'=>$result3);


            return $data;
    }

    public function get_SectionID($str, $object=false)
    {
        $result = $this->db->select()
            ->from($this->session)
            ->get()->result();
        if($result){
            foreach ($result as $index => $item) {
                $section = json_decode($item->libelle);
                if((is_numeric($str) And $str == $item->id) Or mb_strtolower($section->id) == mb_strtolower($str) Or mb_strtolower($section->name) == mb_strtolower($str)){
                    if ($object) return $item;
                    return (int) $item->id;
                }
            }
        }
        return false;
    }
}
