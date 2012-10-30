<?php

$nomeFaixa = $_POST['nome'];
$data_cria = $_POST['data_cria'];
$duracao = $_POST['duracao'];
$data_grav = $_POST['data_grav'];
$idAutor = $_POST['autor'];


$data_cria = implode("-", array_reverse(explode("/", $data_cria)));
$data_grav = implode("-", array_reverse(explode("/", $data_grav)));


include ('conecta.php');


//inserindo dados da musica na tabela
$sql1 = "insert into faixa (nome, data_cria, duracao, data_grav) values ('$nomeFaixa','$data_cria', '$duracao', '$data_grav')";
$resultado = mysql_query($sql1) or die(mysql_error());

//var_dump($resultado);
//exit;

if($resultado === true){
	$idFaixa = mysql_insert_id();
	
	foreach($idAutor as $autor) {
		$sql = "INSERT INTO autor_faixa
		(id_Autor, id_Faixa) VALUES
		('$autor', '$idFaixa')";
		mysql_query($sql);
	}

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
	alert('Erro ao Inserir Dados.');
	window.location = 'adm.php';
	</script>
    <?php
}	
?>
