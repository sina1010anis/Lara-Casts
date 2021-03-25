<?php


namespace App\Mix;


class MethodsStr
{
    public function tagP()
    {
        return function ($text){
            return '<p>'.$text.'</p>';
        };
    }

    public function tagH1()
    {
        return function ($text){
            return '<h1>'.$text.'</h1>';
        };
    }
}
