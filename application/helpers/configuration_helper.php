<?php
if ( ! function_exists('setValue'))
{
    function setValue($caracteristique , $valeur)
    {
        $model = new general_model();
        $valeur = $model->value($caracteristique,$valeur) ;
        if(isset($valeur)){
            return $valeur;
        }else{
            return 0;
        }


    }

}
if ( ! function_exists('allpage'))
{
    function allpage($caracteristique)
    {

        if(!is_string($caracteristique)) {
            $model = new general_model();
            $valeur = $model->getInfo($caracteristique);
            if(isset($valeur)){
                return $valeur->allpage;
            }else{
                return 0;
            }

        }else{
            return 1;
        }


    }

}
if ( ! function_exists('totalPage'))
{
    function totalPage($appel)
    {
        $model = new general_model();
        $valeur = $model->totalPage($appel) ;
        return $valeur;

    }

}
if ( ! function_exists('getNom'))
{
    function getNom($id)
    {
        if(!is_string($id)) {
            $model = new general_model();
            $valeur = $model->getCarac($id);

            return $valeur;
        }else{
            return $id;
        }

    }

}
if ( ! function_exists('getPrix'))
{
    function getPrix($id,$option)
    {
        if(!is_string($id)) {
            $model = new general_model();
            $valeur = $model->getPrix($id);
            if(count($valeur) == 1){
                $prixu = json_decode($valeur[0]->prixU, true);
                foreach ($prixu as $key => $value) {
                    if ($key == $option) {
                        return $value;
                    }
                }
            }

        }
        return 0;

    }

}

if ( ! function_exists('BackupPrix'))
{
    function BackupPrix($tableau)
    {
        $i = 0;
        $model = new general_model();
        $tablea = json_decode($tableau,TRUE);
        $tabPrix = array();
        foreach($tablea as $key=>$value){
            if(!is_string($key)){
                $valeur = $model->getPrix($key);
                if(count($valeur) == 1){
                    $prixu = json_decode($valeur[0]->prixU, true);
                    foreach ($prixu as $key2 => $value2) {

                        if ($value == $key2) {
                            $i++;
                            if(allpage($key) == 1) $tabPrix[$i."allpage"] = $value2;
                            else
                                $tabPrix[$i] = $value2;
                        }
                    }
                }else{
                    $i++;
                    $tabPrix[$i] = 0;
                }

            }else{
                $i++;
                $tabPrix[$i] = 0;
            }
        }

        return json_encode($tabPrix);

    }

}
if ( ! function_exists('nombreReponses'))
{
    function nombreReponses($appel)
    {
        $model = new appelOffre_model();
        return $model->nombreReponses($appel);

    }

}
if ( ! function_exists('getFrais'))
{
    function getFrais($prix)
    {
        $model = new general_model();

        return $model->getTarif($prix);

    }

}
