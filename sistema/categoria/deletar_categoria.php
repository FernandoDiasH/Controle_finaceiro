<?php 
	
	if(!isset($_GET['id_categoria']))
	{
		header('location:registro_categoria.php?msg=id_invalido');	
	}
	else
	{
		include_once '../../database/categoria.dao.php';

		$result = deletar_categoria($_GET['id_categoria']);

		if($result)
		{
			header('location:registro_categoria.php?msg=sucesso_deletar');
		}
		else
		{
			header('location:registro_categoria.php?msg=erro_deletar');
		}
	}
	

 ?>