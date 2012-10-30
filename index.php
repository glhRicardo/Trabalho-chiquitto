
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Discography</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<div id="pagina"> 
    	<div  id="topo">
        	
        	<img src="logo.png" alt="LOGO" />
            
		</div><!-- fim div topo -->
        
        <div id="menu"><!--Menu, manter em todas as paginas -->

        <div id="menu" align="right">
            <ul>
                <li><a href="home2.php">Home</a></li>
                <li><a href="sobre.php">Sobre</a></li>
                <li><a href="consulta.php">Discografias</a></li>
                <li><a href="CadastroCliente.php">Cadastrar</a></li>
                <li><a href="contato.php">Contato</a></li>
                
                <?php 
				session_start();
				if( !isset($_SESSION['deslogado']) ){?>
				<form action="verifica-login.php" method="post">
                	<li>Login: <input type="text" name="login" id="login"> 
                		Senha: <input type="password" name="senha" id="senha" >
                		<input type="submit" value="Entrar">
                    </li>
                </form>	
                <?php
				}
						
                if( isset($_SESSION['logado']) ){?>
					 <li> Bem vindo <?php echo $_SESSION['nome_Usu']; ?></li>
                <?php
				}
				?>
                
            </ul>
        </div>		
        </div> 
       
    </div>
</body>
</html>
