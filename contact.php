<?php 

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['btnSubmit']))
{
	$name = $_POST['txtName'];
	$email = $_POST['txtEmail'];
	$contact = $_POST['txtPhone'];
	$subject = $_POST['txtSubject'];
	$message = $_POST['txtMsg'];

	require_once "PHPMailer/PHPMailer.php";
	require_once "PHPMailer/SMTP.php";
	require_once "PHPMailer/Exception.php";

	$mail = new PHPMailer();

	//SMTP Settings
	$mail -> isSMTP();
	$mail -> Host = "smtp.gmail.com";
	$mail -> SMTPAuth = true;
	$mail -> Username = "nichalanp13@gmail.com";
	$mail -> Password = 'hxfvasegvmpzclzg';
	$mail -> Port = 465; //587
	$mail -> SMTPSecure = "ssl"; //tls

	//Email Settings
	$mail -> isHTML(true);
	$mail -> setFrom($email, $name);
	$mail -> addAddress("ads20a00079y@ait.edu.gh");
	$mail -> Subject = $subject;
	$mail -> Body = $message;

	if($mail->send()){
		$status = "Success";
		$response = "Email sent!";
	}
	else{
		$status = "Success";
		$response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
	}
	//exit(json_encode(array("status" => $status, "response" => $response)));

}

$con=mysqli_connect("localhost","root","","hmsdb");

if(isset($_POST['btnSubmit']))
{
	$name = $_POST['txtName'];
	$email = $_POST['txtEmail'];
	$contact = $_POST['txtPhone'];
	$message = $_POST['txtMsg'];

	$query="insert into contact(name,email,contact,message) values('$name','$email','$contact','$message');";
	$result = mysqli_query($con,$query);
	
	if($result)
    {
    	echo '<script type="text/javascript">'; 
		echo 'alert("Message sent successfully!");'; 
		echo 'window.location.href = "contact.html";';
		echo '</script>';
    }
}
