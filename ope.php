
<?php 

// session_start() inicia a sessao

session_start();

// as variaveis login e senha recebem os dadso digitados no form

$login =$_POST['login'];
$senha =$_POST['senha'];

// as linhas a seguir  se conectam ao banco

$conn  = mysqli_connect('localhost','root','');


$select = mysqli_select_db($conn,'banco') or die("erro no banco");

// a variavel result pega as variveis login e senha e faz a esquisa no banco de dados

$result = mysqli_query( $conn, "SELECT * FROM usuario WHERE nome = '$login' AND senha ='$senha' "); 

/*
abaixo temos um bloco if verificando se a consulta gerou algum resultado se sim ela retorna
o valor 1 se nao ela retorna o valor 0. dependendo do resultado o susrio sera mandado de volta
a pagina de login ou pra pagina principal
*/
 

if (mysqli_num_rows($result) > 0 ) {

	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $senha;

	header('location:tela_admin.php');
    


} else {

   unset($_SESSION['login']);
   unset($_SESSION['senha']);

	header('location:index.php');
	echo "erro";

}









/* script do banco

CREATE DATABASE banco;

CREATE TABLE usuario(

    id_user int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(50),
    senha varchar(50)

);
*/

 ?>