<?php


namespace App\View;


use App\Models\channel;

class view_channel
{
    public function compose(\Illuminate\View\View $view)
    {
        return $view->with('ListChannels' , channel::orderBy('id' , 'DESC')->get());
    }
}
