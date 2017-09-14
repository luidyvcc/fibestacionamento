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
	private $status;

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

	public function setValor($valor){
		$this->valor = $valor;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	
	public function insert(){
		$sql = 'INSERT INTO '.$this->table. ' (placa, descricao, tipo, entrada, status) VALUES (:placa, :descricao, :tipo, :entrada, :status)';
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':placa', $this->placa);
		$stmt->bindParam(':descricao', $this->descricao);
		$stmt->bindParam(':tipo', $this->tipo);
		$stmt->bindParam(':entrada', $this->entrada);
		$stmt->bindParam(':status', $this->status);
		return $stmt->execute();
	}

	public function update($id){
		$sql = 'UPDATE ' . $this->table . ' SET saida = :saida, valor = :valor, status = :status WHERE id = :id';
		//$sql = 'UPDATE ' . $this->table . ' SET saida = :saida, valor = :valor WHERE id = :id';
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':saida', $this->saida);
		$stmt->bindParam(':valor', $this->valor);
		$stmt->bindParam(':status', $this->status);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}

	public function findLimit($inicio, $fim, $status, $ordem){
		$sql = 'SELECT * FROM ' .$this->table. ' WHERE status = :status ORDER BY ' .$ordem. ' LIMIT :inicio, :fim';
		//$sql = 'SELECT * FROM ' .$this->table. ' ORDER BY entrada desc LIMIT :inicio, :fim';
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':inicio', $inicio, PDO::PARAM_INT);
		$stmt->bindParam(':fim', $fim, PDO::PARAM_INT);
		$stmt->bindParam(':status', $status, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function findAllStatus($status){
		$sql = 'SELECT * FROM ' .$this->table. ' WHERE status = :status';
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':status', $status, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function retornaSaida($id){
		$sql = 'UPDATE ' . $this->table . ' SET saida = :saida, valor = :valor WHERE id = :id';
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':saida', $this->saida);
		$stmt->bindParam(':valor', $this->valor);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}
}
?>