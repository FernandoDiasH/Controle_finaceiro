<?php 
	if(!isset($_GET['id_categoria']))
	{
		header('location:registro_categoria.php?msg=id_invalido');
	}
	else
	{
		include_once '../../database/categoria.dao.php';

		$result = buscar_uma_categoria($_GET['id_categoria']);

		$categoria = mysqli_fetch_assoc($result);

		//var_dump($categoria);
	}
 ?>
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
		<a href="editar_categoria.php">Voltar</a>
	</p>

	<form method="post" action="editado_categoria.php">
		<p>
			<label>Categoria:</label><br>
			<input type="text" name="categoria" maxlength="40" value="<?= $categoria['categoria'];?>">
		</p>

		<input type="hidden" name="id" value="<?= $categoria['id'];?>">

		<p>
			<button type="submit" name="alterar">Alterar</button>
		</p>
	</form>
</body>
</html>

