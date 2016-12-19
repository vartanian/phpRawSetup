<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
// require_once("$root/config.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>HOME</title>

			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="/assets/css/contact.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
		<div class="container">
      <div id="form-messages">
        <!-- RESPONSE MESSAGES GO HERE -->
      </div>
			<form id="emailForm" role="form" method="post">
				<h1>FORM</h1>
			  <div class="form-group">
			    <label class="sr-only" for="fullname">Full Name</label>
			    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" required="required">
			  </div>
			  <div class="form-group">
			    <label for="email">Email address</label>
			    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
			  </div>
			  <div class="form-group">
			    <label class="sr-only" for="subject">Subject</label>
			    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required="required">
			  </div>
			  <div class="form-group">
			    <label for="message">Leave a Message</label>
			    <textarea id="message" name="message" class="form-control" rows="3" placeholder="How can we help?" required="required"></textarea>
			  </div>
			  <button id="goBttn" type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->

		<!-- BOOTSTRAP -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script type="text/javascript" src="email/contact.js"></script>
  </body>
</html>