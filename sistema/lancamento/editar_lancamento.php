<?php 

	if(!isset($_GET['id_lancamento']))
	{
		header('location:lancamento.php?msg=id_invalido');
	}
	else
	{
		include_once '../../database/lancar.dao.php';
		include_once'../../database/categoria.dao.php';

		$result = buscar_um_lancamento($_GET['id_lancamento']);

		$lancamento = mysqli_fetch_assoc($result);

		$result_categoria = buscar_uma_categoria($lancamento['categoria']);

		$categoria = mysqli_fetch_assoc($result_categoria);

		//var_dump($lancamento);
	}
 ?>

 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lançamento</title>
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body>
	<h1> Editar Lançamento de Contas</h1>

	<p>
		<a href="lancamento.php">Lancamento</a>
	</p>

	<form method="post"	action="editado_lancamento.php">

		<p>
		<label>Data:</label><br>
		<input type="date" name="data" value="<?= $lancamento['data']; ?>">
		</p>

		<p>
		<label>Descriçao</label><br>
		<input type="text" name="desc" value="<?= $lancamento['descricao']; ?>">
		</p>

		<p>	
		<label>Categoria</label><br>
		<select name="categoria">
		<!-- buscar as categorias do banco de dados -->
		<option value="<?= $lancamento['categoria']; ?>"><?= $categoria['categoria'];?></option>
		<option disabled>----------------------</option>
		<?php include_once '../../database/categoria.dao.php'; echo listar_categoria(); ?>
		
		</select>
		
		<button><a href="registro_categoria.php">add categoria</a></button>

		</p>

		<p>
		<label>Valor</label><br>
		<input type="number" name="valor" min="0" step="0.01" value="<?= $lancamento['valor']; ?>">
		</p>

		<p>
		<label>Tipo:</label><br>
		<select name="tipo">
			<option value="<?= $lancamento['tipo']; ?>"><?= $lancamento['tipo']; ?></option>
			<option disabled>----------------</option>
			<option value="Entrada" >Entrada</option>
			<option value="Saida">Saida</option>
			<option value="Crédito">Lancamento Crédito</option>
		</select>
		</p>

		<p>
			<button type="submit" name="atualizar">Atualizar</button>
			<button type="reset">Limpar</button>
		</p>

		<input type="hidden" name="id" value="<?= $lancamento['id']; ?>">


	</form>

	

</body>
</html>