<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

if(!function_exists('session_data'))
{
    function session_data($data = '')
    {
        if(!$data)
        {
            return $_SESSION;
        }
        elseif(is_string($data) OR (is_int($data) And $data>=0))
        {
            return isset($_SESSION[$data])? $_SESSION[$data] : NULL;
        }
        elseif(is_array($data))
        {
            $result = array();
            foreach($data as $value)
            {
                $result[$value] = isset($_SESSION[$data])? $_SESSION[$data] : NULL;
            }
            return $result;
        }
        return NULL;
    }
}

if(!function_exists('set_session_data'))
{
    function set_session_data(array $data = array())
    {
        if(is_array($data))
        {
            foreach($data as $key=>$value)
            {
                $_SESSION[$key] = $value;
            }
        }
    }
}

if(!function_exists('unset_session_data'))
{
    function unset_session_data($data='')
    {
        if(!$data)
        {
            if(isset($_SESSION))
            {
                foreach ($_SESSION as $key => $value)
                {
                    unset($_SESSION[$key]);
                }
                unset($_SESSION);
            }
        }
        if(is_string($data))
        {
            if(isset($_SESSION[$data])) unset($_SESSION[$data]);
        }
        if(is_array($data))
        {
            foreach($data as $value)
            {
                if(isset($_SESSION[$value])) unset($_SESSION[$value]);
            }
            if(isset($_SESSION)) unset($_SESSION);
        }
    }
}

if(!function_exists('session_data_isset'))
{
    function session_data_isset($data = '')
    {
        if(!$data)
        {
            return isset($_SESSION);
        }
        elseif(is_string($data) OR (is_int($data) And $data>=0))
        {
            return isset($_SESSION[$data]);
        }
        elseif(is_array($data))
        {
            $result = $data[0];
            if(count($data) != 1)
            {
                array_shift($data);
            }
            else
            {
                $data = $data[0];
            }

            return (session_data_isset($result) And session_data_isset($data));
        }
        return false;
    }
}
//define('CLIENT',1);
//define('SECRETARIAT',2);
//define('ATTENTE',0);
if(!function_exists('set_flash_data'))
{
    function set_flash_data($data)
    {
        $_SESSION['flash'] = $data;
    }
}

if(!function_exists('get_flash_data'))
{
    function get_flash_data()
    {
        if(session_data_isset('flash')) {
            $val = $_SESSION['flash'];
            unset_session_data('flash');
            return $val;
        }
    }
}

if(!function_exists('msa_error')){
    function msa_error ($error_texte){
        show_error($error_texte,ACCESS_REFUSE,"Erreur lors du traitement de la requête");
    }
}

if(!function_exists('is_url')){
    function is_url($text=''){
        if($text And is_string($text)){
            $test = array(base_url(), 'http:', 'https:', 'ftp:', 'www');
            foreach ($test as $value) {
                if(strpos($text, $value)===0)
                    return true;
            }
        }
        return false;
    }
}

define('ACCESS_REFUSE', 403);
define('ACCESS_REFUSE_TEXTE', "Désolé! Vous n'avez pas accès à cette page");

if(!session_data_isset('connect')) {
    set_session_data(array('connect' => false, 'section' => 1));
}