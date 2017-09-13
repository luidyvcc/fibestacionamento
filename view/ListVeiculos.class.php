<?php
date_default_timezone_set("Brazil/East");
require_once "../control/ControlVeiculo.class.php";
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
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
$numPaginas = $controlVeiculo->contaVeiculos();
$veiculos = $controlVeiculo->listLimit($pagina);
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
				<td><?php echo date('d/m/Y H:i', strtotime($carro->entrada)); ?></td>
				<td><?php echo ($carro->saida) ? date('d/m/Y H:i', strtotime($carro->saida)) : ""; ?></td>
				<td><?php echo $carro->valor; ?></td>
				<td><?php echo "<a href='ListVeiculos.class.php?pagina=$pagina&saida=$carro->id'><button>Sair</button></a> ";?></td>
				<td><?php echo "<a href='ListVeiculos.class.php?pagina=$pagina&ret=$carro->id'><button>Retornar</button></a> ";?></td>
			</tr>
			<?php } ?>
			
		</table>
		<?php for($i = 1; $i < $numPaginas + 1; $i++) {
			echo "<a href='ListVeiculos.class.php?pagina=$i'>".$i."</a> ";
		}
		?>
	</div>
	<div align="center">
		<?php if (isset($_GET['saida'])) {
			if (array_key_exists('erro', $dados)) {
				echo "<h1>".$dados['erro']."</h1><br>";
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
				echo "<h1>".$dados['erro']."</h1><br>";
			}
		}

		?>
	</div>

</body>
</html>