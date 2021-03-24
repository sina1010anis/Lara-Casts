<?php


namespace App\Repository;


use App\Models\answer;
use App\Models\channel;
use App\Models\reply;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class methodChannel
{
    public function newChannel($data){
        $channel = new channel();
        $answer = new answer();
        $channel->name = $data->name;
        $channel->slug = Str::slug($data->name);
        $channel->user_id = auth()->user()->id;
        $channel->body = $data->body;
        $channel->model = $data->model;
        $channel->save();

        $answer->content = $data->answer_my;
        $answer->title = $data->name;
        $answer->user_id = auth()->user()->id;
        $answer->thread= 14;
        $answer->action= 1;
        $answer->save();
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

    public function ListChannelsSearch(Request $request)
    {
        return channel::where('name' ,'LIKE', '%' . $request->search_channel . '%')->get();
    }
    public function ListSortChannel($has)
    {
        switch ($has){
            case 'My Questions':
                return channel::where('username' , auth()->user()->username)->get();
                break;
        }
    }
    public function answers($name){
        return answer::where(['thread' => $name , 'action' => 0])->orderBy('id' , 'ASC')->get();
    }
    public function answer_my($name){
        return answer::where(['thread' => $name , 'action' => 1])->first();
    }

    public function replyComment(Request $request )
    {
        $reply = new reply();
        $reply->content = $request->body;
        $reply->user_id = auth()->user()->id;
        $reply->answer_id = $request->id;
        $reply->save();
    }
}
