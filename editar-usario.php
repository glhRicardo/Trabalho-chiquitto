<?php
include('protege.php');
include('conecta.php');

$id = $_SESSION['id_Usu'];			

$sql = "SELECT nome_Usu, login, email, end, cep, sexo, bairro, telefone, data_nasc,cpf from usuario where id_Usu = $id" ;
$resultado = mysql_query($sql);

if($resultado === false) {
	echo 'ERRO NO SQL';
	exit;
}

if( mysql_num_rows($resultado) == 0 ) {
	echo 'CLIENTE INEXISTENTE';
	exit;
}

$linha = mysql_fetch_assoc($resultado);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="estilo.css" rel="stylesheet" type="text/css" />
<title>Editar Usuario</title>
</head>
<script type="text/javascript">
function valida(){
				if(valida_cpf(document.getElementById('cpf').value))
					alert('CPF Válido');
				else
					alert('CPF Inválido');
			}
			
			function valida_cpf(cpf){
				  var numeros, digitos, soma, i, resultado, digitos_iguais;
				  digitos_iguais = 1;
				  if (cpf.length < 11)
						return false;
				  for (i = 0; i < cpf.length - 1; i++)
						if (cpf.charAt(i) != cpf.charAt(i + 1))
							  {
							  digitos_iguais = 0;
							  break;
							  }
				  if (!digitos_iguais)
						{
						numeros = cpf.substring(0,9);
						digitos = cpf.substring(9);
						soma = 0;
						for (i = 10; i > 1; i--)
							  soma += numeros.charAt(10 - i) * i;
						resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
						if (resultado != digitos.charAt(0))
							  return false;
						numeros = cpf.substring(0,10);
						soma = 0;
						for (i = 11; i > 1; i--)
							  soma += numeros.charAt(11 - i) * i;
						resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
						if (resultado != digitos.charAt(1))
							  return false;
						return true;
						}
				  else
						return false;
			}



</script>
<body>
<?php include('indexEditar.php'); ?>

<div id="cadatrar">
<form id="cadastro" name="cadastro" method="post" action="editar-usuario-salvar.php" onSubmit="return validaCampo(); return false;">
  <table width="625" border="0">
    <tr>
      <td width="69">Nome:</td>
      <td width="546"><input name="nome" type="text"  value="<?php echo $linha['nome_Usu']; ?>" id="nome" size="60" maxlength="50" />
        <span class="style4">*</span></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><input name="email" type="text"  value="<?php echo $linha['email']; ?>"id="email" size="60" maxlength="50" />
      <span class="style4">*</span></td>
    </tr>
    <tr>
      <td>Sexo:</td>
      <td><input name="sexo" type="radio" value="M"  />
        Masculino 
        <input name="sexo" type="radio"  value="F" />
        Feminino <span class="style4">*</span> </td>
    </tr>
	<tr>
      <td>Data de Nascimento:</td>
      <td><select name="dia" id="dia" >
        <option>Dia</option>
       
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        </select>
      <select name="mes" id="mes">
        <option>Mês</option>
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        </select>
       <select name="ano" id="ano">
        <option>Ano</option>
        <option value="1950">1950</option>
        <option value="1951">1951</option>
        <option value="1952">1952</option>
        <option value="1953">1953</option>
        <option value="1954">1954</option>
        <option value="1955">1955</option>
        <option value="1956">1956</option>
        <option value="1957">1957</option>
        <option value="1958">1958</option>
        <option value="1959">1959</option>
        <option value="1960">1960</option>
        <option value="1961">1961</option>
        <option value="1962">1962</option>
        <option value="1963">1963</option>
        <option value="1964">1964</option>
        <option value="1965">1965</option>
        <option value="1966">1966</option>
        <option value="1967">1967</option>
        <option value="1968">1968</option>
        <option value="1969">1969</option>
        <option value="1970">1970</option>
        <option value="1971">1971</option>
        <option value="1972">1972</option>
        <option value="1973">1973</option>
        <option value="1974">1974</option>
        <option value="1975">1975</option>
        <option value="1976">1976</option>
        <option value="1977">1977</option>
        <option value="1978">1978</option>
        <option value="1979">1979</option>
        <option value="1980">1980</option>
        <option value="1981">1981</option>
        <option value="1982">1982</option>
        <option value="1983">1983</option>
        <option value="1984">1984</option>
        <option value="1985">1985</option>
        <option value="1986">1986</option>
        <option value="1987">1987</option>
        <option value="1988">1988</option>
        <option value="1989">1989</option>
        <option value="1990">1990</option>
        <option value="1991">1991</option>
        <option value="1992">1992</option>
        <option value="1993">1993</option>
        <option value="1994">1994</option>
        <option value="1995">1995</option>
        <option value="1996">1996</option>
        <option value="1997">1997</option>
        <option value="1998">1998</option>
        <option value="1999">1999</option>
        <option value="2000">2000</option>
        <option value="2001">2001</option>
        <option value="2002">2002</option>
        </select>
      <span class="style4">*</span>
      <span class="style1">Data atual:</span> <span class="style3"><?php echo date('d/m/Y', strtotime($linha['data_nasc'])); ?></span></td>
    </tr>
    <tr>
       <td>CPF:</td>
       <td>  <input name="cpf" type="text" id="cpf" maxlength="11" value="<?php echo $linha['cpf']; ?>"  onblur="valida()" /> 
       <span class="style3">Apenas numeros</span><span class="style4">*</span> </td>
    </tr>
    <tr>
       <td>Telefone:</td>
       <td><input name="telefone" type="text" id="telefone"  value="<?php echo $linha['telefone']; ?>" />
        <span class="style3">Apenas numeros com DDD</span> </td>
    </tr>
    <tr>
      <td>Endereço:</td>
      <td><input name="endereco" type="text" id="endereco"  value="<?php echo $linha['end']; ?>" size="60" maxlength="50" />
        <span class="style4">*</span></td>
    </tr>
    <tr>
      <td>Cidade:</td>
      <td><input name="cidade" type="text" id="cidade" maxlength="20" />
        <span class="style4">*</span></td>
    </tr>
    <tr>
      <td>Estado:</td>
      <td><select name="uf" id="uf" >
        <option>Selecione...</option>
        <option value="01">AC</option>
        <option value="02">AL</option>
        <option value="03">AM</option>
        <option value="04">AP</option>
        <option value="05">BA</option>
        <option value="06">CE</option>
        <option value="07">DF</option>
        <option value="08">ES</option>
        <option value="09">GO</option>
        <option value="10">MA</option>
        <option value="11">MG</option>
        <option value="12">MS</option>
        <option value="13">MT</option>
        <option value="14">PA</option>
        <option value="15">PB</option>
        <option value="16">PE</option>
        <option value="17">PI</option>
        <option value="18">PR</option>
        <option value="19">RJ</option>
        <option value="20">RN</option>
        <option value="21">RO</option>
        <option value="22">RR</option>
        <option value="23">RS</option>
        <option value="24">SC</option>
        <option value="25">SE</option>
        <option value="26">SP</option>
        <option value="27">TO</option>
          </select>
        <span class="style4">*</span></td>
    </tr>
    <tr>
      <td>Bairro:</td>
      <td><input name="bairro" type="text" id="bairro"  value="<?php echo $linha['bairro']; ?>" maxlength="20" />
        <span class="style4">*</span></td>
    </tr>
    <tr>
      <td>CEP:</td>
      <td><input name="cep" type="text" id="cep"  value="<?php echo $linha['cep']; ?>" maxlength="20" />
        <span class="style4">*</span></td>
    </tr> 
    <tr>
    	<td>Login:</td>
        <td><input name = "login" type="text" id="login"  value="<?php echo $linha['login']; ?>" maxlength="14" />
   		<span class="style4">*</span></td>
   	</tr>
  
    <tr>
      <td>Senha:</td>
      <td><input name="senha" type="password" id="senha" maxlength="12" />
          <span class="style4">*</span></td>
    </tr>
    
    <tr>
      <td colspan="2"><p>
        <input name="cadastrar" type="submit" id="cadastrar" value="Concluir Cadastro"  /> 
        <input name="limpar" type="reset" id="limpar" value="Limpar Campos " />		
        <span class="style1"> Campos com <span class="style4"> * </span> são obrigatórios! </span></p>
        
     </td>
    </tr>
  </table>
 
</form>
    
</div>
  <div id="CadastraEsqueda">
  	<img src="figura.png" alt="Increva-se" />
  </div>
     <div id="fim">
        <p>Desenvolvido por Wesley e  Guilherme.</p>
     </div> 	 
</body>
</html>

</body>
</html>