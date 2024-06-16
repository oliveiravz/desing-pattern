<?php

namespace App\Interfaces;


interface BuilderInterface 
{
    public function setEmail($email);
    public function setEmailDois($emailDois);
    public function setNome($nome);
    public function setCpf($cpf);
    public function setAtivo($ativo);
    public function setCreatedAt($createdAt);
    public function setSenha($senha);
    public function setApartamentoId($apartamentoId);
    public function setTelefone($telefone);
    public function setTelefoneDois($telefoneDois);
    public function build();

}