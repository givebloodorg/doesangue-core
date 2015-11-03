<?php 

namespace DoeSangue\Usuario;
/**
* @author José Cage
* @package DoeSangue
* @version 0.0.1
* @link http://mentedigital.me
* @license MIT
*/
 class User{
 	private $login;
 	private $email;
 	private $password;
 	private $data_cadastro;

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

 	// Função inserir user na tabela
 	public function signup(){
 		$sql = "INSERT INTO users(login, email, password, data_cadastro) VALUES(?, ?, ?, CURRENT_TIMESTAMP())";
 		$prepara = BD::conn()->prepare($sql);
 		 $executa = array($this->login, $this->email, $this->password);
 		 return $prepara->execute($executa);
 	}

 	public function editUser(){
 		$sql = "UPDATE usuarios SET login =?, email =?, password =? WHERE id =?";
 		 $prepara = BD::conn()->prepare($sql);
 		 $executa = array($this->login, $this->email, $this->password);
 		 return $prepara->execute($executa);
 	}

 	public function testarClasse(){
 		return 'Classe User iniciada';
 	}


 }
?>