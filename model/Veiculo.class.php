<?php
include 'Crud.php';

class Veiculo extends Crud
{
	protected $table = 'veiculos';
	private $placa;
	private $descricao;
	private $tipo;
	private $entrada;
	private $saida;
	private $valor;

	public function getPlaca(){
		return $this->placa;
	}

	public function setPlaca($placa){
		$this->placa = $placa;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getEntrada(){
		return $this->entrada;
	}

	public function setEntrada($entrada){
		$this->entrada = $entrada;
	}

	public function getSaida(){
		return $this->saida;
	}

	public function setSaida($saida){
		$this->saida = $saida;
	}

	public function getValor(){
		return $this->valor;
	}

	
	public function insert(){
		$sql = 'INSERT INTO '.$this->table. ' (placa, descricao, tipo, entrada) VALUES (:placa, :descricao, :tipo, :entrada)';
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':placa', $this->placa);
		$stmt->bindParam(':descricao', $this->descricao);
		$stmt->bindParam(':tipo', $this->tipo);
		$stmt->bindParam(':entrada', $this->entrada);
		return $stmt->execute();
	}

	public function update($id){
		$sql = 'UPDATE ' . $this->table . ' SET placa = :placa WHERE id = :id';
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':placa', $this->placa);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}

	public function findLimit($inicio, $fim){
		$sql = "SELECT * FROM $this->table limit :inicio, :fim";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':inicio', $inicio);
		$stmt->bindParam(':fim', $fim);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}
?>