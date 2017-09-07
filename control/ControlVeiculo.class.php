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
		$this->veiculo->findAll();
	}
}



?>