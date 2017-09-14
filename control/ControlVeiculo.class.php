<?php
require '../model/Veiculo.class.php';

class ControlVeiculo {

	private $veiculo;
	private $registros = 5;


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

	public function listAll($status){
		$this->veiculo = new Veiculo();
		return $this->veiculo->findAllStatus($status);
	}

	public function listLimit($pagina, $status, $ordem){
		$inicio = ($this->registros*$pagina)-$this->registros;
		$this->veiculo = new Veiculo();
		return $this->veiculo->findLimit($inicio, $this->registros, $status, $ordem);
	}

	public function contaVeiculos($status){

		$linhas = count($this->listAll($status));
		$paginas = ceil($linhas/$this->registros);
		return $paginas;
	}

	public function saidaVeiculo($id){
		$this->veiculo = new Veiculo();
		$veiculo = $this->veiculo->find($id);
		$dados = [];
		if ($veiculo->saida == NULL) {
			$this->veiculo->setSaida(date('Y-m-d-H-i-s'));
			$this->veiculo->setStatus(2);
			$this->veiculo->update($id);
			$veiculo = $this->veiculo->find($id);
			$data1 = new DateTime($veiculo->entrada);
			$data2 = new DateTime($veiculo->saida);
			$intervalo = $data1->diff( $data2 );
			$valor = (500 * $intervalo->m)+(50 * $intervalo->d)+(3 * $intervalo->h) + (0.07 * $intervalo->i);
			$this->veiculo->setValor($valor);
			$this->veiculo->update($id);
			$dados['mes'] = $intervalo->m;
			$dados['dia'] = $intervalo->d;
			$dados['hora'] = $intervalo->h;
			$dados['minuto'] = $intervalo->i;
			$dados['placa'] = $veiculo->placa;
			$dados['valor'] = $valor;
		}else{
			$veiculo = $this->veiculo->find($id);
			$data1 = new DateTime($veiculo->entrada);
			$data2 = new DateTime($veiculo->saida);
			$intervalo = $data1->diff( $data2 );
			$dados['erro'] = "Cliente já foi contabilizado!";
			$dados['mes'] = $intervalo->m;
			$dados['dia'] = $intervalo->d;
			$dados['hora'] = $intervalo->h;
			$dados['minuto'] = $intervalo->i;
			$dados['placa'] = $veiculo->placa;
			$dados['valor'] = $veiculo->valor;
		}

		return $dados;
	}

	public function erroSaida($id){
		$this->veiculo = new Veiculo();
		$veiculo = $this->veiculo->find($id);
		if ($veiculo->saida == NULL) {
			$dados['erro'] = "Cliente não saiu!";
		}else{
			$this->veiculo->setSaida(NULL);
			$this->veiculo->setValor(NULL);
			$this->veiculo->setStatus(1);
			$this->veiculo->update($id);
			$dados['erro'] = "Carro {$veiculo->placa} Retornado";
		}
		return $dados;
	}
}



?>