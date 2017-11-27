<?php include('header.php'); ?>
<div class="main login-front">
<div class="welcome-login">
	<h1> Bem Vindo! </h1>
	<p> Faça login para acessar seus arquivos </p>
</div>
	<div class="form-group-login">
		<form role="form-inline" action="request_login.php" method="POST">
			<label for="username">Usuário:</label>
			<input type="text" name="username" class="form-input" id="name" autofocus required />
			<label for="email">Senha:</label>
			<input type="password" name="password" class="form-input" id="password" required />
			<button type="submit" class="form-submit" name="entrar">Login</button>
		</form>
	</div>
</div>
<?php include('footer.php'); ?>
