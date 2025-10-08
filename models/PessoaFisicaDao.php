<?php

namespace app\models;

use DAO;

class PessoaFisicaDao extends DAO
{
    public function store($data)
    {
        $this->connection->beginTransaction();
        $sql = "INSERT INTO pessoas (nome, email) VALUES (:nome, :email)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(":nome", $data["nome"]);
        $stmt->bindParam(":email", $data["email"]);

        try {
            $stmt->execute();
            $pessoa = $stmt->fetch(PDO::FETCH_OBJ);
            $sql = "INSERT INTO pessoas_fisicas (pessoa_id, cpf, data_nascimento) VALUES (:pessoa_id, :cpf, :data_nascimento)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":pessoa_id", $pessoa->id);
            $stmt->bindParam(":cpf", $data["cpf"]);
            $stmt->bindParam(":data_nascimento", $data["data_nascimento"]);
            if($stmt->execute()) {
                $this->connection->commit();
            } else {
                $this->connection->rollback();
            }
        } catch (Exception $ex) {
            $this->connection->rollback();
        }


    }
}