<?php
date_default_timezone_set("Brazil/East");
require_once "../control/ControlVeiculo.class.php";
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
$pagina2 = (isset($_GET['pagina2']))? $_GET['pagina2'] : 1;
$dados = [];
$controlVeiculo = new ControlVeiculo();
if(isset($_GET['saida'])){
	$id = $_GET['saida'];
	$dados = $controlVeiculo->saidaVeiculo($id);
}
if(isset($_GET['ret'])){
	$id = $_GET['ret'];
	$dados = $controlVeiculo->erroSaida($id);
}
$numPaginas1 = $controlVeiculo->numPaginas(1);
$numVeiculos1 = $controlVeiculo->contaVeiculos(1);
$veiculos1 = $controlVeiculo->listLimit($pagina,1, 1);
$numPaginas2 = $controlVeiculo->numPaginas(2);
$numVeiculos2 = $controlVeiculo->contaVeiculos(2);
$veiculos2 = $controlVeiculo->listLimit($pagina2,2,2);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">TÃO - <span class="badge"><?php echo $numVeiculos1; ?></span> - VEÍCULOS</h3>
					</div>
					<div class="panel-body">
						<table class="table table-condensed table-responsive table-striped">
							<thead>
								<th>ID</th>
								<th>PLACA</th>
								<th>DESCRIÇÃO</th>
								<th>ENTRADA</th>
								<th>SAÍDA</th>
								<th>VALOR</th>
								<th>AÇÕES</th>
							</thead>
							<?php foreach($veiculos1 as $carro){ ?>
							<tr>
								<td><?php echo $carro->id; ?></td>
								<td><?php echo $carro->placa; ?></td>
								<td><?php echo $carro->descricao; ?></td>
								<td><?php echo date('d/m/Y H:i', strtotime($carro->entrada)); ?></td>
								<td><?php echo ($carro->saida) ? date('d/m/Y H:i', strtotime($carro->saida)) : ""; ?></td>
								<td><?php echo $carro->valor; ?></td>
								<td><?php echo "<a href='ListVeiculos.class.php?pagina=$pagina&pagina2=$pagina2&saida=$carro->id'><button>SAINU</button></a> ";?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-sm">
						<?php for($i = 1; $i < $numPaginas1 + 1; $i++) {?>
						<li class="page-item"><a class="page-link" href="ListVeiculos.class.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
						<?php } ?>
					</ul>
				</nav>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">NÃO TÃO - <span class="badge"><?php echo $numVeiculos2; ?></span> - VEÍCULOS</h3>
					</div>
					<div class="panel-body">
						<table class="table table-condensed table-responsive table-striped">
							<thead>
								<th>ID</th>
								<th>PLACA</th>
								<th>DESCRIÇÃO</th>
								<th>ENTRADA</th>
								<th>SAÍDA</th>
								<th>VALOR</th>
								<th>AÇÕES</th>
							</thead>
							<?php foreach($veiculos2 as $carro2){ ?>
							<tr>
								<td><?php echo $carro2->id; ?></td>
								<td><?php echo $carro2->placa; ?></td>
								<td><?php echo $carro2->descricao; ?></td>
								<td><?php echo date('d/m/Y H:i', strtotime($carro2->entrada)); ?></td>
								<td><?php echo ($carro2->saida) ? date('d/m/Y H:i', strtotime($carro2->saida)) : ""; ?></td>
								<td><?php echo $carro2->valor; ?></td>
								<td><?php echo "<a href='ListVeiculos.class.php?pagina=$pagina&pagina2=$pagina2&ret=$carro2->id'><button>VOLTA</button></a> ";?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-sm">
						<?php for($i = 1; $i < $numPaginas2 + 1; $i++) {?>
						<li class="page-item"><a class="page-link" href="ListVeiculos.class.php?pagina2=<?php echo $i; ?>"><?php echo $i; ?></a></li>
						<?php } ?>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<?php if (isset($_GET['saida'])) {
		if (array_key_exists('erro', $dados)) {
			echo $dados['erro']."<br>";
			echo "Permanencia: ". $dados['mes'] . "m " . $dados['dia'] . "d ". $dados['hora'] . "h " . $dados['minuto'] . "m<br>";
			echo "Placa: " . $dados['placa'] . "<br>";
			echo "Valor: R$" . $dados['valor'];
		}else{
			echo "Permanencia: ". $dados['mes'] . "m " . $dados['dia'] . "d ". $dados['hora'] . "h " . $dados['minuto'] . "m<br>";
			echo "Placa: " . $dados['placa'] . "<br>";
			echo "Valor: R$" . $dados['valor'];
		}
	}
	if (isset($_GET['ret'])) {
		if (array_key_exists('erro', $dados)) {
			echo $dados['erro']."<br>";
		}
	}
	?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>