<?php
namespace App\Interfaces;

interface Observable
{
    public function addObserver($observer);
    public function removeObserver($observer);
    public function notifyObservers();
}
