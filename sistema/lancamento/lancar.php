 <?php 	

 	if(!isset($_POST['enviar']) || empty($_POST['data']) || empty($_POST['desc']) 
 		|| empty($_POST['tipo']) || empty($_POST['valor']) || empty($_POST['categoria']))
 	{
 		header('location:lancamento.php?msg=campo_vazio');
 	}

 	else
 	{
 		include_once '../../database/lancar.dao.php';

 		$dados = $_POST;
 		unset($dados['enviar']);

        $result = lancar($dados['data'], $dados['desc'], $dados['valor'], $dados['categoria'], $dados['tipo']);

        if($result)
        {
            header('location:lancamento.php?msg=lancamento_sucesso');

        }
        else
        {
            header('location:lancamento.php?msg=lancamento_erro');   
        }


 	}



  ?>