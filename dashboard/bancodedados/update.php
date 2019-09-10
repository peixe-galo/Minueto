<?php
session_start();
include_once 'conexao.php';
$id = $_SESSION['id'];
if ($_SESSION['tipo']!=2){

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
}
else{
	$nome="";
	$email="";
}
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
$CPF = filter_input(INPUT_POST, 'CPF', FILTER_SANITIZE_NUMBER_INT);
$RG = filter_input(INPUT_POST, 'RG', FILTER_SANITIZE_NUMBER_INT);
$ENDERECO = filter_input(INPUT_POST, 'ENDERECO', FILTER_SANITIZE_SPECIAL_CHARS);
if($nome=="" or $email==""){
	$queryUpdate = $link->query("update tb_clientes set telefone='$telefone', CPF='$CPF', RG='$RG', ENDERECO='$ENDERECO' where id='$id'");

}

else{$queryUpdate = $link->query("update tb_clientes set nome='$nome', email='$email', telefone='$telefone', CPF='$CPF', RG='$RG', ENDERECO='$ENDERECO' where id='$id'");
}
$affected_rows = mysqli_affected_rows($link);
if ($_SESSION['tipo']==1 or $_SESSION['tipo']==0){
	header("Location:../consultas.php");}
if ($_SESSION['tipo']==2){
	header("Location:../perfil.php");}

	?>
