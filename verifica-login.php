<?php

$login = $_POST['login'];
$senha = $_POST['senha'];



include 'conecta.php';

$sql = "SELECT id_Usu, nome_Usu, login, senha FROM usuario
where (login = '$login') and (senha = '$senha')";
$resultado = mysql_query($sql);


if( mysql_num_rows($resultado)==1){
	$linha = mysql_fetch_assoc($resultado);
	
	//Inicia a Sessão
	session_start();
	$_SESSION['logado'] = true;
	$_SESSION['deslogado'] = false;
	$_SESSION['nome_Usu'] = $linha['nome_Usu'];
	$_SESSION['id_Usu'] = $linha['id_Usu'];
	
	//Redirecionar usuario para index.php
	header('location:home2.php');
	exit;
}
else{?>
    <script type="text/javascript">
	alert('Dados Incorretos!');
	window.location = 'home2.php';
	</script>
    <?php
	exit;
}