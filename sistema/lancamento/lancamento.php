<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lançamento</title>
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body>
	<h1>Lançamento de Contas</h1>

	<p>
		<a href="../../index.php">Home</a>
	</p>

	<form method="post"	action="lancar.php">
		
		<p>
		<label>Data:</label><br>
		<input type="date" name="data">
		</p>

		<p>
		<label>Descriçao</label><br>
		<input type="text" name="desc">
		</p>

		<p>	
		<label>Categoria</label><br>
		<select name="categoria">
		<!-- buscar as categorias do banco de dados -->
		<?php include_once '../../database/categoria.dao.php'; echo listar_categoria(); ?>
		
		</select>
		
		<button><a href="../categoria/registro_categoria.php">add categoria</a></button>

		</p>

		<p>
		<label>Valor</label><br>
		<input type="number" name="valor" min="0" step="0.01">
		</p>

		<p>
		<label>Tipo:</label><br>
		<select name="tipo">
			<option value="Entrada" >Entrada</option>
			<option value="Saida">Saida</option>
			<option value="Crédito">Lancamento Crédito</option>
		</select>
		</p>

		<p>
			<button type="submit" name="enviar">Lançar</button>
			<button type="reset">Limpar</button>
		</p>


	</form>

	<h1>Lançamentos Registrado</h1>

	<?php 

	include_once '../../database/lancar.dao.php';

	echo mostrar_lancamento();


	 ?>
	

</body>
</html>