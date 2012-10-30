<?php

$nome = $_POST['nome'];
$data_form = $_POST['data_form'];
$n_musicos = $_POST['n_musicos'];

$data_form = implode("-", array_reverse(explode("/", $data_form)));
include('conecta.php');

//Verifica se o autor existe se ele existir envia uma mensssagen informando
$sql = "select id_Banda, nome_Banda from banda where nome_Banda like '$nome'";
$resultado = mysql_query($sql);

$linha = mysql_fetch_array($resultado);
$idBanda = $linha['id_Banda'];
$nomeBanda = $linha['nome_Banda'];

if($nomeBanda == $nome){
	?>
    <script type="text/javascript">
	alert('Essa Banda Já existe');
	window.location = 'adm.php';
	</script>
    <?php
	exit;
}

//faz a inserção do autor caso ele não tenha sido cadastrado
$sql = "insert into banda (nome_Banda, data_form, n_musicos) values ('$nome','$data_form', '$n_musicos')";
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