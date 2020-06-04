<?php

class Parametre_model extends My_model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_localite()
    {


        $resultat=$this->db->select('r.id as identifiant,COUNT(s.ville) as nombre , r.*,v.*')
                  ->from($this->region.' r')
                  ->join($this->ville.' v','v.region=r.id')
                  ->join($this->secretariat.' s','s.ville=v.id')
                //  ->group_by('r.nomregion')
                  ->get()->result();

                  return !empty($resultat)?$resultat:null;
    }

    public function all_Settings()
    {
         $result =$this->db->count_all_results('user');
                     //$this->db->from('user');
        $result1 =$this->db->count_all_results('secretariat');
         $result2 =$this->db->count_all_results('offre');
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
