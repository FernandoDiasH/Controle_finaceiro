<?php 

	if(!isset($_POST['registrar']) || empty($_POST['categoria']))
	{
		header('location:registro_categoria.php?msg=campo_vazio');
	}

	else
	{
		include_once '../../database/categoria.dao.php';

		$dados = $_POST;
		unset($dados['registrar']);

		$result = registrar_categoria($dados['categoria']);

	

		if($result)
		{
			header('location:registro_categoria.php?msg=sucesso');
		}
		else
		{
			header('location:registro_categoria.php?msg=erro_registro');
		}
	}

 ?>