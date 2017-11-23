<?php

	// verifica se o banco existe
	function connection_checker() {
		$connection = mysqli_connect('localhost', 'root', '', 'intranet_escola');
		if ( mysqli_connect_error() ) {
			//echo '<h1> Algo está errado =\ </h1> <p>' . mysqli_connect_error() . '<br/>Verifique o servior MySQL </p>';
			die("Connection failed: " . mysqli_connect_error());
		} else {
			return $connection;
		}

	}

	function getUserType($id){
		$connection = connection_checker();
		$query = "SELECT user_tipo FROM users WHERE user_id = '{$id}'";
		$result = mysqli_query($connection, $query);
		if (mysqli_num_rows($result) > 0){
			return mysqli_fetch_array($result);;
		} else {
			return "erro";
		}
	}

	function getBotoes($id){
		$user_type = getUserType($id)[0];
		$result = [];
		$result[] = '<ul class="botoes">';
		$result[] = '<li><a   href="home.php"><div class="button inicio">Início</div></a></li>';
		$result[] = '<li><a   href="outro.php"><div class="button outro">outro</div></a></li>';
		$result[] = '<li><a   href="outro.php"><div class="button outro">outro</div></a></li>';
		switch ($user_type){
			case "admin":
				$result[] = '<li><a   href="form_cadastrar.php"><div class="button cadastrar">Cadastrar usuário</div></a></li>';
				$result[] = '<li><a   href="list_users.php"><div class="button usuarios">Usuários</div></a></li>';
				break;
			case "professor":
				$result[] = '<li><a   href="#cadastrarAluno"><div class="button cadastrar-aluno">Cadastrar Aluno</div></a></li>';
				$result[] = '<li><a   href="#meuClaendário"><div class="button calendario">Meu calendario</div></a></li>';
				$result[] = '<li><a   href="list_alunos.php"><div class="button meus-alunos">Meus Alunos</div></a></li>';
				break;
			case "aluno":
				$result[] = '<li><a   href="#meuClaendário"><div class="button calendario">Meu calendario</div></a></li>';

				break;
		}
		$result[] = '<li><a   href="arquivos.php"><div class="button arquivos">Arquivos</div></a></li>';
		$result[] = '<li><a   href="ajustes.php"><div class="button ajustes">Ajustes</div></a></li>';
		$result[] = '</ul>';
		return $result;
	}

	function stringAleatoria($length = 8) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	function existeUsuario($user, $email){
		if (mysqli_num_rows(mysqli_query(connection_checker(), "SELECT user_id FROM users WHERE username = '{$user}' AND email = '{$email}'")) > 0){
			return 3;
		}
		if (mysqli_num_rows(mysqli_query(connection_checker(), "SELECT user_id FROM users WHERE email = '{$email}'")) > 0){
			return 2;
		}
		if (mysqli_num_rows(mysqli_query(connection_checker(), "SELECT user_id FROM users WHERE username = '{$user}'")) > 0){
			return 1;
		}
		return 0;
	}

?>
