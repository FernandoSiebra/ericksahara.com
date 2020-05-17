<?php

	$params = json_decode(file_get_contents('php://input'),true);

	$name = $params['name'];
	$email = $params['email'];
	$message = $params['message'];

	$html = "<html>";
	$html .= "<body>";
	$html .= "<table>";
	$html .= "<tr><td>Name:</td><td>" . $name . "</td></tr>";
	$html .= "<tr><td>Email:</td><td>" . $email . "</td></tr>";
	$html .= "<tr><td>Message:</td><td>" . $message . "</td></tr>";
	$html .= "</table>";
	$html .= "</body>";
	$html .= "</html>";


	require("sendgrid-php/sendgrid-php.php");

	$email = new \SendGrid\Mail\Mail(); 
	$email->setFrom("fernandosiebra@gmail.com", "Fernando Siebra");
	$email->setSubject("Contato do Portfolio");
	$email->addTo("ericksahara@gmail.com", "Erick Saraha");
	$email->addContent("text/plain", strip_tags($html));
	$email->addContent(
		"text/html", $html
	);
	$sendgrid = new \SendGrid('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');
	try {
		$response = $sendgrid->send($email);
		
		if( $response->statusCode() == "202" || $response->statusCode() == 202 )
		{
			echo '<div class="response-contact response-contact-success">Thank you, Your message was sent successfully!</div>';
		}
		else 
		{
			echo '<div class="response-contact response-contact-error">There was an error sending your message, please try again.</div>';
			// print $response->statusCode() . "\n";
			// print_r($response->headers());
			// print $response->body() . "\n";
		}
		
	} catch (Exception $e) { 
		echo '<div class="response-contact response-contact-error">There was an error sending your message, please try again.</div>';
		echo 'Caught exception: '. $e->getMessage() ."\n";
	}


	/*

	$mail = new PHPMailer(true);

	$mail->Subject = 'Contact - Portfolio';
	$mail->MsgHTML($html);
	$mail->AddAddress('ericksahara@gmail.com');
	$mail->IsMail(true);
	$mail->IsHTML(true);
	$mail->From = $email;
	$mail->FromName = $name;

	$mail->IsSendmail();

	if (!$mail->Send()) {
		echo '<div class="response-contact response-contact-error">There was an error sending your message, please try again.</div>';
	} else {
		echo '<div class="response-contact response-contact-success">Thank you, Your message was sent successfully!</div>';
	}
	*/
