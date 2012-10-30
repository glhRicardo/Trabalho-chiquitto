<?php

$nome = $_POST['nome'];
$dataNasc = $_POST['data_nasc'];
$funcao = $_POST['funcao'];
$confirmaBanda = $_POST['confirmaBanda'];
$idBanda = $_POST['banda'];

$dataNasc = implode("-", array_reverse(explode("/", $dataNasc)));

include('conecta.php');


//inserindo dados da musica na tabela
$sql = "insert into musico (nome, data_nasc, funcao, tipo) values ('$nome','$dataNasc', '$funcao', '$confirmaBanda')";
$resultado = mysql_query($sql);

if($resultado === true) {
	$idMusico = mysql_insert_id();
	
	foreach($idBanda as $banda) {
		
		//echo $idBanda;
		//echo $item;
		//exit;
		
		$sql = "INSERT INTO membro_banda
		(id_Banda, id_Musico) VALUES
		('$banda', '$idMusico')";
		mysql_query($sql);
	}
	
	//echo $sql;
	//exit;
	
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
