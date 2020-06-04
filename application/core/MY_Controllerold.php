<?php

    class My_Controllerold extends CI_Controller
    {
        /**
         *
         * @var array
         */
        protected $data;

        /**
         *
         * @var Moment
         */
        protected $moment;

        /**
         * @var int[0,1]
        */
        protected $section = 1;
        
        function __construct()
        {
            parent::__construct();
            
            
        }

        /**
         *
         * @param string $view La vue a charger
         * @param string $titre Le titre de la vue
         * @param bool|string|array $not_menu Les menus à ne pas charger
         */
         protected function renderFront($view, $titre='', $breadcumb = array())
        {   $this->data['pages'] = $breadcumb;
            $this->data['view'] = $view;
            $this->data['titre'] = $titre;
            $this->load->view('frontpage/header', $this->data);
            $this->load->view($view, $this->data);
            $this->load->view('frontpage/footer');
        }
        protected function renderSecretariat($view, $titre='',$breadcumb = array())

        {

            $this->data['titre'] = $titre;
            $this->load->view('frontpage/secretariat/header', $this->data);
            $this->load->view($view, $this->data);
            $this->load->view('frontpage/secretariat/footer');
        }
        protected function render($view, $titre='', $titre_separator=' - ', $menu=true)
        {
			if(session_data('connect')===false And strtolower($this->uri->rsegment(1))!='auth'){
                redirect(base_url('admin/auth'));
            }
            
            $this->load->view('admin\render\header', array('titre'=>array($titre, $titre_separator)));
            if($menu===true) $this->load->view('admin\render\top_menu');
            $this->load->view('admin\render\left_menu');
            //$this->load->view('render\menu'); 
            $this->load->view($view, $this->data);
         $this->load->view('admin\render\footer');
        }
        protected function renderClient($view, $titre='',$breadcumb = array())

        {

            $this->data['titre'] = $titre;
            $this->load->view('client/header', $this->data);
            $this->load->view($view, $this->data);
            $this->load->view('client/script');
        }
        protected function execute($view, $titre='')
        {

            if($titre) $this->data['titre'] = $titre;
            $this->load->view($view, $this->data);
        }

        protected function logout()
        {
            unset_session_data();
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