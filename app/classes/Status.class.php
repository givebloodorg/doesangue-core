<?php

namespace DoeSangue\Status; 
/**
* @author José Cage
* @package DoeSangue
* @version 0.0.1
* @link http://mentedigital.me
* @license MIT
*
* @todo: implementar função de pegar a última data da atualização e gravar no histórico
*/
class Status{
	private $titulo;
	private $autor_id;
	private $conteudo;
	private $status_imagem;
	private $data_entrada;

	
	// Função __construct()
	function __construct(){}

 	// Setar dados das variaveis
	public function __set($propriedade, $valor){
		$this->$propriedade = $valor;
	}

 	// Pegar os dados das variaveis
	public function __get($propriedade){
		return $this->$propriedade;
	}

 	// Função criar novo post
	public function novostatus(){
		$sql = "INSERT INTO status(titulo, autor_id, conteudo, status_imagem, data_entrada) VALUES(?, ?, ?, ?, current_timestamp())";
		$preparar = BD::conn()->prepare($sql);
		$verifica = array($this->titulo, $this->autor_id, $this->conteudo, $this->status_imagem);
		return $preparar->execute($verifica);
	}

 	// Função editar status
	public function updateStatus(){
		$sql = "UPDATE status SET titulo =?, conteudo =? WHERE id =?";
		$preparar = BD::conn()->prepare($sql);
		$verifica = array($this->titulo, $this->conteudo);
	}
}

?>