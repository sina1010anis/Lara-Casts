<?php


namespace App\Repository;


use App\Models\channel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class methodChannel
{
    public function newChannel($data){
        $channel = new methodChannel();
        $channel->name = $data->name;
        $channel->slug = Str::slug($data->name);
        $channel->save();
    }
    public function updateChannel($data , Request $request){
        return channel::where('id' , $data)->update(['name' => $request->name , 'slug' => Str::slug($request->name)]);
    }
    public function editNameChannel($data){
        if (strlen($data) > 25){
            echo mb_substr($data,0,25).'...';
        }else{
            echo $data;
        }
    }
}
