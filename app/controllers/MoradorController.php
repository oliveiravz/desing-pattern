<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Core\Request;
use App\Models\Apartamento;
use App\Classes\MoradorBuilder;
use App\Models\Morador;

class MoradorController extends Controller
{
    protected string $view = "morador";
    protected string $title = "Cadastrar Moradores";

    public function store() {

        $data = Request::all();
        $moradorBuilder = new MoradorBuilder();
        $morador = new Morador();

        $errors = [];
        $requiredFields = [
            'email',
            'nome',
            'cpf',
            'senha',
            'apartamento_id_apartamento',
        ];

        foreach ($requiredFields as $field) {
            
            if(empty($data[$field])) {
                $errors[$field][] = "Preencha o campo {$field}";
            }

        }

        $moradorBuilder
        ->setEmail($data['email'])
        ->setEmailDois($data['email_dois'] ?? null)
        ->setNome($data['nome'])
        ->setCpf($data['cpf'])
        ->setAtivo($data['ativo'] ?? true)
        ->setCreatedAt(isset($data['created_at']) ? new \DateTime($data['created_at']) : null)
        ->setSenha($data['senha'])
        ->setApartamentoId($data['apartamento_id_apartamento'])
        ->setTelefone($data['telefone'] ?? null)
        ->setTelefoneDois($data['telefone_dois'] ?? null)
        ->build();

        $validate = $morador->validate($moradorBuilder);

        if(!$validate['success']) {
            $response = $validate;
        }else{
            $response = $morador->create($moradorBuilder);

        }

        $this->index($response);
    }
    

    public function getApartamentos() {

        $result = [];
        $apartamentos = new Apartamento();
        
        $result['apartamentos'] = $apartamentos->fetchAll();

        $this->index($result);
    }
}

