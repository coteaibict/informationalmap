
<html>
	<head>
	</head>
	<body>
		<form action="php/Login.php" method="POST">
		 <!--  <div class="imgcontainer">
		    <img src="img_avatar2.png" alt="Avatar" class="avatar">
		  </div>
 -->
		  <div class="container">
		    <label><b>Usuário</b></label>
		    <input type="text" placeholder="Usuario" name="usr" required>

		    <label><b>Senha</b></label>
		    <input type="password" placeholder="Senha" name="psw" required>

		    <button type="submit">Entrar</button>
		  </div>

		  <div class="container" style="background-color:#f1f1f1">
		    <button type="button" class="cancelbtn">Cancel</button>
		    <span class="psw"><a href="#">esqueci a senha</a></span>
		  </div>
		</form>
	</body>
</html>