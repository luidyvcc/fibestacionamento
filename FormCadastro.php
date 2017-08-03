<!DOCTYPE html>
<html>
<head>
	<title>Novo Veiculo</title>
</head>
<body>
	<form action="" method="post">
		<label>Placa</label>
		<input type="text" name="placa">
		<br>
		<input type="submit" name="btnGravar">
		<br>
		<?php 
		if(isset($_POST['btnGravar']))
		{
			$placa = $_POST['placa'];
			$entrada = date('d-m-Y H:i:s');
			echo "Placa: " . $placa . "<br>" . "Entrada: " . $entrada;

		}
		?>
	</form>
</body>
</html>