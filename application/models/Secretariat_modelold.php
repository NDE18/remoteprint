<?php

class Secretariat_model extends My_model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('email');
        $this->email = new email();
    }
    // ce modele permet de recuperé tous les informations sur un utilisateurs (les secretariats)
        public function get_Secretariat($id = '')
        {
            /* cette fonction permet de selectionnér tout les secretariats
            en fonction de l'id et de maniere global*/

            if ($id)
                $secretariat = $this->db->select('u.*,st.mail')
                    ->from($this->secretariat.' u')
                    ->join($this->user.' st', 'st.id = u.user', 'left')
                    ->where(array('u.id'=>$id))
                    ->get()->result();
            else
            //j aimerais selectionné les informations dans la table secretariat
            // dans la table user
            // dans la table adresse
            //dans la table region
                $secretariat = $this->db->select('u.id,u.nomsecretariat,u.statut,u.telephone,u.boitepostal,s.ville,v.nomregion,t.nom')
                    ->from($this->secretariat . ' u')
                    ->join($this->user . ' t','u.user = t.id','left')
                    ->join($this->ville . ' s','u.ville = s.id','left')
                    ->join($this->region . ' v','s.region = v.id','left')
                    //->where(array('u.user = t.id','u.adresse = s.id','s.region = v.id'))
                   // ->where('u.user = t.id')
                    ->where('u.statut = 0')
                    ->order_by('user ASC')
                    ->get()->result();

                      return !empty($secretariat)?$secretariat:null;


        }

        public function getsecretariat_affilier($id = '')
        {

                  if ($id)
                      $secretariat = $this->db->select('u.*')
                          ->from($this->secretariat.' u')
                          ->join($this->user.' st', 'st.user = u.id', 'left')
                          ->where(array('u.id'=>$id))
                          ->get()->result();

                  else
                  //j aimerais selectionné les informations dans la table secretariat
                  // dans la table user
                  // dans la table adresse
                  //dans la table region
                      $secretariat = $this->db->select('u.id,u.nomsecretariat,u.statut,u.telephone,u.boitepostal,s.ville,v.nomregion,t.nom')
                          ->from($this->secretariat . ' u')
                          ->join($this->user . ' t','u.user = t.id','left')
                          ->join($this->ville . ' s','u.ville = s.id','left')
                          ->join($this->region . ' v','s.region = v.id','left')
                          ->where(array('u.statut' => 1, 'u.contrat'=>1))
                          ->order_by('user ASC')
                          ->get()->result();

                  return $secretariat;
        }

        public function get_suspension_Secretariat($id = '')
        {
            /* cette fonction permet de selectionnér tout les secretariats
            en fonction de l'id et de maniere global*/

            if ($id)
                $secretariat = $this->db->select('u.*')
                    ->from($this->secretariat.' u')
                    ->join($this->user.' st', 'st.user = u.id', 'left')
                    ->where(array('u.id'=>$id))
                    ->get()->result();
            else
            //j aimerais selectionné les informations dans la table secretariat
            // dans la table user
            // dans la table adresse
            //dans la table region
                $secretariat = $this->db->select('u.id,u.nomsecretariat,u.statut,u.telephone,COUNT(m.id_secretariat) as nombre,s.ville,v.nomregion,t.nom')
                    ->from($this->secretariat . ' u')
                    ->join($this->user . ' t','u.user = t.id','left')
                    ->join($this->ville . ' s','u.ville = s.id','left')
                    ->join($this->region . ' v','s.region = v.id','left')
                    ->join($this->motif.' m','u.id=m.id_secretariat')
                    ->group_by('m.id_secretariat')
                    //->where(array('u.user = t.id','u.adresse = s.id','s.region = v.id'))
                    ->where('u.user = t.id')
                    ->where('u.statut = 3')
                    ->or_where('u.statut = -1')
                    //->order_by('user ASC')
                    ->get()->result();
            $motifs="";
            foreach($secretariat as $valeur)
            {
                $motifs=$this->db->select('m.*')
                                ->from($this->motif.' m')
                                ->where(array('m.id_secretariat'=>$valeur->id))
                                ->get()
                                ->result();
            }
            $data=array("motif"=>$motifs,"secretariat"=>$secretariat);
            
            return $data;
        }

        public function insert($inset = array(),$data= array(),$data1=array()){
             $this->db->trans_start();
            var_dump($data1);
           // $this->db->set($inset)->insert($this->user);
           $user=$this->db->select("*")->from($this->user)->where(array('mail'=>$inset['mail'],'telephone'=>$inset['telephone']))->get()->result();
           if($user!=null){
            $resultat=array('val'=>0,'msg'=>'desole mais l email et le numero de telephone de se user existe deja');
           }
           else{

             $this->db->set(array('nom'=>$inset['nom'],'prenom'=>$inset['prenom'],'telephone'=>$inset['telephone'],'mail'=>$inset['mail'],'login'=>$inset['login'],'mdp'=>sha1($inset['mdp'])))->insert($this->user);
            $id = $this->db->insert_id();
            $region=$data1['region'];
            $verif1 = $this->db->select("*")->from($this->region)->where("id='$region'")->get()->result();

            if($verif1==null)
            {
                $this->db->set(array('nomregion'=>$region))->insert($this->region);
                $id_region=$this->db->insert_id();
                $this->db->set(array('ville'=>$data1['ville'],'region'=>$id_region))->insert($this->ville);
                $id_adresse=$this->db->insert_id();
                $this->db->set(array('user'=>$id,'nomsecretariat'=>$data['nom'],'boitepostal'=>
                $data['boite-postal'],'ville'=>$id_adresse,'telephone'=>$data['telephone']))->insert($this->secretariat);
                $secretariat=$this->db->insert_id();
                $info=array(
                            'secretariat'=>$secretariat,
                            );
                    $this->db->where('id',$id);
                    $this->db->update('user', $info);
                $this->db->set(array('user'=>$id,'role'=>'1','statut'=>'0'))->insert($this->user_role);
               $resultat=array('val'=>1,'msg'=>'enregistrement effectue avec success');
            }
            else{
                //var_dump($verif1);
                foreach($verif1 as $verification)
                {
                    $id_region=$verification->id;

                    $verif=$this->db->select("*")->from($this->ville)->where(array('id'=>$data1['ville'],'region'=>$id_region))->get()->result();

                    if($verif==null){

                    $this->db->set(array('ville'=>$data1['ville'],'region'=>$id_region))->insert($this->ville);
                    $id_adresse=$this->db->insert_id();
                    $this->db->set(array('user'=>$id,'nomsecretariat'=>$data['nom'],'boitepostal'=>
                    $data['boite-postal'],'ville'=>$id_adresse,'telephone'=>$data['telephone']))->insert($this->secretariat);
                     $secretariat=$this->db->insert_id();
                    $info=array(
                            'secretariat'=>$secretariat,
                            );
                    $this->db->where('id',$id);
                    $this->db->update('user', $info);
                    $this->db->set(array('user'=>$id,'role'=>'1','statut'=>'0'))->insert($this->user_role);
                    $resultat=array('val'=>1,'msg'=>'enregistrement effectue avec success');
                        }

                    else{
                       // var_dump($verif1);
                        foreach ($verif as $verification1) {
                            # code...
                            $this->db->set(array('user'=>$id,'nomsecretariat'=>$data['nom'],'boitepostal'=>
                            $data['boite-postal'],'adresse'=>$verification1->id,'telephone'=>$data['telephone']))->insert($this->secretariat);
                            //$id=$this->db->insert_id();
                             $secretariat=$this->db->insert_id();
                         $info=array(
                            'secretariat'=>$secretariat,
                            );
                    $this->db->where('id',$id);
                    $this->db->update('user', $info);
                            $this->db->set(array('user'=>$id,'role'=>'1','statut'=>'0'))->insert($this->user_role);
                            $resultat=array('val'=>1,'msg'=>'enregistrement effectue avec success');
                        }
                    }
                }

            }

            }
            $this->db->trans_complete();
            return !empty( $resultat)? $resultat:null;

        }
        public function sendMailAttachement($data){
		$this->db->trans_begin();
    //var_dump($data);
        $secretariat=$this->get_Secretariat($data['id']);
        /*var_dump($secretariat);
        die;
      /*  $ecole=$this->getEcole(intval($dossier))[0];
        $b = $this->db->query("update candidat set pwd='".sha1($pwd)."' WHERE candidat.id=".$candidat.";");*/
        $cd=$this->get_Secretariat($data['id'])[0];
        var_dump($cd);
        /*$nd = $cycle."_fiche_candidature_".$nom."_".$num;
        $nom_doc = "assets/documents/$nd.pdf";*/
        if($this->db->trans_status()==TRUE){
            // envoi du mail
            $mail['mail']=new stdClass();
            $mail['mail']->title='Dossier d affiliation a Remote-print';
          /*  if (session_data('lang')=="FR")
            {
                $mail['mail']->message="Votre candidature pour le concours d'entrée à  a été retenue.<br>
                                        <br>Pour des raisons de sécurité, veuillez utiliser ces nouveaux paramètres pour vous connecter à la plateforme et télécharger votre fiche de candidature ou la modifier:<br><ul><li><b>Login: </b>&nbsp;<b>".$cd->email."</b></li><li><b>Mot de passe: </b>&nbsp;<b>".$pwd."</b></li></ul><br>
										<a target='_blank' href='".base_url()."index.php/auth'><u>Cliquez ici pour vous connecter</u></a>.<br>
										La fiche que vous téléchargerez vous aidera à compléter votre dossier physique.<br>
										<br><b>N.B.:&nbsp;</b>Ce compte est temporaire et sera supprimé 7 jours à compter de la date de votre inscription. ";
            } else
            {*/
                $mail['mail']->message="Your application for the entrance examination to  has been retained.
                                        <br>For possible modifications, please use the following parameters: <br><ul><li><b>Login: </b>&nbsp;<b>".$cd->mail."</b></li><li><b>Password: </b>&nbsp;<b></b></li></ul>
                                        <br><b>N.B.:&nbsp;</b>This account is temporary and will be deleted in a week from today.";
            //}


            $this->email->mailView($mail['mail']->title, 'email', $mail);
            //$this->email->addAttachment(FCPATH."assets/documents/$nd.pdf", $nd);
            //var_dump($cd); die;
            $this->email->to($cd->mail);
            $test = $this->email->send()->statue;

            //$this->email->clearAttachments();
            //$this->email->clearTo();
            if ($test==true)
            {

                $this->db->trans_commit();
                //return $nom_doc
                return true;
            } else
            {
                $this->db->trans_rollback();
                return false;
            }
        }{
			return false;
		}
    }
        public function activecompte($data)
        {

            $this->db->trans_start();
            $vsuspendu=$this->db->select('COUNT(m.id_secretariat) as nombre')->from($this->motif.' m')
                                 ->where(array('m.id_secretariat'=>$data['id']))->get()->result();

           $contratexiste=$this->db->select('contrat')->from($this->secretariat.' s')
                      ->where(array('s.id'=>$data['id']))->get()->result();
                                // var_dump($vsuspendu);
                              if ($vsuspendu[0]->nombre < 5) {
                                # code...

                    if($contratexiste[0]->contrat)
                    {
                        $info = array('val'=>1,'msg'=>'ce secretariat est de nouveau un de vos parternaires');

                        $data1=array(
                            'statut'=>'1',
                            );
                    $this->db->where('id',$data['id'] );
                    $this->db->update('secretariat', $data1);
                        echo json_encode($info);
                    }

                    else {
                      # code...
                      $data1=array(
                          'statut'=>'0',
                          );
                  $this->db->where('id', $data['id']);
                  $this->db->update('secretariat', $data1);

                      $info = array('val'=>2,'msg'=>'Compte reactive avec success mais le contrat n est toujours pas valider');

                      echo json_encode($info);

                    }

                    }
                    else {

                      $data1=array(
                          'statut'=>'-1',
                          );
                  $this->db->where('id', $data['id']);
                  $this->db->update('secretariat', $data1);

                      $info = array('val'=>0,'msg'=>'Desole mais vous ne pouvez plus active le compte de se secretariat');

                      echo json_encode($info);

                    }

             $this->db->trans_complete();
        }
    public function get_Student_info($id_student)
    {
        return $this->db->select('cl.libelle, cl.abr')
            ->from($this->student.' st')
            ->join($this->classe.' cl', 'cl.id = st.classe_act', 'left')
            ->where(array('st.user'=>$id_student, 'cl.session'=>session_data('section')))
            ->get()->result();
    }

    public function condition($data)
    {
        $verif=$this->db->select("*")->from($this->secretariat)->where(array('id'=>$data['id']))->get()->result();

        if($verif==null)
        {
            echo "desole mais ce secretariat n existe pas"; /*je suis encore perplexe ici */
        }
        else {
            foreach ($verif as $verification) {

                if($verification->contrat==0)
                {
                    $info = array('val'=>1,'msg'=>'desole mais ce secretariat n a pas accepte les termes du contrat');
                    echo json_encode($info);
                }
                elseif ($verification->contrat==1) {

                    $donne=array(
                            'statut'=>'1',
                            );
                    $this->db->where('id', $data['id']);
                    $this->db->update('secretariat', $donne);

                    $donne=array(
                        'role'=>'2',
                        );
                $this->db->where('user', $verification->user);
                $this->db->update('user_role', $donne);

                $info = array('val'=> 0, 'msg'=>'affiliation reussie');
                echo json_encode($info);

                }
                # code...
            }
        }
        return !empty($info)?$info:null;
    }

    public function get_secretariat_number()
    {
        $nombre = $this->db->count_all('secretariat');

        return $nombre;
    }

    public function update($data,$data1)
    {
        $this->db->trans_start();
/* on selection identifiant du secretariat en suite celui du user qui gere le secretariat en question puis
            l'on selectionne l'adresse corespond au secretariat en question*/
            /* debut*/
        $verif= $this->db->select('st.id ,st.user, st.ville')->from($this->secretariat.' st')
        ->where(array('st.id'=>$data['id'])) ->get()->result();
        /*fin*/
foreach ($verif as $verification) {

    /* on fait une jointure qui selection le idenfiant de l'adresse , le nom de la ville et l'indentifiant de la region dans la table adresse qui
            sera join avec l'identifiant se trouvant dans la table region pour ainsi selection le nom de la region */

    $verif1= $this->db->select('st.id,st.ville ,t.nomregion,st.region')->from($this->ville.' st')
    ->join($this->region.' t', 't.id=st.region') ->where(array('st.ville'=>$data1['ville'],'t.nomregion'=>$data1['region']))
    ->get()->result();

        if($verif1==null)
        {

            $this->db->set(array('nomregion'=>$data1['region']))->insert($this->region);

            $id_region=$this->db->insert_id();

            $this->db->set(array('ville'=>$data1['ville'],'region'=>$id_region))->insert($this->ville);

            $id_adresse=$this->db->insert_id();

            //$verif2=$this->db->select("*")->from($this->secretariat)->where(array('id'=>$data['id']))->get()->result();

            $donne=array('nomsecretariat'=>$data['nom'],'boitepostal'=>$data['mail'],'adresse'=>$id_adresse,'telephone'=>$data['telephone']);

                    $this->db->where('id', $data['id']);
                    $this->db->update('secretariat', $donne);

                    $donne1= array('nom'=>$data['prenom']);

                    $this->db->where('id', $verification->user);
                    $this->db->update('user', $donne1);

        }

        else{

             foreach($verif1 as $verification1){

                 $donne=array('nomsecretariat'=>$data['nom'],'boitepostal'=>$data['mail'],'adresse'=>$verification1->id,'telephone'=>$data['telephone']);

                 $this->db->where('id', $data['id']);
                $this->db->update('secretariat', $donne);

                $donne1= array('nom'=>$data['prenom']);

                $this->db->where('id', $verification->user);
                $this->db->update('user', $donne1);

                }
            }

    }
        $this->db->trans_complete();
    }

    public function suspension($data)
    {

 $this->db->select('*');
          $this->db->from($this->motif.' st');
            $this->db->where(array('st.id_secretariat'=>$data['id']));
      $compteur= $this->db->count_all_results();
      if($compteur==0)
      {
        $this->db->set(array('id_secretariat'=>$data['id'],'designation'=>$data['motif'],'compteur'=>1))->insert($this->motif);
      }
      else {
        # code...
        $this->db->set(array('id_secretariat'=>$data['id'],'designation'=>$data['motif'],'compteur'=>$compteur+1))->insert($this->motif);
      }
        $verif= $this->db->select('st.*')->from($this->secretariat.' st')
                            ->where(array('st.id'=>$data['id']))->get()->result();

        foreach ($verif as $verification) {

            $verif1= $this->db->select('*')->from($this->offre.' st')
                           ->where(array('st.secretariat'=>$data['id']))->get()->result();

            if($verif1==null)
            {
                $donne= array('statut'=>'3');

                $this->db->where('user', $verification->user);
                $this->db->update('user_role', $donne);


                $donne1= array('statut'=>'3');

                $this->db->where('id', $data['id']);
                $this->db->update('secretariat', $donne1);

                echo "la suspenssion à bien ete effectuée";
            }
            else {

                foreach ($verif1 as $verification1) {

                    $donne= array('statut'=>'3');

                    $this->db->where('id', $verification1->id);
                    $this->db->update('offre', $donne);

                }
                $donne2= array('statut'=>'3');

                $this->db->where('user', $verification->user);
                $this->db->update('user_role', $donne2);

                $donne1= array('statut'=>'3');

                $this->db->where('id', $data['id']);
                $this->db->update('secretariat', $donne1);

            echo "vous avez suspendu le secretariat et toutes ses offres";
            }
        }
       // var_dump($verif);
    }
}
