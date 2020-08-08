<html>

<head>

<body style="background-color:white;">
	<title>Login - Admin / Tiket.com</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
		.form-signin {
			max-width: 330px;
			padding: 15px;
			margin: 0 auto;
		}

		.form-signin .form-signin-heading,
		.form-signin .checkbox {
			margin-bottom: 10px;
		}

		.form-signin .checkbox {
			font-weight: normal;
		}

		.form-signin .form-control {
			position: relative;
			font-size: 16px;
			height: auto;
			padding: 10px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}

		.form-signin .form-control:focus {
			z-index: 2;
		}

		.form-signin input[type="text"] {
			margin-bottom: -1px;
			border-bottom-left-radius: 0;
			border-bottom-right-radius: 0;
		}

		.form-signin input[type="password"] {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}

		.account-wall {
			margin-top: 20px;
			padding: 40px 0px 20px 0px;
			background-color: #f7f7f7;
			-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		}

		.login-title {
			color: #555;
			font-size: 18px;
			font-weight: 400;
			display: block;
		}

		.profile-img {
			width: 96px;
			height: 96px;
			margin: 0 auto 10px;
			display: block;
			-moz-border-radius: 50%;
			-webkit-border-radius: 50%;
			border-radius: 50%;
		}

		.need-help {
			margin-top: 10px;
		}

		.new-account {
			display: block;
			margin-top: 10px;
		}
	</style>
	</head>

	<body>
		<div class="container" style="margin-top: 50px">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-md-offset-4">
					<h1 class="text-center login-title">Admin</h1>
					<?php if (isset($error)) {
						echo $error;
					}; ?>
					<div class="account-wall">
						<img class="profile-img" src="data:image/png;base64,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" alt="">
						<form class="form-signin" method="POST" action="<?php echo base_url() ?>index.php/login/">
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="Masukkan Username Anda" autofocus>
								<?php echo form_error('username'); ?>
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda">
								<?php echo form_error('password'); ?>
							</div>

							<button class="btn btn-lg btn-primary btn-block" name="btn-login" id="btn-login" type="submit">
								Masuk</button>


					</div>
				</div>
			</div>
			<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
			<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
	</body>

</html>