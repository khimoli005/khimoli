<?php
if(isset($_POST['send']))
{
	$youremail = "khimoli2052@gmail.com";
	$publicemail = "khimoli2052@gmail.com";
	function input($name){
		if(isset($_POST[$name]) && !empty(trim($_POST[$name]))){
			$input = trim($_POST[$name]);
			$html = htmlspecialchars($input);
			return $html;
		} else {
			return false;
		}
	}
	if(input('name') && input('subject') && input('message') && input('email')){
		$name = input($_POST['name']);
		$subject = input($_POST['subject']);
		$message = input($_POST['message']);
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$email = $_POST['email'];
		} else {
			$err = 'Email format is not correct';
		}
	}
	else{
		$err = 'Please input all fields correctly';
	}
	if(!isset($err)){	
	//Send it to you
		$header = 'From: .'.'$name<'.$email.">\r\nReturn-path: ".$email;
		$subject = 'New Message from Contact Form';
		$send = mail($youremail, $subject, $message, $header);
	//To send thanks mail 
		if ($send) {
			$header = 'From: .'.'$name<'.$publicemail.">\r\nReturn-path: ".$publicemail;
			$subject = 'Email Received Conformation';
			$message = 'We have received your message from contact us form. We will get back to you as soon as possible';
			mail($email, 'Email', $message, $header);
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Contact Us</title>
		<style>
			body{font-size:110%; background-color:#fff;}
			.form{ padding: 20px; width: 75%; border:1px solid #333; border-radius: 5px; margin: 0 auto; background:#fff; opacity: 0.8;}
			.input, .textarea{border-radius: 5px; padding: 10px; border:1px solid #888; display: block; margin: 2px; width: 75%; height:auto; font-size: 16px;}
			.submit{ color: #fff; background: darkgreen; padding:12px; font-size: 18px; border-radius: 8px;}
			.success{color:darkgreen;}
			.error{color:red;}
		</style>
	</head>
	<body>
		<div class="form">
			<h1>Contact Us</h1>
			<hr/>
			<form method="post" action="#">
				<?php
				if(isset($err)) {
					echo '<p class="error">'.$err.'</p>'; 
				} elseif(isset($send)){
					echo '<p class="success">Success! We received your email.</p>';
				} 
				?>
				<input name="name" pattern="[a-z. A-Z]+" required="" type="text" placeholder="Full Name" class="input"/>
				<input name="subject" required="" type="text" placeholder="Subject" class="input" />
				<input name="email" required="" type="email" placeholder="Email" class="input" />
				<textarea name="message" placeholder="Message" required="" rows="8" class="input"></textarea>
				<input type="submit" name="send" value="Send Message" class="submit">
			</form>
		</div>
	</body>
</html>
