<?php
require_once 'Conta.class.php';

class ContaTest extends PHPUnit_Framework_TestCase
{
	/**
	* @comments testa o método setAgencia como entrada 0470-9 com saida esperada true
	*/
	public function testsetAgencia(){
		$conta = new Conta();
		$this->assertEquals(true, $conta->setAgencia('0470-9'));
	}

	/**
	* @comments testa o método setAgencia como entrada aaaa com saída esperada false
	*/
	public function testsetAgencia2(){		
		$conta = new Conta();
		$this->assertEquals(false, $conta->setAgencia('aaaa'));
	}

	/**
	* @comments teste o método setAgencia com a entrada vazia e saída esperada false
	*/
	public function testsetAgencia3(){
		$conta = new Conta();
		$this->assertEquals(false, $conta->setAgencia(''));
	}

	/**
	* @depends testsetAgencia
	* @depends testsetAgencia2
	* @depends testsetAgencia3
	* @comments teste do método getAgencia setando o valor 0470-9 e esperando a saída string
	*/
	public function testgetAgencia(){
		$conta = new Conta();
		$conta->setAgencia('0470-9');
		$this->assertInternalType('string', $conta->getAgencia());
	}

	/**
	* @depends testsetAgencia
	* @depends testsetAgencia2
	* @depends testsetAgencia3
	*/
	public function testgetAgencia2(){
		$conta = new Conta();
		$conta->setAgencia('04709');
		$this->assertEquals(null, $conta->getAgencia());
	}

	public function testsetCodigo(){
		$conta = new Conta();	 	
		$this->assertEquals(true, $conta->setCodigo(234));
	}

	public function testsetCodigo2(){
		$conta = new Conta();
		$this->assertEquals(false, $conta->setCodigo('ald3'));	
	}

	/**
	* @depends testsetCodigo
	* @depends testsetCodigo2
	*/
	public function testgetCodigo(){
		$conta = new Conta();
		$conta->setCodigo(234);
		$this->assertInternalType('integer', $conta->getCodigo());
	}

	/**
	* @depends testsetCodigo
	* @depends testsetCodigo2
	*/
	public function testgetCodigo2(){
		$conta = new Conta();
		$conta->setCodigo('ee234');
		$this->assertEquals(null, $conta->getCodigo());
	}

	public function testsetDataDeCriacao(){
		$conta = new Conta();
		$this->assertEquals(true, $conta->setDataDeCriacao('01/10/2012'));
	}

	public function testsetDataDeCriacao2(){
		$conta = new Conta();
		$this->assertEquals(false, $conta->setDataDeCriacao('041\/10/2012'));
	}

	/**
	* @depends testsetDataDeCriacao
	* @depends testsetDataDeCriacao2
	*/
	public function testgetDataDeCriacao(){
		$conta = new Conta();
		$conta->setDataDeCriacao('01/10/2012');
		$this->assertInternalType('string', $conta->getDataDeCriacao());
	}

	/**
	* @depends testsetDataDeCriacao
	* @depends testsetDataDeCriacao2
	*/
	public function testgetDataDeCriacao2(){
		$conta = new Conta();
		$conta->setDataDeCriacao('01/10//aa/2012');
		$this->assertEquals(null, $conta->getDataDeCriacao());
	}

	public function testsetTitular(){
		$conta = new Conta();
		$this->assertEquals(true, $conta->setTitular('Nome Titular'));
	}

	public function testsetTitular2(){
		$conta = new Conta();
		$this->assertEquals(false, $conta->setTitular('3Nome Titular'));
	}

	public function testsetTitular3(){
		$conta = new Conta();
		$this->assertEquals(false, $conta->setTitular('Nome Titular.'));
	}

	/**
	* @depends testsetTitular
	* @depends testsetTitular2
	* @depends testsetTitular3
	*/
	public function testgetTitular(){
		$conta = new Conta();
		$conta->setTitular('Nome Titular');
		$this->assertInternalType('string', $conta->getTitular());
	}

	/**
	* @depends testsetTitular
	* @depends testsetTitular2
	* @depends testsetTitular3
	*/
	public function testgetTitular2(){
		$conta = new Conta();
		$conta->setTitular('Nome Titular.');
		$this->assertEquals(null, $conta->getTitular());
	}

	/**
	* @depends testsetTitular
	* @depends testsetTitular2
	* @depends testsetTitular3
	*/
	public function testgetTitular3(){
		$conta = new Conta();
		$conta->setTitular('3Nome Titular');
		$this->assertEquals(null, $conta->getTitular());
	}

	public function testsetSenha(){
		$conta = new Conta();
		$this->assertEquals(true, $conta->setSenha('master23.'));
	}

	public function testsetSenha2(){
		$conta = new Conta();
		$this->assertEquals(false, $conta->setSenha('master'));
	}

	public function testsetSenha3(){
		$conta = new Conta();
		$this->assertEquals(false, $conta->setSenha(null));
	}

	/**
	* @depends testsetSenha
	* @depends testsetSenha2
	* @depends testsetSenha3
	*/
	public function testgetSenha(){
		$conta = new Conta();
		$conta->setSenha('master231');
		$this->assertInternalType('string', $conta->getSenha());
	}

	/**
	* @depends testsetSenha
	* @depends testsetSenha2
	* @depends testsetSenha3
	*/
	public function testgetSenha2(){
		$conta = new Conta();
		$conta->setSenha('master');
		$this->assertEquals(false, $conta->getSenha());
	}

	/**
	* @depends testsetSenha
	* @depends testsetSenha2
	* @depends testsetSenha3
	*/
	public function testgetSenha3(){
		$conta = new Conta();
		$conta->setSenha('');
		$this->assertEquals(false, $conta->getSenha());
	}

	public function testsetSaldo(){
		$conta = new Conta();
		$this->assertEquals(true, $conta->setSaldo(4));
	}

	public function testsetSaldo2(){
		$conta = new Conta();
		$this->assertEquals(true, $conta->setSaldo(33.22));
	}

	public function testsetSaldo3(){
		$conta = new Conta();
		$this->assertEquals(true, $conta->setSaldo(33,22));
	}

	public function testsetSaldo4(){
		$conta = new Conta();
		$this->assertEquals(true, $conta->setSaldo(0));
	}

	public function testsetSaldo5(){
		$conta = new Conta();
		$this->assertEquals(true, $conta->setSaldo(0.));
	}

	public function testsetSaldo6(){
		$conta = new Conta();
		$this->assertEquals(false, $conta->setSaldo('0.l'));
	}

	public function testsetSaldo7(){
		$conta = new Conta();
		$this->assertEquals(false, $conta->setSaldo('la'));
	}

	/**
	* @depends testsetSaldo
	* @depends testsetSaldo2
	* @depends testsetSaldo3
	* @depends testsetSaldo4
	* @depends testsetSaldo5
	* @depends testsetSaldo6
	* @depends testsetSaldo7
	*/
	public function testgetSaldo(){
		$conta = new Conta();
		$conta->setSaldo(4.6);
		$this->assertEquals(null, $conta->getSaldo());
	}

	/**
	* @depends testsetSaldo
	* @depends testsetSaldo2
	* @depends testsetSaldo3
	* @depends testsetSaldo4
	* @depends testsetSaldo5
	* @depends testsetSaldo6
	* @depends testsetSaldo7
	*/
	public function testgetSaldo2(){
		$conta = new Conta();
		$conta->setSaldo(4.01);
		$this->assertInternalType('float', $conta->getSaldo());
	}

    /**
    * @depends testsetSaldo
    * @depends testsetSaldo2
    * @depends testsetSaldo3
    * @depends testsetSaldo4
    * @depends testsetSaldo5
    * @depends testsetSaldo6
    * @depends testsetSaldo7
    */
    public function testgetSaldo3(){
        $conta = new Conta();
        $conta->setSaldo(.01);
        $this->assertEquals(null, $conta->getSaldo());
    }

	public function testsetCancelada(){
		$conta = new Conta();
		$this->assertEquals(true, $conta->setCancelada(true));
	}

    public function testsetCancelada2(){
        $conta = new Conta();
        $this->assertEquals(false, $conta->setCancelada(1));
    }

    public function testsetCancelada3(){
        $conta = new Conta();
        $this->assertEquals(false, $conta->setCancelada('t'));
    }

    public function testsetCancelada4(){
        $conta = new Conta();
        $this->assertEquals(false, $conta->setCancelada(''));
    }

    public function testsetCancelada5(){
        $conta = new Conta();
        $this->assertEquals(true, $conta->setCancelada(false));
    }

	/**
	* @depends testsetCancelada
	* @depends testsetCancelada2
	* @depends testsetCancelada3
	* @depends testsetCancelada4
	* @depends testsetCancelada5
	*/
	public function testgetCancelada(){
		$conta = new Conta();
		$conta->setCancelada('f');
		$this->assertEquals(null, $conta->getCancelada());
	}

	/**
	* @depends testsetCancelada
	* @depends testsetCancelada2
	* @depends testsetCancelada3
	* @depends testsetCancelada4
	* @depends testsetCancelada5
	*/
	public function testgetCancelada2(){
		$conta = new Conta();
		$conta->setCancelada(false);
		$this->assertInternalType('bool', $conta->getCancelada());
	}

	/**
	* @depends testsetCancelada
	* @depends testsetCancelada2
	* @depends testsetCancelada3
	* @depends testsetCancelada4
	* @depends testsetCancelada5
	*/
	public function testgetCancelada3(){
		$conta = new Conta();
		$conta->setCancelada(true);
		$this->assertInternalType('bool', $conta->getCancelada());
	}

	/**
	* @depends testsetSaldo
	* @depends testsetSaldo2
	* @depends testsetSaldo3
	* @depends testsetSaldo4
	* @depends testsetSaldo5
	* @depends testsetSaldo6
	* @depends testsetSaldo7
	*/
	public function testRetirar(){

		$conta = new Conta();
		$conta->setSaldo(5);
		$this->assertEquals(true, $conta->Retirar(1.5));
	}

	/**
	* @depends testsetSaldo
	* @depends testsetSaldo2
	* @depends testsetSaldo3
	* @depends testsetSaldo4
	* @depends testsetSaldo5
	* @depends testsetSaldo6
	* @depends testsetSaldo7
	*/
	public function testRetirar2(){

		$conta = new Conta();
		$conta->setSaldo(5);
		$this->assertEquals(false, $conta->Retirar(-1.3));
	}

	/**
	* @depends testsetSaldo
	* @depends testsetSaldo2
	* @depends testsetSaldo3
	* @depends testsetSaldo4
	* @depends testsetSaldo5
	* @depends testsetSaldo6
	* @depends testsetSaldo7
	*/
	public function testRetirar3(){

		$conta = new Conta();
		$conta->setSaldo(10);
		$this->assertEquals(false, $conta->Retirar(15));
	}

	/**
	* @depends testsetSaldo
	* @depends testsetSaldo2
	* @depends testsetSaldo3
	* @depends testsetSaldo4
	* @depends testsetSaldo5
	* @depends testsetSaldo6
	* @depends testsetSaldo7
	* @depends testRetirar
	* @depends testgetSaldo
	*/
	public function testRetirar4(){

		$conta = new Conta();
		$conta->setSaldo(10);
		$conta->Retirar(5);
		$this->assertEquals(5, $conta->getSaldo());
	}

	/**
	* @depends testsetSaldo
	* @depends testsetSaldo2
	* @depends testsetSaldo3
	* @depends testsetSaldo4
	* @depends testsetSaldo5
	* @depends testsetSaldo6
	* @depends testsetSaldo7
	*/
	public function testDepositar(){

		$conta = new Conta();
		$conta->setSaldo(45.2);
		$this->assertEquals(true, $conta->Depositar(15));
	}

	/**
	* @depends testsetSaldo
	* @depends testsetSaldo2
	* @depends testsetSaldo3
	* @depends testsetSaldo4
	* @depends testsetSaldo5
	* @depends testsetSaldo6
	* @depends testsetSaldo7
	*/
	public function testDepositar2(){

		$conta = new Conta();
		$conta->setSaldo(3.9);
		$this->assertEquals(false, $conta->Depositar(-4.2));
	}

	/**
	* @depends testsetSaldo
	* @depends testsetSaldo2
	* @depends testsetSaldo3
	* @depends testsetSaldo4
	* @depends testsetSaldo5
	* @depends testsetSaldo6
	* @depends testsetSaldo7
	* @depends testDepositar
	* @depends testgetSaldo
	*/
	public function testDepositar3(){

		$conta = new Conta();
		$conta->setSaldo(3.9);
		$conta->Depositar(2.1);
		$this->assertEquals(6, $conta->getSaldo());
	}

}
