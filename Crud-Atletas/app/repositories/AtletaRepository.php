<?php

namespace app\repositories;

use app\database\ConnectionFactory;
use app\models\Atleta;
use PDO;

class AtletaRepository
{
    public function buscarPorNome(string $nome)
    {
        // Prepara a SQL para buscar pelo nome
        $sql = "SELECT * FROM atletas WHERE nome = :nome LIMIT 1";

        $stmt = $this->connection->prepare($sql); //
        $stmt->bindValue(':nome', $nome);

        $stmt->execute();

        // Retorna o resultado (fetch retorna um array associativo ou false)
        return $stmt->fetch();
    }
    public function deleteAtleta(int $id)
    {
        $sql = "DELETE FROM atletas WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function updateAtleta(Atleta $atleta)
    {
        $sql = "UPDATE atletas SET nome = :nome, altura = :altura, peso = :peso, clube = :clube, treinador = :treinador, foto_url = :foto_url WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $atleta->getId());
        $stmt->bindValue(':nome', $atleta->getNome());
        $stmt->bindValue(':altura', $atleta->getAltura());
        $stmt->bindValue(':treinador', $atleta->getTreinador());
        $stmt->bindValue(':peso', $atleta->getPeso());
        $stmt->bindValue(':clube', $atleta->getClube());
        $stmt->bindValue(':foto_url', $atleta->getFotoUrl());
        return $stmt->execute();
    }
    private PDO $connection;


    function __construct()
    {
        $this->connection = ConnectionFactory::getConnection();
    }

    public function getAtletas(): array
    {

        $stm = $this->connection->prepare("SELECT * FROM atletas");
        $stm->execute();

        $atletas = $stm->fetchAll();

        return $atletas;
    }

    public function getAtleta(int $id)
    {

        $stm = $this->connection->prepare("SELECT * FROM atletas WHERE id = :id");
        $stm->bindValue('id', $id);

        $stm->execute();

        $atleta = $stm->fetch();

        return $atleta;
    }

    public function saveAtleta(Atleta $atleta)
    {

        $sql = "INSERT INTO atletas (nome, altura, peso, clube, treinador, foto_url) " .
            "VALUES(:nome, :altura, :peso, :clube, :treinador, :foto_url)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':nome', $atleta->getNome());
        $stmt->bindValue(':altura', $atleta->getAltura());
        $stmt->bindValue(':treinador', $atleta->getTreinador());
        $stmt->bindValue(':peso', $atleta->getPeso());
        $stmt->bindValue(':clube', $atleta->getClube());
        $stmt->bindValue(':foto_url', $atleta->getFotoUrl());

        return $stmt->execute();
    }
}
