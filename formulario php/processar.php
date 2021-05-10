<?php
include "conexao.php";
	foreach ($_POST as $key => $value){
		if (empty($value)){
	        header("location:atv_1.php?erro=CAMPO ".$key." EM BRANCO");
	        die();
	    }
	}
	$nome = $_POST['nome'];
		$cpf= $_POST['cpf'];
		$data = $_POST['data'];
		$arraydata = explode("/","$data");
		$arraydata[0];
		$arraydata[1];
		$arraydata[2];
		$data_mysql = $arraydata[2]."-".$arraydata[1]."-".$arraydata[0];
		$endereco = $_POST['endereco'];
		$estado = $_POST['estado'];
		$sexo = $_POST['opcao'];
		$senha = $_POST['senha'];
	
	$consulta = mysqli_query($link,"select * from banco_dados where cpf = '{$cpf}'");
	if(mysqli_fetch_array($consulta) != "") {
		header("location:atv_1.php?cpf_erro=ESTE NUMERO DE cpf JA EXISTE EM NOSSO BANCO DE DADOS");
		die();
	}

	mysqli_query($link,"insert into banco_dados(nome,cpf,data_nasc,endereco,estado,sexo,senha)
	values('$nome','$cpf','$data_mysql','$endereco','$estado','$sexo','$senha')");
	header("location:atv_1.php?bd=INFORMAÇOES ENVIADAS AO BANCO DE DADOS");
	die();
?>