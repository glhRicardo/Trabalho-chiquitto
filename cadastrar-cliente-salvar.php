
<?php

/*
Receber as informações do formulário de cadastro 
*/

$nome = $_POST['nome'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$senha = $_POST['senha'];
$usuario = $_POST['login'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];

$dtNasc = ("$dia/$mes/$ano");

$dtNasc =  implode("-", array_reverse(explode("/", $dtNasc)));
include 'conecta.php';


$sql = "select email, login, cpf from usuario";
$resultado = mysql_query($sql);

$linha2 = mysql_fetch_array($resultado);
$emailVerificado = $linha2['email'];
$loginVerificado = $linha2['login'];
$cpfVerificado = $linha2['cpf'];

if($emailVerificado == $email){
	?>
    <script type="text/javascript">
	alert('Email ja existente!');
	window.location = 'CadastroCliente.php';
	</script>
    <?php
	exit;
	}


if($loginVerificado == $usuario){
	?>
    <script type="text/javascript">
	alert('Login ja existente!');
	window.location = 'CadastroCliente.php';
	</script>
    <?php
	exit;
	}
	
if($cpfVerificado == $cpf){
	?>
    <script type="text/javascript">
	alert('CPF ja existente!');
	window.location = 'CadastroCliente.php';
	</script>
    <?php
	exit;
	}

$sql = "select id_cid, estado from tb_cidades where nome like '$cidade'";
$resultado = mysql_query($sql);

$linha = mysql_fetch_array($resultado);
$idcidade = $linha['id_cid'];
$ciduf = $linha['estado'];

if($uf <> $ciduf){
	?>
    <script type="text/javascript">
	alert('CIDADE não pertence a este Estado.');
	window.location = 'CadastroCliente.php';
	</script>
    <?php
	exit;
	}

$sql = "insert into usuario (id_Cid, nome_Usu, login, senha, email, end, cep, sexo, bairro, telefone, data_nasc, cpf) values ('$idcidade','$nome', '$usuario', '$senha', '$email', '$endereco' ,'$cep', '$sexo', '$bairro','$telefone', '$dtNasc', '$cpf')";

$resultado = mysql_query($sql);


if($resultado === true) {
	?>
    <script type="text/javascript">
	alert('SEUS DADOS FORAM SALVOS.');
	window.location = 'home2.php';
	</script>
    <?php
}
else {
	?>
    <script type="text/javascript">
	alert('SEU COMANDO INSERT FALHOU.');
	window.location = 'CadastroCliente.php';
	</script>
    <?php
	echo mysql_error();
}

?>