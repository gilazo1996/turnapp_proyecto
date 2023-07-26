<!DOCTYPE html>
<html lang="en" >
<head>
	<title>Turnapp - qr</title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
	<style>
		body {
			margin: 0;
			/*background-color: #ecfab6;*/
			background-image: url("../css/fondo.png");
        background-attachment: fixed;
		}
	</style>
</head>
<body>
	<div class="container py-3">

		<div class="row">
			<div class="col-md-12"> 

				<div class="row justify-content-center">
					<div class="col-md-6">
						<!-- form user info -->
						<div class="card card-outline-secondary">
							<div class="card-header">
								<h3 class="mb-0">QR Turnapp</h3>
							</div>
							<?php
							$nombre = "";
							$apellido = "";
							$email = "";
							$consulta = "";
							//$website = "";

							if (isset($_POST["btnsubmit"])) {
									$nombre = $_POST["nombre"];
									$apellido = $_POST["apellido"];
									$email = $_POST["email"];
									$consulta = $_POST["consulta"];
									//$website = $_POST["website"];

									/*echo "<pre>";
                                    var_dump($_POST);
                                    echo "</pre>";*/
							}
							?>
							<div class="card-body">
								<form autocomplete="off" class="form" role="form" action="index.php" method="post">
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Nombre</label>
										<div class="col-lg-9">
											<input class="form-control" type="text" value="<?php echo $nombre;?>" name="nombre">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Apellido</label>
										<div class="col-lg-9">
											<input class="form-control" type="text" value="<?php echo $apellido;?>" name="apellido">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Email</label>
										<div class="col-lg-9">
											<input class="form-control" type="email" value="<?php echo $email;?>" name="email">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Consulta</label>
										<div class="col-lg-9">
											<input class="form-control" type="text" value="<?php echo $consulta;?>" name="consulta">
										</div>
									</div>
									<!--<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Website</label>
										<div class="col-lg-9">
											<input class="form-control" type="url" value="<?php echo $website;?>" name="website">
										</div>-->
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label"></label>
										<div class="col-lg-9">
											<input class="btn btn-primary" type="submit" name="btnsubmit" value="Generar Qr">
										</div>
									</div>
								</form>
								<?php
 									include "phpqrcode/qrlib.php";
 									$PNG_TEMP_DIR = 'temp/';
 									if (!file_exists($PNG_TEMP_DIR))
									    mkdir($PNG_TEMP_DIR);

									$filename = $PNG_TEMP_DIR . 'test.png';

									if (isset($_POST["btnsubmit"])) {

									$codeString = $_POST["nombre"] . "\n";
									$codeString .= $_POST["apellido"] . "\n";
									$codeString .= $_POST["email"] . "\n";
									$codeString .= $_POST["consulta"] . "\n";
									//$codeString .= $_POST["website"];

									$filename = $PNG_TEMP_DIR . 'test' . md5($codeString) . '.png';

									QRcode::png($codeString, $filename);

									echo '<img src="' . $PNG_TEMP_DIR . basename($filename) . '" /><hr/>';
								}

								?>
							</div>
						</div><!-- /form user info -->
					</div>
				</div>

			</div><!--/col-->
		</div><!--/row-->

	</div><!--/container-->

</body>
</html>