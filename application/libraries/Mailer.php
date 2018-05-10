<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	use PHPMailer\PHPMailer\POP3;
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require APPPATH.'../vendor/phpmailer/phpmailer/src/Exception.php';
	require APPPATH.'../vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require APPPATH.'../vendor/phpmailer/phpmailer/src/SMTP.php';

	require( dirname(__dir__, 2).'/vendor/autoload.php' );

	/**
	* mymailer
	*/
	class Mailer extends PHPMailer
	{
		
		function __construct()
		{
			parent::__construct();

			$CI =& get_instance();
		}
	}

?>