<?php 

namespace app\models;

use DateTimeImmutable;

class Atleta {

    private int $id;
    private string $nome;
    private ?string $treinador;
    private ?float $altura;
    private ?float $peso;
    private ?string $clube;
    private ?string $foto_url;
    private DateTimeImmutable $criadoEm;

    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getTreinador(): ?string {
        return $this->treinador;
    }

    public function getAltura(): ?float {
        return $this->altura;
    }

    public function getPeso(): ?float {
        return $this->peso;
    }

    public function getClube(): ?string {
        return $this->clube;
    }

    public function getFotoUrl(): ?string {
        return $this->foto_url;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setAltura(?float $altura): void {
        $this->altura = $altura;
    }

    public function setPeso(?float $peso): void {
        $this->peso = $peso;
    }

    public function setTreinador(?string $treinador): void {
        $this->treinador = $treinador;
    }

    public function setClube(?string $clube): void {
        $this->clube = $clube;
    }

    public function setFotoUrl(?string $foto_url): void {
        $this->foto_url = $foto_url;
    }
}
