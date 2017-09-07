<?php
date_default_timezone_set("Brazil/East");
require_once "../control/ControlVeiculo.class.php";
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
$controlVeiculo = new ControlVeiculo();
$veiculos = $controlVeiculo->listAll();
$linhas = count($veiculos);
$registros = 2;
$numPaginas = ceil($linhas/$registros);
$inicio = ($registros*$pagina)-$registros; 


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div align="center">
		<table border="1">
			<thead>
				<th>ID</th>
				<th>PLACA</th>
				<th>DESCRIÇÃO</th>
				<th>ENTRADA</th>
				<th>SAÍDA</th>
				<th>VALOR</th>
				<th colspan="2">AÇÕES</th>
			</thead>
			<tfoot>
				<td colspan="8">O senhor é meu pastor e nada me faltará!</td>
			</tfoot>
			<?php foreach($veiculos as $carro){ ?>
			<tr>
				<td><?php echo $carro->id; ?></td>
				<td><?php echo $carro->placa; ?></td>
				<td><?php echo $carro->descricao; ?></td>
				<td><?php echo $carro->entrada; ?></td>
				<td><?php echo $carro->saida; ?></td>
				<td><?php echo $carro->valor; ?></td>
				<td><button>Sair</button></td>
				<td><button>Editar</button></td>
			</tr>
			<?php } ?>
			<?php for($i = 1; $i < $numPaginas + 1; $i++) { 
				echo "<a href='ListVeiculos.class.php?pagina=$i'>".$i."</a> "; 
			}  ?>
		</table>
	</div>
</body>
</html>