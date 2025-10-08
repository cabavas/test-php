<?php

namespace app\models;
class PessoaJuridica extends Pessoa{
    private $id;
    private $pessoa_id;
    private $cnpj;
    private $razao_social;

    public function __construct($pessoa_id, $cnpj, $razao_social){
        $this->pessoa_id = $pessoa_id;
        $this->cnpj = $cnpj;
        $this->razao_social = $razao_social;
    }
    public function getId(){
        return $this->id;
    }
    public function getPessoaId(){
        return $this->pessoa_id;
    }
    public function getCnpj(){
        return $this->cnpj;
    }
    public function getRazaoSocial(){
        return $this->razao_social;
    }
    public function setPessoaId($pessoa_id){
        $this->pessoa_id = $pessoa_id;
    }
    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }
    public function setRazaoSocial($razao_social){
        $this->razao_social = $razao_social;
    }
}