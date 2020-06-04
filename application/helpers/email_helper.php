<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');
require 'PHPMailer/PHPMailerAutoload.php';


class email {
    protected $mail, $CI;

    function __construct()
    {
        $this->CI = &get_instance();
        $this->mail = new PHPMailer();

        $this->mail->isSMTP();                                      // Set mailer to use SMTP
        $this->mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;

        $this->CI->config->load('settings_mail');
        $this->mail->Username = $this->CI->config->item('email');
        $this->mail->Password = $this->CI->config->item('password');
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->Port = 465;
        $this->mail->setFrom($this->CI->config->item('email'), $this->CI->config->item('name'));
        $this->mail->addReplyTo($this->CI->config->item('email'), $this->CI->config->item('name'));

        /*$data = file_get_contents(APPPATH.'/config/settings_mail.php');

        $r = '/\$config\[["\'](.*)["\']\][ ]*=[ ]*.*;/';
        preg_match_all($r, $data, $v);
        vardum($r, $v);*/
    }

    public function mailView($subject, $view, $vars = array())
    {
        $view = trim(trim($view), '/\\');
        $view = (count(explode('email', $view)) > 1)?'admin/email/'.$view:$view;
        $this->message($subject, $this->CI->load->view($view, $vars, TRUE));
    }

    /**
     * @param $address string
     * @param string $name
     */
    public function to($address, $name = '')
    {
        $name = $this->uppername($name);
        $this->mail->addAddress($address, $name);
        $this->mail->addCC($address, $name);
    }

    /**
     * @param bool $bool
     */
    public function isHTML($bool = true)
    {
        $this->mail->isHTML($bool);
    }

    /**
     * @param $subject string
     * @param $body string
     */
    public function message($subject = '', $body = '')
    {
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
        $this->mail->AltBody = htmlspecialchars($body);
    }

    /**
     * @param $path string
     * @param $name string
     * @return bool
     */
    public function addAttachment($path, $name = '')
    {
        return $this->mail->addAttachment($path, $name);
    }

    /**
     * @param $name string
     * @return string
     */
    private function uppername($name)
    {
        return mb_strtoupper($name);
    }

    /**
     * @return stdClass
     */
    public function send()
    {
        $result = new stdClass();
        if (!$this->mail->send()) {
            $result->statue = false;
            $result->getMessage = $this->mail->ErrorInfo;
        }
        else {
            $result->statue = true;
        }
        return $result;
    }
}


if(!function_exists('is_email')) {
    /**
     * Validate email address
     *
     * @deprecated    3.0.0    Use PHP's filter_var() instead
     * @param    string $email
     * @return    bool
     */
    function is_email($email)
    {
        return (bool)filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
