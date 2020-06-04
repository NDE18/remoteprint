<?php

class Settings_model extends My_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_Settings($name, $section)
    {
        if (!is_string($name)){
            return false;
        }

        $result = $this->db->select($name)
            ->from($this->settings)
            ->where(array('session'=>$section))
            ->get()->result_array();

        if($result){
            return $result[0][$name];
        }
        return false;
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