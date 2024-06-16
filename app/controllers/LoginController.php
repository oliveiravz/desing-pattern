<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Core\Request;
use App\Classes\ValidationStrategy;
use App\Support\GetIp;
use App\Models\Auditoria;

class LoginController extends Controller
{
    protected string $view = "login";
    protected string $title = "Reservas";

    public function validate() {
        
        $auditoria        = new Auditoria();
        $validateStrategy = new ValidationStrategy();
        $ClientIp         = new GetIp;
        $data             = Request::all();

        $validate = $validateStrategy->validate($data);
        
        if(isset($validate['erro'])) {
            return $this->index($validate);
        }

        $_SESSION['user'] = $validate;

        $ip = $ClientIp->get();
        
        $_SESSION['user']['ip'] = $ip;

        if(!isset($_SESSION['message_error'])) {

            return $this->view("home", ["title" => "Faça sua reserva", "data" => $_SESSION]);

        }
    }

}