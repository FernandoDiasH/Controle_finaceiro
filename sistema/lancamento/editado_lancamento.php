 <?php 	

 	if(!isset($_POST['atualizar']) || empty($_POST['data']) || empty($_POST['desc']) 
 		|| empty($_POST['tipo']) || empty($_POST['valor']) || empty($_POST['categoria']))
 	{
 		header('location:editar_lancamento.php?msg=campo_vazio');
 	}

 	else
 	{
 		include_once '../../database/lancar.dao.php';

 		$dados = $_POST;
 		unset($dados['atualizar']);
        var_dump($dados);

        $result = editar_lancamento($dados['id'], $dados['data'], $dados['desc'], $dados['categoria'], $dados['valor'], $dados['tipo']);

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