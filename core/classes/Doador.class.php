<?php

namespace DoeSangue\Doador;

// icnlude classe User
include 'User.class.php';
 /**
  * @author José Cage
  *
  * @version 0.0.1
  *
  * @link http://mentedigital.me
  *
  * @license MIT
  */
 class Doador extends User
 {
     private $nome;
     private $sobrenome;
     private $biografia;
     private $genero;
     private $gp_sangue;
     private $user_id;
     private $nascimento;
     private $data_entrada;

    // Função __construct()
    public function __construct()
    {
        parent::__construct();
    }

    // Setar dados das variaveis
    public function __set($propriedade, $valor)
    {
        $this->$propriedade = $valor;
    }

    // Pegar os dados das variaveis
    public function __get($propriedade)
    {
        return $this->$propriedade;
    }

    // função inserir novo doador quando user registado
    public function novoDoador()
    {
        $sql = 'INSERT INTO doadores(nome, sobrenome, biografia, genero, gp_sangue, user_id, nascimento, data_entrada) VALUES(?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP())';
        $preparar = BD::conn()->prepare($sql);
        $executa = [$this->nome, $this->sobrenome, $this->gp_sangue, $this->user_id, $this->nascimento];

        return $preparar->execute($executa);
    }

    // função alterar dados do Doador
    public function editDoador()
    {
        $sql = 'UPDATE doadores SET nome, sobrenome, biografia, genero, gp_sangue, nascimento WHERE user_id =?';
        $prepararr = BD::conn()->prepare($sql);
        $executa = [$this->nome, $this->sobrenome, $this->gp_sangue, $this->nascimento];

        return $preparar->execute($executa);
    }

    // Função remover todos dados do user
    public function apagarConta($id, $user_id)
    {
        $id = $this->user_id;
        $sql = 'DELETE FROM users WHERE id =?';
        $prepara = BD::conn()->prepare($sql);
        $executa = [$this->id];

        return $prepara->execute($executa);
    }
 }
