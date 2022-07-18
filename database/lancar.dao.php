<?php 

include_once 'conn.php';

// funcao para lancar contas 
function lancar($data, $desc, $valor, $categoria, $tipo)
{

	$conn = conectar();

	$sql = "INSERT INTO lancamento (data, descricao, valor, tipo, categoria) VALUES ('$data', '$desc', $valor , '$tipo', '$categoria')";
	$result = mysqli_query($conn, $sql);

	return $result;
}

// buscar todos os dados
function buscar_lancamento()
{

	$conn = conectar();

	$sql = "SELECT lan.id, lan.data, lan.descricao, lan.categoria as lancate, cate.categoria, lan.valor,lan.tipo
			FROM lancamento as lan INNER JOIN categoria as cate 
			on lan.categoria = cate.id 
			ORDER BY lan.data";

	$result = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0 )
	{
		return $result;
	}
	else if(mysqli_affected_rows($conn) == 0)
	{
		return false;
	}
	else
	{
		return null;
	}

}

//buscar um lancamento especifico
function buscar_um_lancamento($id_lancamento)
{
    $conn = conectar();

    $sql = "SELECT * FROM lancamento WHERE id = $id_lancamento";

    $result = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) 
    {
        return $result;
    }
    else 
    {
        return null;
    }
}



// exbir os todos os lancamentos 
function mostrar_lancamento()
{

	$result = buscar_lancamento();

	if($result == null)
	{
		return "Problema no SQL";
	}
	else if (!$result)
	{
		return "Nao ha registro";
	}
	else
	{
		$retorno = '';
		$retorno .= "<table>";

		$retorno .= "<tr>";
		$retorno .= "<th>ID</th>";
		$retorno .= "<th>Data</th>";
		$retorno .= "<th>Descriçao</th>";
		$retorno .= "<th>ID categoria</th>";	
		$retorno .= "<th>Categoria</th>";
		$retorno .= "<th>Valor</th>";
		$retorno .= "<th>Tipo</th>";
		$retorno .= "<th>Editar</th>";
		$retorno .= "<th>Deletar</th>";
		$retorno .= "</tr>";

		while($lancamento = mysqli_fetch_assoc($result))
		{

			$retorno .= "<tr>";
			$retorno .=	"<td>"	.$lancamento['id'] 										. "</td>";
			$retorno .= "<td>"	.date('d/m/y', strtotime($lancamento['data']))			. "</td>";
			$retorno .= "<td>"	.$lancamento['descricao'] 								. "</td>";
			$retorno .= "<td>"	.$lancamento['lancate'] 								. "</td>";
			$retorno .= "<td>"	.$lancamento['categoria'] 								. "</td>";
			$retorno .= "<td>"	."R\$ ".number_format($lancamento['valor'], 2, "," ,"."). "</td>";
			$retorno .= "<td>"	.$lancamento['tipo'] 									. "</td>";
			$retorno .= "<td>"	.link_editar_lancamento($lancamento['id']) 				. "</td>";
			$retorno .= "<td>"	.link_deletar_lancamento($lancamento['id']) 			. "</td>";

			$retorno .=	"</tr>";
		}

		$retorno .= "</table>";

		return $retorno;
	}
}

// link para deletar lancamentos
function link_deletar_lancamento($id_lancamento)
{
	$link = '<a href="deletar_lancamento.php?id_lancamento='.$id_lancamento.'" onclick="return confirm(\'Tem certeza que deseja excluir este jogo?\')">Deletar</a>';
	return $link;
}

// link para editar lancamentos
function link_editar_lancamento($id_lancamento)
{
	$link = '<a href="editar_lancamento.php?id_lancamento='.$id_lancamento.'">Editar</a>';
	return $link;
}

// Deletar lancamento
function deletar_lancamento($id_lancamento)
{
	$conn = conectar();

	$sql = "DELETE FROM lancamento WHERE id = $id_lancamento";

	$result = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		return true;
	}
	
	return false;
}


//editar lancamento
function editar_lancamento($id_lan, $data, $desc, $categoria, $valor, $tipo)
{
	$conn = conectar();

	$sql = "UPDATE lancamento SET 
			data 		= '$data', 
			descricao 	= '$desc', 
			valor 		= $valor, 
			tipo 		= '$tipo', 
			categoria	= $categoria
			WHERE id = $id_lan";

	$result = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
    {
        return true;
    }
    return false;
}



 ?>


 
