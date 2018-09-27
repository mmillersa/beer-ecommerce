<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Login Administrativo - Beer Ecommerce</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="<?= base_url("assets/dash/css/bootstrap.css") ?>" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="<?= base_url("assets/dash/css/style.css") ?>" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="<?= base_url("assets/dash/js/jquery-3.3.1.js") ?>"></script> 
<!--icons-css-->
<link href="<?= base_url("assets/dash/css/font-awesome.css") ?>" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
</head>

<body>

<!-- Mostrando mensagens do sistema -->
<?= $this->session->flashdata('auth');?>

<div class="login-page">
    <div class="login-main">  	
    	 <div class="login-head">
				<h1>Área administrativa</h1>
			</div>
			<div class="login-block">
				<form method = "POST" action = "\beer-ecommerce/auth/logar">
					<input type="text" name="cpf" placeholder="CPF" required="">
					<input type="password" name="senha" class="lock" placeholder="Senha" required>
					<input type = "hidden" name = "tipo_auth" value = "adm">
					<div class="forgot-top-grids">
						<div class="forgot-grid">
							<ul>
								<li>
									<input type="checkbox" id="brand1" value="">
									<label for="brand1"><span></span>Lembrar</label>
								</li>
							</ul>
						</div>
						<div class="forgot">
							<a href="#">Esqueci minha senha</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<input type="submit" name="Sign In" value="Entrar">				
				</form>
				<h5><a href="">Retornar ao site</a></h5>
			</div>
      </div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2016 Shoppy. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>	
<!--COPY rights end here-->

<!--scrolling js-->
		<script src="<?= base_url("assets/dash/js/jquery.nicescroll.js") ?>"></script>
		<script src="<?= base_url("assets/dash/js/scripts.js") ?>"></script>
		<!--//scrolling js-->
		<script src="<?= base_url("assets/dash/js/bootstrap.js")?>"> </script>
<!-- mother grid end here-->
</body>
</html>


                      
						
