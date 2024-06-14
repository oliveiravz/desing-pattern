<?php
namespace App\Models;

use PDO;
use App\Models\Model;
use App\Config\Connection;

class AreaLazer extends Model
{
    protected string $table = "areas_lazer";

    protected array $fields = [
        'id_area',
        'descricao_area'
    ];

}