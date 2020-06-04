<?php
class MY_Model extends CI_Model
{
	protected  $configuration = 'configurer';
	protected  $userRole= 'user_role';
    protected  $parametre = 'parametre';
    protected  $adresse = 'adresse';
    protected  $ville = 'ville';
    protected  $appelOffre = 'appel_offre';
    protected  $caracteristique = 'caracteristique';
    protected  $document = 'document';
    protected  $notification = 'notification';
    protected  $offre = 'offre';
    protected  $secretariat = 'secretariat';
    protected  $service = 'service';
    protected  $temoignage = 'temoignage';
    protected  $transaction = 'transaction';
    protected  $user_role = 'user_role';
    protected  $settings = 'settings';
    protected  $user = 'user';
    protected $region='region';
    protected $motif='motif';
    protected $tarif='tarif_transaction';
    protected $tarifs='tarif_transaction';
    public $contencieux= 'contencieux';




   // protected $motif_secretariat='motif_secretariat';

    public function __construct()
    {
        parent::__construct();
    }

    protected function vardump(...$expression)
    {
        echo "<pre>";
        foreach ($expression as $item) {
            var_dump($item);
        }
        echo "</pre>";
        die();
    }

		
}
