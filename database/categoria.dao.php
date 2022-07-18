<?php 

	include_once 'conn.php';


	//registrar categoria no banco de dados

	function registrar_categoria($categoria)
	{

		$conn = conectar();

		$sql = "INSERT INTO categoria(categoria) VALUES('$categoria')";

		$result = mysqli_query($conn, $sql);

		return $result;
	}

	// buscar uma categoria especifica
	function buscar_uma_categoria($id_categoria)
	{
		$conn = conectar();

		$sql = "SELECT * FROM categoria WHERE id = $id_categoria";

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

	// buscar todas as categorias registradas 

	function buscar_categorias()
	{

		$conn = conectar();

		$sql = "SELECT * FROM categoria";

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

	// mostrar todas as categorias

	function mostrar_categorias()
	{

		$result = buscar_categorias();

		if($result == null)

			return "Problema no SQL";
		else if (!$result)
		{
			return "Nao ha registro";
		}

		else
		{
			$retorno  = '';
			$retorno .= "<table>";

			$retorno .= "<tr>";
			$retorno .= "<th>ID</th>";
			$retorno .= "<th>Categoria</th>";
			$retorno .= "<th>Editar</th>";
			$retorno .= "<th>Deletar</th>";
			$retorno .= "</tr>";


			while($categoria = mysqli_fetch_assoc($result))
			{

				$retorno .= "<tr>";
				$retorno .=	"<td>"		.$categoria['id'] 				."</td>";
				$retorno .= "<td>"		.$categoria['categoria'] 		."</td>";
				$retorno .= "<td>"		.link_editar_categoria($categoria['id']) 		."</td>";
				$retorno .= "<td>"		.link_deletar_categoria($categoria['id']) 		."</td>";
				$retorno .= "</tr>";
			}

			$retorno .= "</table>";

		return $retorno;
		}
	}
	
	// Link para deletar categoria
	function link_deletar_categoria($id_categoria)
	{
		$link = '<a href="deletar_categoria.php?id_categoria='.$id_categoria.'" onclick="return confirm(\'Tem certeza que deseja excluir este jogo?\')">Deletar</a>';
		return $link;
	}

	// link para editar categoria
	function link_editar_categoria($id_categoria)
	{
		$link = '<a href="editar_categoria.php?id_categoria='.$id_categoria.'">Editar</a>';
		return $link;
	}

	// Deletar lancamento
	function deletar_categoria($id_categoria)
	{
		$conn = conectar();

		$sql = "DELETE FROM categoria WHERE id = $id_categoria";

		$result = mysqli_query($conn, $sql);

		if(mysqli_affected_rows($conn) > 0)
		{
			return true;
		}
		
		return false;
	}

	//editar categoria
	function editar_categoria($categoria, $id)
	{
		$conn = conectar();

		$sql = "UPDATE categoria SET categoria = '$categoria' WHERE id = $id ";

		$result = mysqli_query($conn, $sql);

		if(mysqli_affected_rows($conn) > 0)
	    {
	        return true;
	    }
	    return false;
	}



 	// listar categoria em lançamento

 	function listar_categoria()
 	{
 		$result = buscar_categorias();

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
			

			while($categoria = mysqli_fetch_assoc($result))
			{

				$retorno .= '<option value="'	.$categoria['id']	. '">' .$categoria['categoria'] . '</option>';
		
			}
		
		return $retorno;
		}
 	}

 ?>