<?php

namespace app\services;

use app\models\Atleta;
use app\repositories\AtletaRepository;

class AtletaService
{

    public function updateAtleta(Atleta $atleta)//atualiza um atleta existente
    {
        return $this->repository->updateAtleta($atleta);
    }
    public function deleteAtleta(int $id)//deleta um atleta existente
    {
        return $this->repository->deleteAtleta($id);
    }
    public function saveAtleta(Atleta $atleta)//salva um novo atleta, mas antes faz as validações necessárias
    {
        //verifica se os campos obrigatórios estão preenchidos, REGRA DE NEOCIO PROFESSOR
        if (empty($atleta->getNome()) || empty($atleta->getClube()) || empty($atleta->getPeso())) {
            throw new \Exception("Os campos Nome, Clube e Peso são obrigatórios!");
        }
        //verifica se tem um nome igual VALIDAÇÃO PROFESSOR
        if ($this->repository->buscarPorNome($atleta->getNome())) {
            throw new \Exception("Já existe um atleta cadastrado com este nome.");
        }
        return $this->repository->saveAtleta($atleta);
    }


    private AtletaRepository $repository;

    public function __construct()
    {

        $this->repository = new AtletaRepository();
    }

    public function getAtletas()
    {
        return $this->repository->getAtletas();
    }

    public function getAtleta(int $id)
    {
        return $this->repository->getAtleta($id);
    }
}
