<?php

require_once("config.php");

$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM teste");

echo json_encode($usuarios);

?>