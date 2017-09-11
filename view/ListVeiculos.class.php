<?php
date_default_timezone_set("Brazil/East");
require_once "../control/ControlVeiculo.class.php";
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

$controlVeiculo = new ControlVeiculo();
if(isset($_GET['saida'])){
	$id = $_GET['saida'];
	$controlVeiculo->saidaVeiculo($id);
}
$linhas = $controlVeiculo->contaVeiculos();
$registros = 7;
$numPaginas = ceil($linhas/$registros);
$inicio = ($registros*$pagina)-$registros;
$veiculos = $controlVeiculo->listLimit($inicio, $registros);
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
				<td colspan="8" align="center">O senhor é meu pastor e nada me faltará!</td>
			</tfoot>
			<?php foreach($veiculos as $carro){ ?>
			<tr>
				<td><?php echo $carro->id; ?></td>
				<td><?php echo $carro->placa; ?></td>
				<td><?php echo $carro->descricao; ?></td>
				<td><?php echo $carro->entrada; ?></td>
				<td><?php echo $carro->saida; ?></td>
				<td><?php echo $carro->valor; ?></td>
				<td><?php echo "<a href='ListVeiculos.class.php?pagina=$pagina&saida=$carro->id'>Sair</a> "; ?></td>
				<td><button>Editar</button></td>
			</tr>
			<?php } ?>
			
		</table>
		<?php for($i = 1; $i < $numPaginas + 1; $i++) { 
			echo "<a href='ListVeiculos.class.php?pagina=$i'>".$i."</a> "; 
		}  ?>
	</div>

</body>
</html>