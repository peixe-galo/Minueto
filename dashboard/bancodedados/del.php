<?php

$id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

echo 'Quer mesmo excluir esse registro?';
echo "<a href='delete.php?id=$id'>sim</a>/ ";
echo "<a href='../consultas.php'>não</a>";