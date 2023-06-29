<?php
require_once 'config/config.php';
//Load helper
require_once    'helpers/session_helper.php';
require_once    'helpers/general_helper.php';
require_once    'helpers/upload_image.php';

// Load PHPMailer 
require 'librairies/PHPMailer/src/PHPMailer.php';
require 'librairies/PHPMailer/src/SMTP.php';
require 'librairies/PHPMailer/src/Exception.php';

spl_autoload_register('Autoloader::librairieLoader');

class Autoloader {
	public static function librairieLoader($className) {
    	require_once 'librairies/' . $className . '.php';
    }
}