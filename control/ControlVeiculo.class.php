<?php
require '../model/Veiculo.class.php';

$p = $_POST;

$veiculo = new Veiculo();

$veiculo->setPlaca($p['placa']);
$veiculo->setDescricao($p['descricao']);
$veiculo->setTipo($p['tipo']);
$veiculo->setEntrada(date('Y-m-d-H-i-s'));
$veiculo->insert();
?>