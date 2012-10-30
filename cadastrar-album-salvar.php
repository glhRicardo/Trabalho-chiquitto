<?php

$nomeAlbum = $_POST['nome'];
$data_lanc = $_POST['data_lanc'];
$nFaixa = $_POST['n_musicas'];
$descricao = $_POST['descricao'];
$idMusico = $_POST['musico'];
$idFaixa = $_POST['musica'];
$nome = $_POST['nomeArquivo'];

$data_lanc = implode("-", array_reverse(explode("/", $data_lanc)));

//print_r($_FILES);

// Verificar se o arquivo existe dentro de $_FILES

if( ! isset($_FILES['arquivo'])){
	echo 'Envie um arquivo';
	exit;	
}
// Verificar se houve falhas no upload
if($_FILES['arquivo']['error'] != '0'){
	echo 'Erro ao enviar o arquivo';
	exit;
}
// Verificar o tamanho do arquivo
if($_FILES['arquivo']['size'] > (1024*1024)){
	echo 'Tamanho do arquivo excedido, você pode enviar somente arquivos com 1MB';
	exit;
}
// Salvar o arquivo
$copiou = copy($_FILES['arquivo']['tmp_name'], 'upImagens/'.$nome.'.jpg');


include ('conecta.php');

//inserindo dados 
$sql = "insert into Album (nome, data_lan, n_faixas, descricao, id_Musico, nome_Imagem)
values ('$nomeAlbum','$data_lanc', '$nFaixa', '$descricao', '$idMusico', '$nome')";
$resultado = mysql_query($sql);




if($resultado === true) {
	$idAlbum = mysql_insert_id();
	
	
	foreach($idFaixa as $faixa) {
		$sql = "INSERT INTO faixa_Album
		(id_Album, id_Faixa ) VALUES
		('$idAlbum', '$faixa')";
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
