<?php
session_start();
error_reporting(0);
include('bancodedados/conexao2.php');
include_once 'includes/header.inc.php';
include_once 'includes/menu.inc.php';
if (!isset($_SESSION['id'])){
	header('location:index.php');
}
else{?>
	<div class="row container">
		<p>&nbsp;</p>
		<form action="changepw.php" method="post" class="col s12">
			<fieldset class="formulario" style="padding: 15px">
				<legend><img src="imagens/avatar-2.png" alt="(imagem)" width="100"></legend>
				<h5 class="light center">Alterar Minha Senha de Acesso</h5>

				<!-- campo nome -->
				<div class="input-field col s12">
					<i class="material-icons prefix">account_circle</i>
					<input type="password" name="password"  id="nome" maxlength="40" placeholder="Senha pretendida" required>

				</div>

				<!-- botoes -->
				<div class="input-field col s12">
					<input type="submit" value="alterar" class="btn blue">
					<a href="consultas.php" class="btn red">cancelar</a>
				</fieldset>

			</div>

		</form>
	</fieldset>
</div>

<?php 
include_once 'includes/footer.inc.php';

// Code for change password	
if(isset($_POST))
{
	$password=($_POST['password']);
	if ($_SESSION['tipo']==1 or $_SESSION['tipo']==0){
		$con="update users set password=password( :password ) where id=".$_SESSION['id'];
	}
	elseif($_SESSION['tipo']==2){
		$con="update tb_clientes set password=password( :password ) where id=".$_SESSION['id'];
	}
	$chngpwd1 = $dbh->prepare($con);
	$chngpwd1-> bindParam(':password', $password, PDO::PARAM_STR);
	$chngpwd1->execute();
	$msg="Your Password succesfully changed";




	echo"<script>alert('Senha alterada com sucesso!')</script>";
}
else {
	echo"<script>alert('Ocurreu algum erro!')</script>";}
}
?>

