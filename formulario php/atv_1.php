<!DOCTYPE html>
<html>
	<head>
		<title>formulario</title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
	<body>
		<header>
			<marquee>GUSTAVO XAVIER: FIC PWE VTC(VITORIA DA CONQUISTA)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GUSTAVO XAVIER: FIC PWE VTC(VITORIA DA CONQUISTA)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GUSTAVO XAVIER: FIC PWE VTC(VITORIA DA CONQUISTA)</marquee>
			<center><h1>ACESSE O BANCO DE DADOS</h1></center>
		</header>
		<div>
			<form action="processar.php" method="POST">
				<center><hr>
					<input type="text"name="nome" placeholder=" * NOME"><hr>
					<input type="text" name="cpf" placeholder=" * CPF" maxlength="14"><hr>
					<input type="data" name="data" placeholder=" * DATA DE NASCIMENTO, DIGITE AS '[ / ]'" maxlength="10"><hr>
					<input type="text" name="endereco" placeholder=" * ENDEREÇO"><hr>
					<input type="tex" name="estado" placeholder=" * UF" maxlength="2"><hr>
					<select name="opcao" >
						<option name="opcao" value="MASCULINO">MASCULINO</option>
						<option name="opcao" value="FEMININO">FEMININO</option>
						<option name="opcao" value="OUTRO">OUTRO</option>
					</select><hr>
					<input type="password"name="senha" placeholder=" * DIGITE UMA SENHA" maxlength="15"><hr>
					<button type="submit"value="enviar">ENVIAR</button>
				</center>
			</form>
		</div>
		<div class="erro">
		<?php
			include "conexao.php";
				if(empty($_GET['erro'])){
				}
				else{
					print $_GET['erro'];
				}
		?>
		</div>
		<div class="erro_2">
		<?php
			if(empty($_GET['bd'])){
			}
			else{
				print $_GET['bd'];
			}
			if (empty($_GET['cpf_erro'])) {
			}
			else{
				print $_GET['cpf_erro'];
			}
		?>
		</div>
			<?php
			if (isset($_GET['bd'])) {
				$leitor = mysqli_query($link,"select * from banco_dados");
				while ($dados = mysqli_fetch_array($leitor)) {
					$id_client = $dados['id_cliente'];
					$nome = $dados['nome'];
					$cpf = $dados['cpf'];
					$data_nasc = $dados['data_nasc'];
					$endereco = $dados['endereco'];
					$estado = $dados['estado'];
					$sexo = $dados['sexo'];
					$senha = $dados['senha'];
					print "<table border= '1.5';>";
						print "<tr>";
							print "<th> NUMERO DE IDENTIFICAÇAO: ".$id_client."</th>";
							print "<th> NOME: ".$nome."</th>";
							print "<th> CPF: ".$cpf."</th>";
							print "<th> DATA DE NASCIMENTO: ".$data_nasc."</th>";
							print "<th> ENDEREÇO: ".$endereco."</th>";
							print "<th> UF: ".$estado."</th>";
							print "<th> SEXO: ".$sexo."</th>";
							print "<th> SENHA: ".$senha."</th>";
						print "</tr>";
					print "</table>";
				}			
			}			
			?>
	</body>
</html>