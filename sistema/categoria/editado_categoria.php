<?php 

	if(!isset($_POST['alterar']) || empty($_POST['categoria']) || empty($_POST['id']))
	{
		header('location:registro_categoria.php?msg=campo_vazio');
	}
	else
	{
		include_once '../../database/categoria.dao.php';
		$dados = $_POST;

		unset($dados['alterar']);

		$result = editar_categoria($dados['categoria'], $dados['id']);
		
		if($result)
		{
			header('location:registro_categoria.php?msg=alterado_sucesso');
		}
		else
		{
			header('location:registro_categoria.php?msg=alterado_erro');
		}
		
	}

		
 ?>