<?php
//Head Links
include('config/db_connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'config/PHPMailer/src/Exception.php';
require 'config/PHPMailer/src/PHPMailer.php';
require 'config/PHPMailer/src/SMTP.php';

// Create object of PHPMailer class
$mail = new PHPMailer(true);

$output = '';

if (isset($_POST['submitCon'])) {
	
	$email = $_POST['email'];
	$message = $_POST['message'];

	try {
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		// Gmail ID which you want to use as SMTP server (removed for security reason)
		$mail->Username = '';
		// Gmail Password (removed for security reason)
		$mail->Password = '';
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Port = 587;

		// Email ID from which you want to send the email
		$mail->setFrom($email, 'Info-Card-Generator');
		// Recipient Email ID where you want to receive emails
		$mail->addAddress('mup.webdev@gmail.com');

		$mail->isHTML(true);
		$mail->Subject = "Info-Card-Generator || $email contacted!";
		$mail->Body = "<p><b>Email :</b> $email <br><b>Message :</b> $message</p>";

		$mail->send();
		$output = "<div style='color:red;'>
                  <label>Thank you! $email for contacting, <br> you will receive a follow up email soon!</label>
                </div>";
	} catch (Exception $e) {
		$output = '<div style="color:red;">
                  <label>' . $e->getMessage() . '</label>
                </div>';
	}
}
?>

<!-- Footer -->
	<footer class="page-footer blue-grey darken-4">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text" id="about">About</h5>
					<p class="abt-txt">This is a demo project. Designed with MaterializeCSS framework and Vanilla PHP is used for backend functionalities.</p> 
					<p class="abt-txt">To create a simple card by pressing CREATE YOU CARD and filling up the form on that page. Then it will be displayed in the home page. As of now, I haven't added any funtionality for uploading picture so it will be replaced with a dummy picture.</p>
					<p>Also you can contact me through the contact form.</p>
				</div>
				<div class="col l4 offset-l2 s12">
					<h5 class="white-text" id="contact">Contact</h5>
					<!-- Contact Form -->
					<div class="row">

						<form class="col s12" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						  <div class="row">
								<div class="input-field col s6">
								  <i class="material-icons prefix">comment</i>
								  <input id="icon_prefix" type="text" class="validate" name="message">
								  <label for="icon_prefix">Message</label>
								</div>
								<div class="input-field col s6">
								  <i class="material-icons prefix">email</i>
								  <input id="icon_telephone" type="email" class="validate" name="email">
								  <label for="icon_telephone">Email</label>
								</div>
								<div class="center">
									<input type="submit" name="submitCon" value="submit" class="btn light-green accent-4">
								</div>
								<div class="center">
									<?php echo $output; ?>
								</div>
						  </div>
						</form>

					  </div>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				<div class="row">
					<div class="col left">
						<div class="hide-on-med-and-down">
							© Copyright 2020 by Mohi Pabel
						</div>
					</div>
					<div class="col right">
						<div class="social_icons">
							<a href="https://twitter.com/mohi_pabel">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle-thin fa-stack-2x"></i>
									<i class="fa fa-twitter fa-stack-1x"></i>
								</span>
							</a>
							<a href="https://www.facebook.com/MohiPabel101">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle-thin fa-stack-2x"></i>
									<i class="fa fa-facebook fa-stack-1x"></i>
								</span>
							</a>

							<a href="https://github.com/MohiPabel">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle-thin fa-stack-2x"></i>
									<i class="fa fa-github fa-stack-1x"></i>
								</span>
							</a>

							<a href="https://www.linkedin.com/in/mohipabel/">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle-thin fa-stack-2x"></i>
									<i class="fa fa-linkedin fa-stack-1x"></i>
								</span>
							</a>

							<a href="https://www.youtube.com/channel/UCp_4BOFlYXObfd7ZFr8BgbA">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle-thin fa-stack-2x"></i>
									<i class="fa fa-youtube fa-stack-1x"></i>
								</span>
							</a>

							<a href="https://www.reddit.com/user/MohiPabel">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle-thin fa-stack-2x"></i>
									<i class="fa fa-reddit fa-stack-1x"></i>
								</span>
							</a>

							<a href="https://www.instagram.com/mohipabel">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle-thin fa-stack-2x"></i>
									<i class="fa fa-instagram fa-stack-1x"></i>
								</span>
							</a>
						</div>
					</div>
				</div>
				<div class="row hide-on-med-and-up">
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>
					<div class="col"></div>

					<div class="col">
						<p>© Copyright 2020 by Mohi Pabel</p>
					</div>

				</div>			
			</div>
		</div>
	</footer>









	<!-- jquary -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<!-- My Js -->
	<script type="text/javascript" src="./javascript/app.js"></script>

</body>