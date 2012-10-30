<?php
include 'protege.php';
include 'conecta.php';

				//verifica se o usuario pode entrar nessa pagina
					
					if($_SESSION['id_Usu'] != 2 ){
						?>
						<script type="text/javascript">
						alert('Acesso Restrito a Administradores.');
						window.location = 'home2.php';
						</script>
                	
                <?php
				}
						
                			

$sql = 'SELECT id_Autor,nome
FROM autor ORDER BY nome';
$resultado = mysql_query($sql);

$sql2 = 'SELECT id_Faixa,nome
FROM faixa ORDER BY nome';
$resultado2 = mysql_query($sql2);

$sql3 = 'SELECT id_Banda, nome_Banda
FROM banda ORDER BY nome_Banda';
$resultado3 = mysql_query($sql3);

$sql4 = 'SELECT	id_Musico, nome
FROM musico ORDER BY nome';
$resultado4 = mysql_query($sql4); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admisnistração do Site</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<link href="cadastrosADM.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript"><?php include('validacoes.js')?></script>
<body>
<div id="pagina"> 
    	<div  id="topo">
        	<img src="logo.png" alt="LOGO" />
		</div><!-- fim div topo -->
        
        <div id="menu"><!--Menu, manter em todas as paginas -->	
        	<div id="menuAdm" align="center">
            	<ul>
                	<li><a href="home2.php">Voltar Para Pagina</a></li>
                	<li>Adiministração do Site e Cadastros</li>  
            	</ul>
        	</div>		
        </div>     
</div>
 <!-- Inicio dos cadastros -->
 
     <div id="Cadastros" >   
        <div id="admCadastrar1">
        
           	<form id="admCadastrar1"  method="post" action="cadastrar-banda-salva.php" onSubmit=" ">
            <h1>Cadastrar Banda</h1>
 			<table width="500" border="0">
 				<tr>
      				<td width="118">Nome da Banda:</td>
     				<td width="370"><input name="nome" type="text" id="nome" size="42" maxlength="60" /></td>
        		</tr>
                <tr>
                	<td>Data de Formação:</td>
                    <td><input name="data_form" type="text" id="data_form" size="20" maxlength="10" onBlur="validaDat(this,this.value)" onKeyUp="Formatadata(this,event)" /></td>
    			<tr>
                <tr>
                	<td>Nº de Integrantes:</td>
                    <td><input name="n_musicos" type="text" id="n_musicos" size="20" maxlength="10" /></td>
    			<tr>
      				<td colspan="2"><p>
        			<input name="cadastrar" type="submit" id="cadastrar" value="Concluir meu Cadastro!" /> 
        			<input name="limpar" type="reset" id="limpar" value="Limpar Campos preenchidos!" />         
          	    	</td>
   				 </tr>
  			</table>
			</form>
                     		  
        </div>
        
         <div id="admCadastrar2">
        
           	<form id="admCadastrar2"  method="post" action="cadastrar-musico-salvar.php" onSubmit=" ">
            <h1>Cadastrar Musico</h1>
 			<table width="500" border="0">
 				<tr>
      				<td width="130">Nome:</td>
     				<td width="370"><input name="nome" type="text" id="nome" size="42" maxlength="60" /></td>
        		</tr>
                <tr>
                	<td>Data de Nasc:</td>
                    <td><input name="data_nasc" type="text" id="data_nasc" size="20" maxlength="10" onKeyUp="Formatadata(this,event)"/></td>
    			<tr>
                <tr>
                	<td>Função:</td>
                    <td><input name="funcao" type="text" id="funcao" size="30" maxlength="40" /></td>
    			<tr>
                <tr>
      				<td>Tem banda?:</td>
      				<td><input name="confirmaBanda" type="radio" value="sim" checked="checked" />
       					 Sim 
        				<input name="confirmaBanda" type="radio" value="nao" />
        				 Não </td>
    			</tr>
                <tr>
                	<td>Selecione a Banda:</td>
                   <td><select name="banda[]" size="6" id="banda[]" multiple>
                            <option value="0">Artista Solo</option>
    							<?php
  									mysql_data_seek($resultado3, 0);
 								 	while($linha = mysql_fetch_assoc($resultado3)) {
 								?>
   							 <option value="<?php echo $linha['id_Banda']; ?>"><?php echo $linha['nome_Banda']; ?></option>
   								<?php } ?>
  						</select></td>
                </tr>
    			<tr>
      				<td colspan="2"><p>
        			<input name="cadastrar" type="submit" id="cadastrar" value="Concluir meu Cadastro!" /> 
        			<input name="limpar" type="reset" id="limpar" value="Limpar Campos preenchidos!" />         
          	    	</td>
   				 </tr>
  			</table>
			</form>
                     		  
        </div>
         <div id="admCadastrar3">
        
           	<form id="admCadastrar3"  method="post" action="cadastrar-album-salvar.php" enctype="multipart/form-data" onSubmit=" ">
            <h1>Cadastrar Album</h1>
 			<table width="500" border="0">
 				<tr>
      				<td width="118">Nome da Album:</td>
     				<td width="370"><input name="nome" type="text" id="nome" size="42" maxlength="60" /></td>
        		</tr>
                <tr>
                	<td>Data de lançamento:</td>
                    <td><input name="data_lanc" type="text" id="data_lanc" size="20" maxlength="10" onKeyUp="Formatadata(this,event)"/></td>
    			</tr>
                <tr>
                	<td>Nº de Musicas:</td>
                    <td><input name="n_musicas" type="text" id="n_musicas" size="20" maxlength="10" /></td>
    			</tr>
                <tr>
                	<td>Descrição:</td>
                    <td><textarea name="descricao" id="descricao" rows="5" cols="40" maxlength="300"></textarea></td>
    			</tr>
                <tr>
                	<td>Musicas:</td>
                    <td><select name="musica[]" size="6" id="musica[]" multiple>
    						<option value="0">Selecione as Musicas</option>
    							<?php
  									mysql_data_seek($resultado2, 0);
 								 	while($linha = mysql_fetch_assoc($resultado2)) {
 								?>
   							 <option value="<?php echo $linha['id_Faixa']; ?>"><?php echo $linha['nome']; ?></option>
   								<?php } ?>
  						</select></td>
    			</tr>
                <tr>
                	<td>Musico:</td>
                    	<td><select name="musico"  id="musico">
    							<option value="0">Selecione um Musico</option>
  									<?php
  										while($linha2 = mysql_fetch_assoc($resultado4)) {
  									?>
    							<option value="<?php echo $linha2['id_Musico']; ?>"><?php echo $linha2['nome']; ?></option>
    								<?php } ?>
  							</select></td>
                 </tr>
                 
                 <tr>
                 	<td><br /><label>Insira a imagem do Album:</label></td>
                    <td><br /><input type="file" name="arquivo" /></td>  
                 </tr>
               
                 <tr>
                 	<td><br />Nome da imagem:</td>
                    <td><br /><input type="text" name="nomeArquivo" id="nomeArquivo"/></td>
                 </tr>
                <tr>
      				<td colspan="2"><p>
        			<input name="cadastrar" type="submit" id="cadastrar" value="Concluir meu Cadastro!" /> 
        			<input name="limpar" type="reset" id="limpar" value="Limpar Campos preenchidos!" />         
          	    	</td>
   				 </tr>
     
  			</table>
			</form>
                     		  
        </div>
        
         <div id="admCadastrar4">
        
           	<form id="admCadastrar4"  method="post" action="cadastrar-musica-salvar.php"  onSubmit=" " >
            <h1>Cadastrar Musica</h1>
 			<table width="500" border="0">
 				<tr>
      				<td width="130">Nome:</td>
     				<td width="370"><input name="nome" type="text" id="nome" size="42" maxlength="60" /></td>
        		</tr>
                <tr>
                	<td>Data de Criação:</td>
                    <td><input name="data_cria" type="text" id="data_cria" size="20" maxlength="10" onKeyUp="Formatadata(this,event)" /></td>
    			<tr>
                <tr>
                	<td>Duraçao:</td>
                    <td><input name="duracao" type="text" id="duracao" size="20" maxlength="10" /></td>
    			<tr>
                <tr>
                	<td>Data de Gravaçao:</td>
                    <td><input name="data_grav" type="text" id="data_grav" size="20" maxlength="10" onKeyUp="Formatadata(this,event)" /></td>
    			<tr>
                <tr>
                	<td>Autor:</td>
                    <td><select name="autor[]" size="5" id="autor[]" multiple>
    						<option value="0">Selecione os Autores</option>
    							<?php
  									mysql_data_seek($resultado, 0);
 								 	while($linha = mysql_fetch_assoc($resultado)) {
 								?>
   							 <option value="<?php echo $linha['id_Autor']; ?>"><?php echo $linha['nome']; ?></option>
   								<?php } ?>
  						</select></td>
    				<tr>
      				<td colspan="2"><p>
        			<input name="cadastrar" type="submit" id="cadastrar" value="Concluir meu Cadastro!" /> 
        			<input name="limpar" type="reset" id="limpar" value="Limpar Campos preenchidos!" />         
          	    	</td>
   				 </tr>
  			</table>
			</form>
                     		  
        </div>
        <div id="admCadastrar5">
        
           	<form id="admCadastrar5"  method="post" action="cadastrar-autor-salvar.php" onSubmit="">
            <h1>Cadastrar Autor</h1>
 			<table width="500" border="0">
 				<tr>
      				<td width="130">Nome:</td>
     				<td width="370"><input name="nome" type="text" id="nome" size="42" maxlength="50"  /></td>
        		</tr>
                <tr>
                	<td>Data de Nascimento:</td>
                    <td><input name="data_nasc" type="text" id="data_nasc" size="20" maxlength="10" onKeyUp="Formatadata(this,event)" /></td>
    			<tr>
    			<tr>
      				<td colspan="2">
        			<input name="cadastrar" type="submit" id="cadastrar" value="Concluir meu Cadastro!" /> 
        			<input name="limpar" type="reset" id="limpar" value="Limpar Campos preenchidos!" />         
          	    	</td>
   				 </tr>
  			</table>
			</form>
                     		  
        </div>      		
      </div> 
                
</body>
</html>
