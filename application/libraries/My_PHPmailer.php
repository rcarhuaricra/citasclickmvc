<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once ('PHPMailer/phpmailer.php');

class My_PHPmailer extends PHPMailer {

    public function __construct() {
        parent::__construct();
    }

    //put your code here
}
