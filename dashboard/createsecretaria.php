<?php
session_start();
include('bancodedados/conexao2.php');
if(isset($_POST))
{
	$query = "INSERT INTO users (nome,email,password,tipo) VALUES(?,?,password(?),?)";

	$statement = $dbh->prepare($query);
	$nome=$_POST['nome'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$statement->execute(array($nome,$email,$password,0));
	header("Location:index.php");
}

?>