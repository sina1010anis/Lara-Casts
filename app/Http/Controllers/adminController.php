<?php

namespace App\Http\Controllers;

use App\Repository\methodChannel;
use App\Models\channel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class adminController extends Controller
{
    public function newChannel()
    {
        return view('Back.newChannel');
    }
    public function newChannelCreate(Request $request)
    {
        $v = $request->validate([
            'name' => 'required|max:100'
        ]);
        resolve(methodChannel::class)->newChannel($request);

        return redirect()->back()->with('msg' , 'New methodChannel Successful');
    }

    public function channelList()
    {

        return view('Back.viewChannel');
    }
    public function editChannel(channel $id)
    {
        return view('Back.editChannel' ,compact('id'));
    }

    public function updateChannel( $id , Request $request)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);
        resolve(methodChannel::class)->updateChannel($id,$request);
        return redirect(route('admin.channel_list'))->with('msg' , 'Edit methodChannel Successful');
    }
}
