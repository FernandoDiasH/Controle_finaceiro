<?php 

	include_once 'lancar.dao.php';


	$result = mysqli_fetch_assoc(buscar_lancamento());

	//print_r($result);



	var_dump($result);




 ?>