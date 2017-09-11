<?php
require '../model/Veiculo.class.php';

class ControlVeiculo {

	private $veiculo;


	public function getFormData($array){

		$this->veiculo = new Veiculo();
		$this->veiculo->setPlaca($array['placa']);
		$this->veiculo->setDescricao($array['descricao']);
		$this->veiculo->setTipo($array['tipo']);
		$this->veiculo->setEntrada(date('Y-m-d-H-i-s'));
	}

	public function setFormData(){
		$this->veiculo->insert();
	}

	public function listAll(){
		$this->veiculo = new Veiculo();
		return $this->veiculo->findAll();
	}

	public function listLimit($inicio, $fim){
		$this->veiculo = new Veiculo();
		return $this->veiculo->findLimit($inicio, $fim);
	}

	public function contaVeiculos(){
		return count($this->listAll());
	}

	public function saidaVeiculo($id){
		$this->veiculo = new Veiculo();
		$this->veiculo->setSaida(date('Y-m-d-H-i-s'));
		$this->veiculo->update($id);
	}
}



?>