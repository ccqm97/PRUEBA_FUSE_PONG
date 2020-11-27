<!DOCTYPE html>
<html lang="en">
<head>
	<title>FUSEPONG</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url();?>assets/login/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" id="formLogin">
					<span class="login100-form-title">
						Iniciar Sesión
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" id="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" id="pass" name="pass" placeholder="Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Ingresar
						</button>
					</div>				

					<div class="text-center p-t-136">
						<a class="txt2" href="#" id="register" data-toggle="modal" data-target="#exampleModal">
							Registrate
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal" tabindex="-1" role="dialog" id="exampleModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">			
				<div class="modal-body">
				<div class="col-sm-12">
					<form class="form-control" id="formRegister" style="width: 100%; border: none;">
							<span class="login100-form-title">
								Registrando
							</span>

							<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
								<input class="form-control" type="text" id="r_email" placeholder="Escribe tu correo eléctronico">								
							</div>

							<div class="wrap-input100 validate-input" data-validate = "Password is required">
								<input class="form-control" type="text" id="r_pass" placeholder="Escribe tu contraseña">								
							</div>	
							<div class="wrap-input100 validate-input">
								<select class="form-control" id="r_company">
									<option value="">Elige una compañia</option>									
								</select>
								
							</div>												

							<div class="text-center p-t-136" style="padding-top: 37px;">
							<button class="login100-form-btn" style="background: #5f46b8;" type="submit">
									Registrarse
							</button>
							</div>
						</form>
				</div>
				</div>
			
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?php echo base_url();?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/js/main.js"></script>
	<script type="text/javascript">
		var baseUrl = "<?php echo base_url();?>";	
	</script>

	<script src="<?php echo base_url();?>js/jsLogin/jsLogin.js"></script>


</body>
</html>