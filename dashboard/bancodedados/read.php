<?php

include_once 'conexao.php';

$querySelect = $link->query("select * from tb_clientes");
while($registros = $querySelect->fetch_assoc()):
	$id = $registros['id'];
	$nome = $registros['nome'];
	$email = $registros['email'];
	$telefone = $registros['telefone'];
	$CPF = $registros['CPF'];
	$RG = $registros['RG'];
	$ENDERECO = $registros['ENDERECO'];

	echo "<tr>";
	echo "<td>$nome</td>
	<td>$email</td>
	<td>$telefone</td>
	<td>$CPF</td> 
	<td>$RG</td>
	<td>$ENDERECO</td>
	<td><a href='editar.php?id=$id'>
	<i class='material-icons'>edit</i></a></td>
	 <td><a href='bancodedados/del.php?id=$id'><i class='material-icons'>delete</td>";
	echo "</tr>";

endwhile; 