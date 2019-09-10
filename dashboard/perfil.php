<?php
session_start();
error_reporting(1);
include('bancodedados/conexao2.php');
include_once 'bancodedados/conexao.php';
if(!isset($_SESSION['id']) or ($_SESSION['tipo']!=2))
{	
	header('location:login.php');
}
else{

	$id = $_SESSION['id'];
	$querySelect = $link->query("select * from tb_clientes where id='$id'");
	
	
	while($registros = $querySelect->fetch_assoc()):
		$nome = $registros ['nome'];
		$email = $registros ['email'];
		$telefone = $registros ['telefone'];
		$CPF = $registros ['CPF'];
		$RG = $registros ['RG'];
		$ENDERECO = $registros ['ENDERECO'];
	endwhile;
	?>

	<script type="text/javascript">
		function fMasc(objeto,mascara) {
			obj=objeto
			masc=mascara
			setTimeout("fMascEx()",1)
		}
		function fMascEx() {
			obj.value=masc(obj.value)
		}
		function mTel(tel) {
			tel=tel.replace(/\D/g,"")
			tel=tel.replace(/^(\d)/,"($1")
			tel=tel.replace(/(.{3})(\d)/,"$1)$2")
			if(tel.length == 9) {
				tel=tel.replace(/(.{1})$/,"-$1")
			} else if (tel.length == 10) {
				tel=tel.replace(/(.{2})$/,"-$1")
			} else if (tel.length == 11) {
				tel=tel.replace(/(.{3})$/,"-$1")
			} else if (tel.length == 12) {
				tel=tel.replace(/(.{4})$/,"-$1")
			} else if (tel.length > 12) {
				tel=tel.replace(/(.{4})$/,"-$1")
			}
			return tel;
		}
		function mCNPJ(cnpj){
			cnpj=cnpj.replace(/\D/g,"")
			cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
			cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
			cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
			cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
			return cnpj
		}
		function mCPF(cpf){
			cpf=cpf.replace(/\D/g,"")
			cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
			cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
			cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
			return cpf
		}
		function mCEP(cep){
			cep=cep.replace(/\D/g,"")
			cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
			cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
			return cep
		}
		function mNum(num){
			num=num.replace(/\D/g,"")
			return num
		}
	</script>

	<script>
		function formatar(mascara, documento){
			var i = documento.value.length;
			var saida = mascara.substring(0,1);
			var texto = mascara.substring(i)

			if (texto.substring(0,1) != saida){
				documento.value += texto.substring(0,1);
			}

		}
	</script>



	<?php include_once('includes/header.inc.php');
	include_once ('includes/menu.inc.php');?>


	<div class="row container">
		<p>&nbsp;</p>
		<form action="bancodedados/update.php" method="post" class="col s12">
			<fieldset class="formulario" style="padding: 15px">
				<center><legend><img src="imagens/fotoperfil.png" alt="(imagem)" width="120"></legend></center>
				<h5 class="light center">Alteração do Perfil</h5>
<center><h4><?php echo "Seja bem vindo, $nome!"; ?></h4></center>
<hr></hr>

&nbsp&nbsp&nbsp&nbsp Para sua comodidade, deixamos abaixo alguns dados que você pode editar conforme suas necessidades.
				<!-- campo nome -->
				

				<!-- telefone -->
				<div class="input-field col s12">
					<i class="material-icons prefix">phone</i>
					<input type="tel" name="telefone"  value="<?php echo $telefone?>" id="telefone" maxlength="14" onkeydown="javascript: fMasc( this, mTel );" required placeholder="Telefone do Cliente">

				</div>


				<!-- cpf -->
				<div class="input-field col s12">
					<i class="material-icons prefix">credit_card</i>
					<input type="text" name="CPF" id="CPF" value="<?php echo $CPF?>" maxlength="14" onkeydown="javascript: fMasc( this, mCPF );" required  placeholder="CPF do Cliente">

				</div>

				<!-- rg -->
				<div class="input-field col s12">
					<i class="material-icons prefix">contact_mail</i>
					<input type="text" name="RG" id="RG" value="<?php echo $RG?>" OnKeyPress="formatar('###.###.###-##', this)" maxlength="13" required placeholder="RG do Cliente">

				</div>

				<!-- endereco -->
				<div class="input-field col s12">
					<i class="material-icons prefix">home</i>
					<input type="text" name="ENDERECO" id="ENDERECO" value="<?php echo $ENDERECO?>"maxlength="50" required placeholder="Endereço do cliente">

				</div>
				<p>
				Caso necessite alterar seu nome e email, entre em contato com nosso número (21)2489-8184 ou então pelo nosso email:
				<a href="mailto:contatominueto@outlook.com">contatominueto@outlook.com.</label>
				




				<!-- botoes -->
				<div class="input-field col s12">
					<input type="submit" value="alterar" class="btn blue">
					<a href="consultas.php" class="btn red">cancelar</a>
				</fieldset>

			</div>

		</form>


		<?php 
		include_once 'includes/footer.inc.php';

	} ?>