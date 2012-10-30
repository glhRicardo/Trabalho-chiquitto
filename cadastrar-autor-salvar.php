<?php

$nome = $_POST['nome'];
$dataNasc = $_POST['data_nasc'];


$dataNasc = implode("-", array_reverse(explode("/", $dataNasc)));

include('conecta.php');



if(!is_string('$nome')){
	?>
    <script type="text/javascript">
	alert('No campo NOME no cadastro de autor é permitido somente Letras');
	window.location = 'adm.php';
	</script>
    <?php
	exit;
}

//Verifica se o autor existe se ele existir envia uma mensssagen informando
$sql = "select id_autor, nome from autor where nome like '$nome'";
$resultado = mysql_query($sql);

$linha = mysql_fetch_array($resultado);
$idautor = $linha['id_autor'];
$nomeAutor = $linha['nome'];

 

if($nome == $nomeAutor){
	?>
    <script type="text/javascript">
	alert('Esse Autor Já existe');
	window.location = 'adm.php';
	</script>
    <?php
	exit;
}

//faz a inserção do autor caso ele não tenha sido cadastrado
$sql = "insert into autor (nome, data_nasc) values ('$nome','$dataNasc')";
$resultado = mysql_query($sql);

if($resultado === true) {
	?>
    <script type="text/javascript">
	alert('SEUS DADOS FORAM SALVOS.');
	window.location = 'adm.php';
	</script>
    <?php
}
else {
	?>
    <script type="text/javascript">
	alert('Erro ao inserir Dados.');
	window.location = 'adm.php';
	</script>
    <?php
	echo mysql_error();
}

?>