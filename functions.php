<?php

	// verifica se o banco existe
	function connection_checker() {
		$connection = mysqli_connect('localhost', 'root', '', 'intranet_escola');
		if ( mysqli_connect_error() ) {
			echo '<h1> Algo está errado =\ </h1> <p>' . mysqli_connect_error() . '<br/>Verifique o servior MySQL </p>';
			return false;
		} else {
			return $connection;
		}

	}

	//busca o tipo de usuário
	function getUserType($id){
		$connection = connection_checker();
		$query = "SELECT user_tipo FROM users WHERE user_id = '". $id ."'";
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
				$result[] = '<li><a   href="form_cadastrar_professor.php"><div class="button cadastrar-professor">Cadastrar Professor</div></a></li>';
				$result[] = '<li><a   href="form_cadastrar_aluno.php"><div class="button cadastrar-aluno">Cadastrar Aluno</div></a></li>';
				break;
			case "professor":
				$result[] = '<li><a   href="form_cadastrar_aluno.php"><div class="button cadastrar-aluno">Cadastrar Aluno</div></a></li>';
				$result[] = '<li><a   href="calendario.php"><div class="button calendario">Meu calendario</div></a></li>';
				break;
			case "aluno":
				$result[] = '<li><a   href="calendario.php"><div class="button calendario">Meu calendario</div></a></li>';
				break;
		}
		$result[] = '</ul>';
		return $result;
	}

?>
