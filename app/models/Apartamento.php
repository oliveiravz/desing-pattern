<?php
namespace App\Models;

use App\Config\Connection;

class Apartamento
{
    protected string $table = "apartamento";

    protected array $fields = [
        'id_apartamento',
        'descricao'
    ];
}