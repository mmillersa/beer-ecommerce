

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


	<!-- Custom CSS -->
	<link href="<?= base_url("assets/dash/css/home.css") ?>" rel="stylesheet" type="text/css" media="all"/>


    <!-- JAVA SCRIPT FILES -->
	<!-- Jquery JS -->
	<script src="<?= base_url("assets/dash/js/jquery-2.1.1.min.js") ?>"></script> 
	<script src="<?= base_url("assets/dash/js/bootstrap.js")?>"> </script>

	<!-- Popper JS -->
    <script src="../assets/bootstrap/js/popper.js"></script>

	
	<!-- Custom JS -->
	<script src="../custom-js/main.js"></script>

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
						<ul>
							<li><a href='home.php'><i class='fa fa-home icon-espaco'></i></a></li>
							<li><a href='home.php'>Início</a></li>
						</ul>
						<ul>
							<li><a href='home.php?page=graficos'><i class='fa fa-chart-line icon-espaco'></i></a></li>
							<li><a href='home.php?page=graficos'>Relatórios</a></li>
						</ul>
						<ul>
							<li><a href='home.php?page=usuarios'><i class='fa fa-users icon-espaco'></i></a></li>
							<li><a href='home.php?page=usuarios'>Usuários cadastrados</a></li>
						</ul>
						<ul>
							<li><a href='home.php?page=configuracoes'><i class='fa fa-cogs icon-espaco'></i></a></li>
							<li><a href='home.php?page=configuracoes'>Configurações</a></li>
						</ul>
						<ul>
							<li><a href='home.php?page=alertar'><i class='fa fa-exclamation-triangle icon-espaco'></i></a></li>
							<li><a href='home.php?page=alertar'>Alertar usuários</a></li>
						</ul>
					</div>

					<div class="navigation">
						<h3>Painel de pedidos</h3>
						<ul>
							<li><a data-toggle = 'collapse' href = '#collapse-treinamentos'><i class='fa fa-shopping-cart icon-espaco'></i></a></li>
							<li><a data-toggle = 'collapse' href = '#collapse-treinamentos'>Gerenciar pedidos</a></li>
						</ul>
					</div>

					<div class="navigation">
						<h3>Painel de bebidas</h3>
						<ul>
							<li><a data-toggle = 'collapse' href = '#collapse-treinamentos'><i class='fa fa-beer icon-espaco'></i></a></li>
							<li><a data-toggle = 'collapse' href = '#collapse-treinamentos'>Gerenciar bebidas</a></li>
						</ul>
						<ul>
							<li><a data-toggle = 'collapse' href = '#collapse-treinamentos'><i class='fa fa-edit icon-espaco'></i></a></li>
							<li><a data-toggle = 'collapse' href = '#collapse-treinamentos'>Gerenciar marcas</a></li>
						</ul>
						<ul>
							<li><a data-toggle = 'collapse' href = '#collapse-treinamentos'><i class='fa fa-bookmark icon-espaco'></i></a></li>
							<li><a data-toggle = 'collapse' href = '#collapse-treinamentos'>Gerenciar categorias</a></li>
						</ul>

					</div>

					<div class="navigation">
						<h3>Painel de forcenedores</h3>
						<ul>
							<li><a data-toggle = 'collapse' href = '#collapse-treinamentos'><i class='fa fa-truck icon-espaco'></i></a></li>
							<li><a data-toggle = 'collapse' href = '#collapse-treinamentos'>Gerenciar fornecedores</a></li>
						</ul>
					</div>

					<div class="navigation">
						<h3>Painel de promoções</h3>
						<ul>
							<li><a data-toggle = 'collapse' href = '#collapse-treinamentos'><i class='fa fa-gift icon-espaco'></i></a></li>
							<li><a data-toggle = 'collapse' href = '#collapse-treinamentos'>Gerenciar promoções</a></li>
						</ul>
					</div>
					<div class="navigation">
						<h3>Painel de estoque</h3>
						<ul>
							<li><a data-toggle = 'collapse' href = '#collapse-treinamentos'><i class='fa fa-warehouse icon-espaco'></i></a></li>
							<li><a data-toggle = 'collapse' href = '#collapse-treinamentos'>Gerenciar estoque</a></li>
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
						<a class = 'dropdown-item config' href="home.php?page=meu_perfil">Meu perfil </a>
						<a class = 'dropdown-item config' href="../backend/auth/logout.php">Sair</a>
					</div>

					</div>		
				</div>
				<div class="clearfix"></div>
				<!-- Ultimo treinamento adicionado -->
				<div class = 'ultimo-treinamento'>

					<div class = 'div-titulo-ultimo-tre'>
						<h4>Último pedido realizado:</h4>
					</div>

					<div class = 'row'>
						<div class = 'div-conteudo-ultimo-tre col-md-6'>
							<h4>ID do pedido: #123</h4>
							<h4>Valor total: R$ 120,00</h4>
							<h4>Data realização: 10/10/2010 às 10:29</h4>
							<h4>Modo de pagamento: Cartão</h4>
							<h4>Status: Aguardando confirmação de pagamento</h4>
							<h4>Cliente: Fulano da Silva com CPF 20202918991</h4>
						</div>

						<div class = 'col-md-6'>
						<a href = ''><button type = 'button' class = 'btn btn-visualizar-treinamento'><i class = 'fa fa-eye icon-espaco'></i>Ver detalhes</button></a>
						</div>
					</div>
				</div>
				<!-- /Último treinamento adicionado -->
			</div>
			
		</div>
    </div>
</body>

</html>