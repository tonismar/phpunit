<?php
class Conta
{
	var $Agencia;
	var $Codigo;
	var $DataDeCriacao;
	var $Titular;
	var $Senha;
	var $Saldo;
	var $Cancelada;

	function setAgencia($agencia){
		if ( preg_match("/^([a-zA-Z0-9])+-([a-zA-Z0-9])$/", $agencia) ){
			$this->Agencia = $agencia;
			return true;
		}
		return false;
	}

	function getAgencia(){
		return $this->Agencia;
	}

	function setCodigo($codigo){
		if ( preg_match("/^([0-9])+$/", $codigo) ){
			$this->Codigo = $codigo;
			return true;
		}
		return false;
	}

	function getCodigo(){
		return $this->Codigo;
	}

	function setDataDeCriacao($data){
		if ( preg_match("/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/", $data) ){
			$this->DataDeCriacao = $data;
			return true;
		}
		return false;
	}

	function getDataDeCriacao(){
		return $this->DataDeCriacao;
	}

	function setTitular($titular){
		if ( preg_match("/^([A-Z])([a-zA-Z .])+([a-z])$/", $titular) ){
			$this->Titular = $titular;
			return true;
		}
		return false;
	}

	function getTitular(){
		return $this->Titular;
	}

	function setSenha($senha){
		if ( strlen($senha) > 8 ){
			$this->Senha = $senha;
			return true;
		}
		return false;
	}

	function getSenha(){
		return $this->Senha;
	}

	function setSaldo($saldo){
		if ( preg_match("/^([0-9])+(\.([0-9]){2})?$/", $saldo) ){
			$this->Saldo = $saldo;
			return true;
		}
		return false;
	}

	function getSaldo(){
		return $this->Saldo;
	}

	function setCancelada($cancelada){
		return $this->Cancelada = $cancelada;
	}

	function getCancelada(){
		return $this->Cancelada;
	}

	function Retirar($quantia){

		if(( $quantia > 0) && ( $quantia < $this->Saldo )){
			return $this->Saldo -= $quantia;
		}

		return false;
	}

	function Depositar($quantia){

		if( $quantia > 0 ){
			return $this->Saldo += $quantia;
		}

		return false;
	}
}

?>
