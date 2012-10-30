<?php

include 'protege.php'; 
include('conecta.php');

$id = $_SESSION['id_Usu'];		


$sql = 'DELETE FROM usuario
	WHERE id_Usu = ' . $id;
	$resultado = mysql_query($sql);
	

	

	if($resultado === true) {
		?>
		<script type="text/javascript">
		alert('SEUS DADOS FORAM DELETADOS.');
		window.location = 'home2.php';
		</script>
		<?php
	}
	else {
		echo "SEU COMANDO FALHOU";
	}

	?>