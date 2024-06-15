<?php
namespace App\Models;

use App\Config\Connection;
use App\Interfaces\Observable;

class User extends Model implements Observable
{
    protected $observers = [];

    public function addObserver($observer) {
        $this->observers[] = $observer;
    }

    public function removeObserver($observer) {
        $this->observers = array_filter($this->observers, function($obs) use ($observer) {
            return $obs !== $observer;
        });
    }

    public function notifyObservers($data) {
        foreach ($this->observers as $observer) {
            $observer->update($data);
        }
    }

    public function login($email, $senha, $ip) {
        // Lógica de login aqui
        
        // Dados de exemplo para notificação
        $data = [
            'user' => [
                'email' => $email,
                'senha' => $senha,
                'ip' => $ip
            ]
        ];

        // Notificar os observadores
        $this->notifyObservers($data);
    }

    use App\Models\User;
use App\Models\Auditoria;

// Criando instâncias dos modelos
$user = new User();
$auditoria = new Auditoria();

// Adicionando a auditoria como observadora do usuário
$user->addObserver($auditoria);

// Realizando um login (isso notificará a auditoria)
$user->login('user@example.com', 'password123', '192.168.0.1');

}
