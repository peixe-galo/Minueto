<?php
$uft8 = header("Content-Type: text/html; charset=utf-8");
$link = new mysqli ('localhost','root','','cadastro');
$link->set_charset ('utf8')
?>