<?php
	if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['company']) && isset($_POST['message'])){
		// POST variables 
		$name = $_POST['name']; 
		$email = $_POST['email'];
		$company = $_POST['company'];
		$message = $_POST['message'];

		require("../phpmailer/class.PHPMailer.php");

		$mail = new PHPMailer();

		$mail->IsSMTP(); // set mailer to use SMTP
		$mail->Host = "smtpserver";  // specify server
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Username = "username";  // SMTP username
		$mail->Password = "password"; // SMTP password

		$mail->From = "from@example.com";
		$mail->FromName = "fromName";
		$mail->AddAddress("to@example.com");

		$mail->WordWrap = 50;  // set word wrap to 50 characters
		$mail->IsHTML(true);  // set email format to HTML

		$mail->Subject = "Subject"; // Email subject
		// Email Body 
		$mail->Body    = "<table>
							<tr><td>Name: </td><td>".$name."</td></tr>
							<tr><td>Email: </td><td>".$email."</td></tr>
							<tr><td>Company: </td><td>".$company."</td></tr>
							<tr><td>Message: </td><td>".$message."</td></tr>
						</table>";

		if(!$mail->Send()) // check if mail is sent
		{
		   echo "Message could not be sent. <p>";
		   echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}
		echo "Message has been sent";
	}
?> 