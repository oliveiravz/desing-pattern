<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\AreaLazer;

class AreasLazerController extends Controller
{
    public function get() {

        $areasLazer = new AreaLazer();

        $areasLazer = $areasLazer->fetchAll();
        
        return $this->jsonResponse($areasLazer);

    }
}