<?php 
	
	if(!isset($_GET['id_lancamento']))
	{
		header('location:lancamento.php?msg=id_invalido');	
	}
	else
	{
		include_once '../../database/lancar.dao.php';

		$result = deletar_lancamento($_GET['id_lancamento']);

		if($result)
		{
			header('location:lancamento.php?msg=sucesso_delet');
		}
		else
		{
			header('location:lancamento.php?msg=erro_delet');
		}
	}
	

 ?>