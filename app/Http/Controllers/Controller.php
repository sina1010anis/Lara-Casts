<?php

namespace App\Http\Controllers;

use App\Models\answer;
use App\Models\channel;
use App\QueryFilter\ChannelFilter;
use App\Repository\methodChannel;
use App\Repository\Test_resolve;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Routing\Controller as BaseController;
use App\Models\news;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test()
    {
        return view('Front.test') ;
    }
    public function test2(Request $request)
    {
        $tmp = $request->file('images');
        $name = $tmp->getClientOriginalName();
        return $tmp->move(public_path('Data/Test/'),$name);
    }
    public function search_channel(Request $request){
        $ListChannelsSearch=resolve(methodChannel::class)->ListChannelsSearch($request);
        $index_page = true;
        return view('Front.Section.index_page' , compact('ListChannelsSearch' , 'index_page'));
    }
    public function channelView(){
        $pipeline = app(Pipeline::class)
            ->send(channel::query())
            ->through([
                ChannelFilter::class
            ])
            ->thenReturn()
            ->get();
        $index_page = true;
        return view('Front.Section.index_page', compact('pipeline' , 'index_page'));
    }
    public function channelViewOne(channel $name){
        $data = [
            'index_one_channel' => true,
            'answer_my' => resolve(methodChannel::class)->answer_my($name->id),
            'answers' => resolve(methodChannel::class)->answers($name->id)
        ];
        return view('Front.Section.index_one_channel')->with(
            [
            'index_one_channel' => $data['index_one_channel'],
            'answers' => $data["answers"],
            'answer_my' => $data["answer_my"],
            'id' => $name->id
        ]
        );
    }
    public function newComment($id , Request $request , answer $answer){
        $answer->user_id = auth()->user()->id;
        $answer->content = $request->body;
        $answer->title = 'null';
        $answer->thread = $id;
        $answer->action = 0;
        $answer->save();
/*
        <h1>test</h1>
<hr>
<code>
        Auth::user->id
        </code>*/
        return redirect()->back()->with('msg' , 'Send Comment Successful');
    }
}
