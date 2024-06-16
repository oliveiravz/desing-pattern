<?php

namespace App\Classes;

use App\Interfaces\BuilderInterface;

class MoradorBuilder implements BuilderInterface
{
    private $morador;

    public function __construct() {
        $this->morador = [];
    }

    public function setEmail($email) {
        $this->morador['email'] = $email;
        return $this;
    }

    public function getEmail() {
        return $this->morador['email'] ?? null;
    }

    public function setEmailDois($emailDois) {
        $this->morador['email_dois'] = $emailDois;
        return $this;
    }

    public function getEmailDois() {
        return $this->morador['email_dois'] ?? null;
    }

    public function setNome($nome) {
        $this->morador['nome'] = $nome;
        return $this;
    }

    public function getNome() {
        return $this->morador['nome'] ?? null;
    }

    public function setCpf($cpf) {
        $this->morador['cpf'] = $cpf;
        return $this;
    }

    public function getCpf() {
        return $this->morador['cpf'] ?? null;
    }

    public function setAtivo($ativo) {
        $this->morador['ativo'] = $ativo;
        return $this;
    }

    public function getAtivo() {
        return $this->morador['ativo'] ?? null;
    }

    public function setCreatedAt($createdAt) {
        $this->morador['created_at'] = $createdAt;
        return $this;
    }

    public function getCreatedAt() {
        return $this->morador['created_at'] ?? null;
    }

    public function setSenha($senha) {
        $this->morador['senha'] = $senha;
        return $this;
    }

    public function getSenha() {
        return $this->morador['senha'] ?? null;
    }

    public function setApartamentoId($apartamentoId) {
        $this->morador['apartamento_id_apartamento'] = $apartamentoId;
        return $this;
    }

    public function getApartamentoId() {
        return $this->morador['apartamento_id_apartamento'] ?? null;
    }

    public function setTelefone($telefone) {
        $this->morador['telefone'] = $telefone;
        return $this;
    }

    public function getTelefone() {
        return $this->morador['telefone'] ?? null;
    }

    public function setTelefoneDois($telefoneDois) {
        $this->morador['telefone_dois'] = $telefoneDois;
        return $this;
    }

    public function getTelefoneDois() {
        return $this->morador['telefone_dois'] ?? null;
    }

    public function build() {
        return $this->morador;
    }

}
