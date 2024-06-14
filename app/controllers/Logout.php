<?php
namespace App\Controllers;

class Logout extends Controller
{
    public function logout() {
        session_start();
        session_destroy();
        header("Location: /login");
    }
}