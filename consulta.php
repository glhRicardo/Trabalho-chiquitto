<?php include('index.php'); ?>
<!-- é necessário se logar para entrar na tela de consulta
Não fiz um include no arquivo protege, pois ja existe um arquivo com o (Session start()), quando adicionamos o include do protege, uma das sessões é ignorada gerando uma erro. -->
<?php if( !isset($_SESSION['logado']) ){
	?>
    <script type="text/javascript">
	alert('Você precisa estar logado para acessar essa pagina!');
	window.location = 'home2.php';
	</script>
    <?php
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Consulta de Albuns</title>

<!-- CSS DA PÁGINA -->
<style type="text/css">
#corpo { background-image:url(transparente.png); width:1000px; margin:auto; }
#titulo{ background:#000; width:1000px; border:1px #FFF solid, 	color:#930;  }
#imagem{background:#FFF; width:300px; height:300px; float:right; padding-right:10px; margin-top:10px; margin-right: 10px;}
p{ color:#FFF; padding:10px; font-family:Georgia, "Times New Roman", Times, serif; font-size:16px;}
h2{	color:#930; padding:5px; margin:auto; font-size:30px; font-family:Verdana, Geneva, sans-serif;}
</style>

<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>


<br />	
<?php
// conexão com o banco!
include('conecta.php');


//selecionando os dados do album
$sql = "select id_Album, nome, data_lan, n_faixas, descricao, id_Musico, nome_Imagem from album order by nome";
$resultado = mysql_query($sql);


//while pra percorrer os dados de todos os albuns
while ( $linha = mysql_fetch_assoc($resultado)){ ?>
<div id="corpo">

	<!-- Titulo do album -->
	<div id="titulo" align="center"><h2><?php echo $linha['nome'] ?></h2></div>    
   
    <?php $idAlbum = $linha['id_Album']; ?>
    
    <!-- selecionando o nome da imagem no banco para listar na consulta!! Q Trabalho!! =[ -->
    <div id="imagem">
      	<?php 
		$verificaImagem1 = "select nome_Imagem from album where id_Album = $idAlbum";
		$verificaImagem = mysql_query($verificaImagem1); ?>
        
        <?php while($linhaImagem = mysql_fetch_assoc($verificaImagem)){ ?>
        
        <img src="upImagens/<?php echo $linhaImagem['nome_Imagem']; ?>.jpg" width="310" height="310" alt="" />
        
        <?php } ?>
    </div>
    
    <!-- informamdo data de lançamento, nº de faixas, e descrição do album echo date('d/m/Y', strtotime($data)); -->
    <p>Data de Lançamento :  <?php  echo date('d/m/Y', strtotime($linha['data_lan'])); ?></p>
    <p>Nº de Faixas       :  <?php echo $linha['n_faixas'] ?></p>
    <p>Descrição          :  <?php echo $linha['descricao'] ?></p>
  
   <!-- Listando as faixas -->
    <?php 
		
		$consulta1 = 
		"select nome from faixa where id_Faixa in
		(select id_Faixa from faixa_album where id_album = $idAlbum)
		order by nome";
		$faixa = mysql_query($consulta1); ?>
	
	<p>Faixas :</p>
	<?php
	while($linha1 = mysql_fetch_assoc($faixa)){ ?>
		 <p><?php echo '--' . $linha1['nome'];?></p> 
	<?php }?>
     
     
     <!--Listando os Musicos-->
     <?php 
		$idMusico = $linha['id_Musico']; 
	 	$consulta2 = "select nome from musico where id_Musico = $idMusico";
		$musico = mysql_query($consulta2);
		?>
        
        
	<?php
		while($linha2 = mysql_fetch_assoc($musico)){ ?>
        <p>Musico: <?php echo $linha2['nome'] ?></p>
	<?php }?>  
  
 	
    <!-- Mostrando a Banda -->
     
     <p>Banda :</p>
     <?php 
	 	//Verifica se o Musico possui uma banda
	 	$verifica = "select tipo from musico where id_Musico = $idMusico";
	 	$verifica1 = mysql_query($verifica);
		
		//Seleciona a banda referente ao album, se n tiver banda informa que o cantor é solo!!
		while ($linhaTipo = mysql_fetch_assoc($verifica1)){
			if($linhaTipo['tipo'] == 'sim'){
				$banda1 = 
				"select nome_Banda from banda where id_Banda in
				(select id_Banda from membro_banda where id_musico = $idMusico)
				order by nome_Banda";
				$banda = mysql_query($banda1);
				?>
                
				<?php while($linha3 = mysql_fetch_assoc($banda)){ ?>
		 				<p><?php echo $linha3['nome_Banda'];?></p> 
				<?php } ?>
            <?php }else{ ?>
				<p><?php echo 'Este Album é de um Cantor Solo!!! '; ?></p>
			<?php } ?>
         <?php } ?>
	 
</div>
<?php } ?>
</body>
</html>




