<?php

require_once("config.php");

//$sql = new Sql();

//$usuarios = $sql->select("SELECT * FROM teste");

//echo json_encode($usuarios);

//Carrega um usuário
//$usuario->loadById(1);
//echo $usuario;

//CArrega uma lista de usuários

//$lista = Usuario::getList();

//echo json_encode($lista);

//Carrega lista de usuário pelo nome
//$busca = Usuario::getSearch("Vi");
//echo json_encode($busca);


//Carrega dados passando 2 parametros
//$resultado = new Usuario;
//$resultado->login("Mariana Bertiz","34");
//echo $resultado;

//Inserir
//$user = new Usuario("Mirian","30");

//$user->insert();


//Update
//$usuario = new Usuario;
//$usuario->loadById("3");
//$usuario->update("Mariana");


//Delete
$usuario = new Usuario;
$usuario->loadById("6");
$usuario->delete();


?>