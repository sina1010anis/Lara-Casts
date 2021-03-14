<?php


namespace App\View;


class View
{
    public function View()
    {
        \Illuminate\Support\Facades\View::composer(['*'] , view_channel::class);
    }
}
