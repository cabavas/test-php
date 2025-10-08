<?php

namespace app\controllers;

use app\models\PessoaFisicaDao;

class PessoaFisicaController {
    public function store($data)
    {
        PessoaFisicaDao::class->store($data);
    }
}