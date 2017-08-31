<?php
date_default_timezone_set("Brazil/East");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require_once "../control/ControlVeiculo.class.php";
}
?>
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
		<label>Descricao</label>
		<input type="text" name="descricao">
		<br>
		<label>Tipo</label>
		<input type="text" name="tipo">
		<br>
		<input type="submit" name="btnGravar">
		<br>
	</form>
</body>
</html>


