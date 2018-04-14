<?php
	
/*
* This file is part of the Coinsbie package.
*
* (c) Corey Farmer <corey.m.farmer@gmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace App\Http\Controllers;

use App\comms;
use Illuminate\Http\Request;
use PHPMailer;

// Modify the path in the require statement below to refer to the 
// location of your Composer autoload.php file.
require 'bootstrap/autoload.php';


class AmazonSESController extends Controller 
{

	public $SMTPSecure  = 'tls';
	public $Port		= 587;

	public function main ()
	{
		// Instantiate a new PHPMailer 
		$this->mail = new PHPMailer;
		
		// Tell PHPMailer to use SMTP
		$this->mail->isSMTP();
		
		$this->createMail ();
	}
	
	
	private function createMail ()
	{
		// Replace sender@example.com with your "From" address. 
		// This address must be verified with Amazon SES.
		$this->mail->setFrom('coinsbie@gmail.com', 'Coinsbie Support');
		
		// Replace recipient@example.com with a "To" address. If your account 
		// is still in the sandbox, this address must be verified.
		// Also note that you can include several addAddress() lines to send
		// email to multiple recipients.
		$this->mail->addAddress('corey.m.farmer@gmail.com', 'Corey Farmer');
		
		// Specify a configuration set. If you do not want to use a configuration
		// set, comment or remove the next line.
		$this->mail->addCustomHeader('X-SES-CONFIGURATION-SET', 'ConfigSet');
		 
		// If you're using Amazon SES in a region other than US West (Oregon), 
		// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP  
		// endpoint in the appropriate region.
		$this->mail->Host = 'email-smtp.us-east-1.amazonaws.com';
		
		// The subject line of the email
		$this->mail->Subject = 'Coinsbie - Contact Submission';
		
		// The HTML-formatted body of the email
		$this->mail->Body = 'testing';
		
		// Tells PHPMailer to use SMTP authentication
		$this->mail->SMTPAuth = true;
		
		// Enable TLS encryption over port 587
		$this->mail->SMTPSecure = self::$SMTPSecure;
		$this->mail->Port = self::$Port;
		
		// Tells PHPMailer to send HTML-formatted email
		$this->mail->isHTML(true);
		
		// The alternative email body; this is only displayed when a recipient
		// opens the email in a non-HTML email client. The \r\n represents a 
		// line break.
		$this->mail->AltBody = "Email Test\r\nThis email was sent through the 
		    Amazon SES SMTP interface using the PHPMailer class.";
		
	}
	
	private function config ( )
	{
		
		// Replace smtp_username with your Amazon SES SMTP user name.
		$this->mail->Username = 'AKIAJPBO2WHLY2W6Q5XQ';
		
		// Replace smtp_password with your Amazon SES SMTP password.
		$this->mail->Password = 'ArtjCs0Ave2S3hYy7tNlBGIykH5Um73BmHQnVjLbgLUd';
		
	}
	
	
	private function send ()
	{
		
		if(! $this->mail->send() ) 
		{
		    echo "Email not sent. " , $this->mail->ErrorInfo , PHP_EOL;
		
		} else 
		{
		    echo "Email sent!" , PHP_EOL;
		}
		
	}



}


