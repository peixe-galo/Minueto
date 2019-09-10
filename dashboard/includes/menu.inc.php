<nav class="blue-grey">
	<div class="nav-wrapper container">
		<div class="brand-logo light">Sistema de Cadastro</div>
		<ul class="right">
			<?php if($_SESSION['tipo']==1){?>	
				<li><a href="secretaria.php"><i class="material-icons left">account_circle</i>Cadastro Secretário/a</a></li><?php }?>
				<?php if($_SESSION['tipo']==0 or $_SESSION['tipo']==1){?>	
					<li><a href="index.php"><i class="material-icons left">account_circle</i>Cadastro</a></li>
					<li><a href="consultas.php"><i class="material-icons left">search</i>Consultas</a></li><?php } ?>
					<?php if($_SESSION['tipo']==2){?>	
						<li><a href="perfil.php">Perfil</a></li>
					<?php }?>
					<li><a href="change-password.php">Mudar Senha</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>