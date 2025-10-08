<?php

namespace app\models;
class PessoaFisica extends Pessoa{
    private $id;
    private $pessoa_id;
    private $cpf;
    private $data_nascimento;
    public function __construct($pessoa_id, $cpf, $data_nascimento){
        $this->pessoa_id = $pessoa_id;
        $this->cpf = $cpf;
        $this->data_nascimento = $data_nascimento;
    }
    public function getId(){
        return $this->id;
    }
    public function getPessoaId(){
        return $this->pessoa_id;
    }
    public function setPessoaId($pessoa_id){
        $this->pessoa_id = $pessoa_id;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    public function getDataNascimento(){
        return $this->data_nascimento;
    }
    public function setDataNascimento($data_nascimento){
        $this->data_nascimento = $data_nascimento;
    }
}