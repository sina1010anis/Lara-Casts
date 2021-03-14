<?php


namespace App\Mix;


class MethodsStr
{
    public function Test()
    {
        return function ($text){
            return '<p>'.$text.'</p>';
        };
    }
}
