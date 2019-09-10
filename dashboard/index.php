<?php session_start();
if (!isset($_SESSION['id'])){
	header("Location: login.php");
}
else{
	if ($_SESSION['tipo']==2) {
		header("Location: perfil.php");
	}
	?><?php include_once  'includes/header.inc.php' ?>
	<?php include_once  'includes/menu.inc.php' ?>

	<!-- formulario de cadastro -->

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




	<div class="row container">
		<p>&nbsp;</p>

		<form action="bancodedados/create.php" method="post" class="col s12">
			<fieldset class="formulario" style="padding: 15px">
				<legend><img src="imagens/avatar-2.png" alt="(imagem)" width="100"></legend>
				<h5 class="light center">Cadastro de Clientes</h5>

				<?php
				if(isset($_SESSION['msg'])):
					echo $_SESSION['msg'];
					session_unset();
				endif;
				?>

				<!-- campo nome -->
				<div class="input-field col s12">
					<i class="material-icons prefix">account_circle</i>
					<input type="text" name="nome" id="nome" placeholder="Nome do Cliente" maxlength="40" required autofocus>
					
				</div>

				<!-- email -->
				<div class="input-field col s12">
					<i class="material-icons prefix">email</i>
					<input type="email" name="email" id="email" placeholder="Email do Cliente" maxlength="50">
					
				</div>

				<!-- telefone -->
				<div class="input-field col s12">
					<i class="material-icons prefix">phone</i>
					<input type="tel" name="telefone" id="telefone" maxlength="14" placeholder="Telefone do Cliente" onkeydown="javascript: fMasc( this, mTel );" required>
					
				</div>

				<!-- cpf -->
				<div class="input-field col s12">
					<i class="material-icons prefix">credit_card</i>
					<input type="text" name="CPF" id="CPF" maxlength="14" onkeydown="javascript: fMasc( this, mCPF );" placeholder="CPF do Cliente" required>

				</div>

				
				<!-- rg -->
				<div class="input-field col s12">
					<i class="material-icons prefix">contact_mail</i>
					<input type="text" name="RG" id="RG" OnKeyPress="formatar('###.###.###-##', this)" maxlength="13" required placeholder="RG do Cliente">
					
				</div>


				<!-- endereco -->
				<div class="input-field col s12">
					<i class="material-icons prefix">home</i>
					<input type="text" name="ENDERECO" id="ENDERECO" maxlength="50" required placeholder="Endereço do cliente">
					
				</div>
				<div class="input-field col s12">
					<i class="material-icons prefix">lock</i>
					<input type="text" name="password" id="password" maxlength="50" required placeholder="password">
					
				</div>

				<!-- botoes -->
				<div class="input-field col s12">
					<input type="submit" value="cadastrar" class="btn blue">
					<input type="reset" value="limpar" class="btn red">
				</fieldset>

			</div>

		</form>
		
		<?php include_once  'includes/footer.inc.php'; 
	} ?>

