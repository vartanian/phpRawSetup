<?php
require_once("PHPMailer-master/PHPMailerAutoload.php");

// AJAX EMAIL METHOD
// Variables to send email

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["fullname"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $subject = trim($_POST["subject"]);
        $message = trim($_POST["message"]);

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($message) OR empty($email) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        // Set the recipient email address.
       
        $recipient = "vicken.vartanian@gmail.com"; 
        // Currently using personal Email Address due to filter blocking my tests.
        // Swap with Support@lucktastic.com, Vic@Jumprampgames.com

        // Set the email subject.
        $subject = "New contact from $name";

        // Build the email content.
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Build the email headers.
        // $email_headers = "From: $name <$email>";

        // Send the email.
        if ( sendMail($recipient, $subject, $email_content, $name, $email) ) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

function sendMail($recipient, $subject, $email_content, $fromName, $fromEmail){
	$mail = new PHPMailer;

		//Tell PHPMailer to use SMTP

		$mail->isSMTP();

		//Enable SMTP debugging

		// 0 = off (for production use)

		// 1 = client messages

		// 2 = client and server messages

		$mail->SMTPDebug = 1;

		$mail->isHTML(false);

		//Ask for HTML-friendly debug output

		$mail->Debugoutput = 'html';

		//Set the hostname of the mail server

		$mail->Host = 'ssl://smtp.gmail.com:587';


		// $mail->Port = 587;

		//Set the encryption system to use - ssl (deprecated) or tls

		// $mail->SMTPSecure = 'tls';

		//Whether to use SMTP authentication

		$mail->SMTPAuth = true;

		//Username to use for SMTP authentication - use full email address for gmail

		$mail->Username = "vicken.vartanian@gmail.com";

		//Password to use for SMTP authentication

		$mail->Password = "Michaelv123!$";

		//Set who the message is to be sent to
		$mail->addAddress($recipient, 'TEST EMAIL');

		//Set who the message is to be sent from
		$mail->setFrom($fromEmail, $fromName);

		//Set the subject line
		$mail->Subject = $subject;

		$mail->Body = $email_content;

		if ( !$mail->send()) {

		echo "Mailer Error: " . $mail->ErrorInfo;

		return false;

		} else {

		//echo "Message sent!";

		return true;

		}


}



?>