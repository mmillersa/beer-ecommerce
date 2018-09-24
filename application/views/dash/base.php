
<!DOCTYPE html>
<html lang="pt-br">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Painel Administrativo - Duff Club</title>

<!-- CSS FILES-->
	<link href="<?= base_url("assets/dash/css/bootstrap.css") ?>" rel="stylesheet" type="text/css" media="all">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link href="<?= base_url("assets/dash/css/semantic.min.css") ?>" rel="stylesheet" type="text/css" media="all"/>


	<!-- Custom CSS -->
	<link href="<?= base_url("assets/dash/css/home.css") ?>" rel="stylesheet" type="text/css" media="all"/>
	

<!-- JAVA SCRIPT FILES -->
	<!-- Jquery JS -->
	<script src="<?= base_url("assets/dash/js/jquery-3.3.1.js") ?>"></script>

	<!-- Popper JS -->
	<script src="<?= base_url("assets/dash/js/popper.js") ?>"></script>
	
	<script src="<?= base_url("assets/dash/js/bootstrap.js")?>"> </script>
	<script src="<?= base_url("assets/dash/js/semantic.min.js")?>"> </script>

	<!-- Custom JS -->
	<script src="<?= base_url("assets/dash/js/main.js") ?>"></script>

</head>
<body>

<div class = "content">
		<div class = "row">
			<!-- Left nav -->
			<div class = "col-md-4 side-bar" id = "side-bar">
				<div class="logo text-center">
					<a class = 'logo-text' id = "logo" href="home.php">duff club admin</a>
					<h1 id = "icone" class = 'fa fa-arrow-right rotate'></h1>
				</div>

				<div id = "conteudo-nav">
					<div class='navigation'>
						<h3>Painel de gestão</h3>
						<ul class = '<?php if(isset($cor_ul_inicio)) echo $cor_ul_inicio;?>'>
							<li><a href='/beer-ecommerce/base'><i class='fa fa-home icon-espaco'></i></a></li>
							<li><a href='/beer-ecommerce/base'>Início</a></li>
						</ul>
						<ul class = '<?php if(isset($cor_ul_relatorios)) echo $cor_ul_relatorios;?>'>
							<li><a href='home.php?page=graficos'><i class='fa fa-chart-line icon-espaco'></i></a></li>
							<li><a href='home.php?page=graficos'>Relatórios</a></li>
						</ul>
						<ul class = '<?php if(isset($cor_ul_usuarios)) echo $cor_ul_usuarios;?>'>
							<li><a href='home.php?page=usuarios'><i class='fa fa-users icon-espaco'></i></a></li>
							<li><a href='home.php?page=usuarios'>Usuários</a></li>
						</ul>
						<ul class = '<?php if(isset($cor_ul_configuracoes)) echo $cor_ul_configuracoes;?>'>
							<li><a href='home.php?page=configuracoes'><i class='fa fa-cogs icon-espaco'></i></a></li>
							<li><a href='home.php?page=configuracoes'>Configurações</a></li>
						</ul>
						<ul class = '<?php if(isset($cor_ul_alertar)) echo $cor_ul_alertar;?>'>
							<li><a href='home.php?page=alertar'><i class='fa fa-exclamation-triangle icon-espaco'></i></a></li>
							<li><a href='home.php?page=alertar'>Alertar usuários</a></li>
						</ul>
					</div>

					<div class="navigation">
						<h3>Painel de pedidos</h3>
						<ul class = '<?php if(isset($cor_ul_gpedidos)) echo $cor_ul_gpedidos;?>'>
							<li><a><i class='fa fa-shopping-cart icon-espaco'></i></a></li>
							<li><a>Gerenciar pedidos</a></li>
						</ul>
					</div>

					<div class="navigation">
						<h3>Painel de bebidas</h3>
						<ul class = '<?php if(isset($cor_ul_gbebidas)) echo $cor_ul_gbebidas;?>'>
							<li><a href = '/beer-ecommerce/bebida/gerenciar_bebidas'><i class='fa fa-beer icon-espaco'></i></a></li>
							<li><a href = '/beer-ecommerce/bebida/gerenciar_bebidas'>Gerenciar bebidas</a></li>
						</ul>
						<ul class = '<?php if(isset($cor_ul_gmarcas)) echo $cor_ul_gmarcas;?>'>
							<li><a href = "/beer-ecommerce/bebida/gerenciar_marcas"><i class='fa fa-edit icon-espaco'></i></a></li>
							<li><a href = "/beer-ecommerce/bebida/gerenciar_marcas">Gerenciar marcas</a></li>
						</ul>
						<ul class = '<?php if(isset($cor_ul_gcategorias)) echo $cor_ul_gcategorias;?>'>
							<li><a href = "/beer-ecommerce/bebida/gerenciar_categorias"><i class='fa fa-bookmark icon-espaco'></i></a></li>
							<li><a href = "/beer-ecommerce/bebida/gerenciar_categorias">Gerenciar categorias</a></li>
						</ul>

					</div>

					<div class="navigation">
						<h3>Painel de forcenedores</h3>
						<ul class = '<?php if(isset($cor_ul_gfornecedores)) echo $cor_ul_gfornecedores;?>'>
							<li><a ><i class='fa fa-truck icon-espaco'></i></a></li>
							<li><a>Gerenciar fornecedores</a></li>
						</ul>
					</div>

					<div class="navigation">
						<h3>Painel de promoções</h3>
						<ul class = '<?php if(isset($cor_ul_gpromocoes)) echo $cor_ul_gpromocoes;?>'>
							<li><a><i class='fa fa-gift icon-espaco'></i></a></li>
							<li><a>Gerenciar promoções</a></li>
						</ul>
					</div>
					<div class="navigation">
						<h3>Painel de estoque</h3>
						<ul class = '<?php if(isset($cor_ul_gestoque)) echo $cor_ul_gestoque;?>'>
							<li><a><i class='fa fa-warehouse icon-espaco'></i></a></li>
							<li><a>Gerenciar estoque</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- Left nav -->

			<!-- Conteúdo -->
			<div class = "col-md-8" id = "conteudo">
				<!-- Usuário -->
				<div class="member">
					<div class = "row">
						<div class = "col-md-3">
							<p><a href="#"><i class="fa fa-user-circle"></i></a></p>
						</div>
						<div class = "col-md-9">
							<p><a href = "#">Administrador</a></p>
							<h4>Conta de ADM</h4>
						</div>
					</div>
					<div class = 'dropdown' tabindex="1">
						
						<span class = 'dropdown-toggle' id = 'expand-drop' data-toggle = 'dropdown'>
							<i class = 'fa fa-cog'></i>
						</span>
						<div class = 'dropdown-menu'>
							<ul class = 'drop-config'>
								<li><a class = 'dropdown-item config' href="">Editar perfil </a></li>
								<li><a class = 'dropdown-item config' href="">Deslogar</a></li>
							</ul>
						</div>

					</div>		
				</div>
				<div class="clearfix"></div>
