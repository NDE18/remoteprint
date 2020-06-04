<?php

class Tarifs_model extends My_model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_Tarifs($id ='')
    {
      if($id)
    $tarifs =  $this->db->select('t.*')
        ->from($this->tarifs.' t')
        ->where(array('id'=>$id))
        ->get()->result();

        else {

          $tarifs =$this->db->select('t.*')
          ->from($this->tarifs.' t')
          ->get()->result();
        }
        return $tarifs;
    }

    public function save_tarifs($data)
    {
      for ($i=0; $i<count($data['prix_max']); $i++) {
        //  var_dump($data['prix_max'][$i]);
        //  var_dump($data['frais'][$i]);
        if($data['prix_max'][$i]>$data['frais'][$i])
        {
          $resultat=$this->db->select('t.*')
             ->from($this->tarifs.' t')
             ->where(array('prix_max'=>$data['prix_max'][$i],'frais'=>$data['frais'][$i]))
             ->get()
             ->result();
             if($resultat==null)
             {

             $result = $this->db->set(array('prix_max'=>$data['prix_max'][$i],'frais'=>$data['frais'][$i]))->insert($this->tarifs);

             }
             else {

                 $result=array('val' =>0 ,'msg'=>"desole mais ce Tarifs existe deja");
             }

      }

      else {
        $result= array('val' =>0 ,'msg'=>'desole mais le prix maximun doit depasse les frais');
      }
}

            return !empty($result)?$result:null;
    }

    public function update_tarifs($data)
    {
      if($data['prix_max'] and $data['frais']==null)
      {
        $resultat= array('val' =>0 ,'msg'=>'desole mais vous devez automatique inserer des valeurs');
        echo json_encode($resultat);
      }
      elseif ($data['prix_max']<=$data['frais']) {
        $resultat= array('val' =>0 ,'msg'=>'desole mais le prix maiximun doit obligatoirement etre superieur au frais' );
        echo json_encode($resultat);
      }
      else {
        $modification= array('prix_max'=>$data['prix_max'],'frais'=>$data['frais']);
        $this->db->where('id',$data['id']);
        $this->db->update('tarif_transaction',$modification);
        $resultat= array('val'=>1 ,'msg'=>'la Modification a ete effectue avec success');
        echo json_encode($resultat);
      }
      return !empty($resultat)?$resultat:null;
    }


}
