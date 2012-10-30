<?php
session_start();
if( !isset($_SESSION['logado']) ){
	header('location:home2.php');
	exit;
}
?>