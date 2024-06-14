<?php
namespace App\Support;

class GetIp
{
    public static function get() {
        $ipAddress = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            
            $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        }

        return $ipAddress;
    }
}