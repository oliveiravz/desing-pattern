<?php
namespace App\Models;

class Apartamento extends Model
{
    protected string $table = "apartamento";

    protected array $fields = [
        'id_apartamento',
        'descricao'
    ];
}