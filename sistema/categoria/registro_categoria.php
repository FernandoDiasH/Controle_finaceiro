<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lançar categoria</title>
</head>
<body>

	<h1>Registro de categoria</h1>

	<p>
		<a href="../lancamento/lancamento.php">Lançamento</a>
	</p>

	<form method="post" action="registrar_categoria.php">
		<p>
			<label>Categoria:</label><br>
			<input type="text" name="categoria" maxlength="40">
		</p>

		<p>
			<button type="submit" name="registrar">Registrar</button>
		</p>
	</form>

	<h1>Categorias Lançadas</h1>

	<?php 	
		include_once '../../database/categoria.dao.php';

		echo mostrar_categorias();



	 ?>

</body>
</html>