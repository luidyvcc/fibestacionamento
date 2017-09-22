<?php
date_default_timezone_set("Brazil/East");
require_once "../control/ControlVeiculo.class.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$controlVeiculo = new ControlVeiculo();
	$controlVeiculo->getFormData($_POST);
	$controlVeiculo->setFormData();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Novo Veiculo</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
		<form action="" method="post">
			<div class="row">
				<div class="col-xs-3 bg-info">
					<div class="form-group">
						<label for="placa">Placa</label>
						<input type="text" class="form-control" id="placa" placeholder="Placa" name="placa">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-3 bg-info">
					<div class="form-group">
						<label for="descricao">Descrição</label>
						<input type="text" class="form-control" id="descricao" placeholder="Descrição" name="descricao">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-3 bg-info">
					<div class="form-group">
						<label for="tipo">Tipo</label>
						<input type="text" class="form-control" id="tipo" placeholder="Tipo" name="tipo">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-3 bg-info">
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-sm form-control" name="btnGravar">Gravar</button>
					</div>
				</div>
			</div>
		</form>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>


