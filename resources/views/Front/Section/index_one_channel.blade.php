@extends('Front.index')

@section('indexPage')

    <div class="shit-index-page">
        <div class="shit-index-page-left">
            <div class="shit-index-page-left-div">
                @if(isset($index_page))
                    <a class="icon-btn-menu-left-index-page">New Discussion</a>
                @endif
                @if(isset($index_one_channel))
                    <a class="icon-btn-menu-REPLY-index-page" style="cursor: pointer">REPLY</a>
                    <a class="icon-btn-menu-Follow-index-page">Follow</a>
                @endif
                <ul>
                    @auth()
                        <li>
                            <a class="icon-btn-menu-left-index-page-li"
                               href="{{route('channelView').'?menu=My Questions'}}">My Questions</a>
                        </li>
                        <li>
                            <a class="icon-btn-menu-left-index-page-li"
                               href="{{route('channelView').'?menu=My Participation'}}">My Participation</a>
                        </li>
                        <li>
                            <a class="icon-btn-menu-left-index-page-li"
                               href="{{route('channelView').'?menu=My Best Answers'}}">My Best Answers</a>
                        </li>
                        <li>
                            <a class="icon-btn-menu-left-index-page-li"
                               href="{{route('channelView').'?menu=Following'}}">Following</a>
                        </li>
                    @endauth
                    <li>
                        <a class="icon-btn-menu-left-index-page-li"
                           href="{{route('channelView').'?menu=Popular This Week'}}">Popular This Week</a>
                    </li>
                    <li>
                        <a class="icon-btn-menu-left-index-page-li"
                           href="{{route('channelView').'?menu=Popular All Time'}}">Popular All Time</a>
                    </li>
                    <li>
                        <a class="icon-btn-menu-left-index-page-li" href="{{route('channelView').'?menu=Solved'}}">Solved</a>
                    </li>
                    <li>
                        <a class="icon-btn-menu-left-index-page-li" href="{{route('channelView').'?menu=Unsolved'}}">Unsolved</a>
                    </li>
                    <li>
                        <a class="icon-btn-menu-left-index-page-li"
                           href="{{route('channelView').'?menu=No Replies Yet'}}">No Replies Yet</a>
                    </li>
                    <li>
                        <a class="icon-btn-menu-left-index-page-li" href="{{route('channelView').'?menu=Leaderboard'}}">Leaderboard</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="shit-index-page-right">
            @if(isset($index_page))
                <div class="page-option-view-channel">
                    <div class="float-left-page-option-view-channel">
                        <select class="view-menu-index-page view-select-index-page" name="" id="">
                            <option selected value="All Threads">All Threads</option>
                            @auth()
                                <option value="My Questions">My Questions</option>
                                <option value="My Participation">My Participation</option>
                                <option value="My Best Answers">My Best Answers</option>
                                <option value="Following">Following</option>
                            @endauth
                            <option value="Popular This Week">Popular This Week</option>
                            <option value="Popular All Time">Popular All Time</option>
                            <option value="Solved">Solved</option>
                            <option value="Unsolved">Unsolved</option>
                            <option value="No Replies Yet">No Replies Yet</option>
                            <option value="Leaderboard">Leaderboard</option>
                        </select>
                        <select v-model="channel" id="select_channel_model" name="select_channel_model"
                                class=" view-channel-index-page view-select-index-page tw-text-grey-darker tw-text-sm tw-bg-grey-panel tw-rounded-full tw-px-5 tw-cursor-pointer"
                                style="width: 92px;">
                            <option selected value="all">All</option>
                            <option value="code-review">Assistance</option>
                            <option value="eloquent">Eloquent</option>
                            <option value="envoyer">Envoyer</option>
                            <option value="site-improvements">Feedback</option>
                            <option value="forge">Forge</option>
                            <option value="general-discussion">General</option>
                            <option value="guides">Guides</option>
                            <option value="javascript">JavaScript</option>
                            <option value="laravel">Laravel</option>
                            <option value="livewire">Livewire</option>
                            <option value="lumen">Lumen</option>
                            <option value="elixir">Mix</option>
                            <option value="nova">Nova</option>
                            <option value="requests">Requests</option>
                            <option value="servers">Servers</option>
                            <option value="spark">Spark</option>
                            <option value="testing">Testing</option>
                            <option value="tips">Tips</option>
                            <option value="vapor">Vapor</option>
                            <option value="vue">Vue</option>
                        </select>
                    </div>
                </div>
                <div class="float-right-page-option-view-channel">
                    <form action="{{route('search_channel')}}" method="get">
                        {{--@csrf--}}
                        <input type="text" name="search_channel" placeholder="Whatcha Looking For?">
                    </form>
                    <button class="forum-excerpt-toggle is-active icon-sort-channel2" @click="showDIs()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"
                             class="tw-mx-2">
                            <g fill="#78909C" fill-rule="evenodd" class="forum-excerpt-toggle-lines">
                                <rect width="15" height="4" rx="2" class="forum-excerpt-toggle-line"></rect>
                                <rect width="8" height="4" y="11" rx="2" class="forum-excerpt-toggle-line"></rect>
                                <rect width="15" height="4" y="5.5" rx="2" class="forum-excerpt-toggle-line"></rect>
                            </g>
                        </svg>
                    </button>
                    <button class=" icon-sort-channel1" @click="hideDis()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"
                             class="tw-mx-2">
                            <g fill="#78909C" fill-rule="evenodd" class="forum-excerpt-toggle-lines">
                                <rect width="15" height="6" rx="2" class="forum-excerpt-toggle-line"></rect>
                                <rect width="15" height="6" y="9" rx="2" class="forum-excerpt-toggle-line"></rect>
                            </g>
                        </svg>
                    </button>
                </div>
            @endif
            <div class="view-channel-comment">
                <div class="view-option-comment-channel">
                    <button class="btn-view-option-comment-channel" type="button">Original Post</button>
                    <input v-model="value" @mouseup="testCilck()" type="range" min="0" max="10" step="1"
                           class="input-range">
                    <button class="btn-view-option-comment-channel" type="button">Newest Reply</button>
                    <p align="center"><b>1 of 1391 replies</b></p>
                </div>
                <div class="view-comment-all">
                    <div class="my-answers">
                        <p style="font-size: 20px;padding: 0;margin: 0">
                            <b>
                                {{$answer_my->users->name}}
                            </b>
                            <span class="original-post">OP</span>
                        </p>
                        <p style="font-size: 10px;color: #9b9b9b;margin: 0;padding: 0">
                            {{jdate($answer_my->created_at)->ago()}}
                        </p>
                        <div class="view-title">
                            {{$answer_my->title}}
                        </div>
                        <div class="view-content">
                            {!! $answer_my->content !!}
                        </div>
                    </div>
                    <div class="answers">
                        <ul style="margin: 0;padding: 0">
                            @foreach($answers as $answer)
                                <li>
                                    <p style="font-family: IRANSansWeb;margin: 0;padding: 0">
                                        {{$answer->users->name}}
                                        <img @click="reply({{$answer->id}})" class="icon-reply-comment-channel"
                                             src="{{url('Data/Image/Index/icon_reply.png')}}" alt="">
                                        @if($answer_my->user_id == auth()->user()->id)
                                            <img class="icon-best-comment-channel"
                                                 src="{{url('Data/Image/Index/icon_best.png')}}" alt="">
                                        @endif
                                    </p>
                                    <p style="font-size: 10px;color: #9b9b9b;margin: 0;padding: 0;font-family: IRANSansWeb">
                                        {{jdate($answer->created_at)->ago()}}
                                    </p>
                                    <div class="view-content">
                                        {!! $answer->content !!}
                                    </div>
                                </li>
                                @if($answer->reply->count() > 0)
                                    <ul>
                                        @foreach($answer->reply as $reply)
                                            <li style="margin-left: 20px;background-color:#F4F7FC ">
                                                <p style="font-family: IRANSansWeb;margin: 0;padding: 0">
                                                    {{$reply->users->name}}
                                                </p>
                                                <p style="font-size: 10px;color: #9b9b9b;margin: 0;padding: 0;font-family: IRANSansWeb">
                                                    {{jdate($reply->created_at)->ago()}}
                                                </p>
                                                <div class="view-content">
                                                    {!! $reply->content !!}
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-new-comment">
            <form action="{{route('admin.newComment' , $id)}}" method="post">
                @csrf
                <h2 style="font-family: IRANSansWeb;color: #ababab">Reply to</h2>
                <div class="line" style="top: 0!important;"></div>
                <textarea class="all-input-body-channel" type="text" name="body" placeholder="Type Text..."></textarea>
                @error('name')
                <div class="err">{{$message}}</div>
                @enderror
                <div class="line" style="top: 20px"></div>
                <div class="end-object">
                    <button type="button" class="btn-register btn-register-exit">CANCEL</button>
                    <button class="btn-register" type="submit">POST</button>
                </div>
            </form>
        </div>

        <div class="form-reply-comment">
            <form action='{{route('admin.replyComment')}}' method="post">
                @csrf
                <h2 style="font-family: IRANSansWeb;color: #ababab">Reply to</h2>
                <div class="line" style="top: 0!important;"></div>
                <textarea name="id" style="opacity: 0;display: none">@{{replyId}}</textarea>
                <textarea class="all-input-body-channel" type="text" name="body" placeholder="Type Text..."></textarea>
                @error('name')
                <div class="err">{{$message}}</div>
                @enderror
                <div class="line" style="top: 20px"></div>
                <div class="end-object">
                    <button type="button" class="btn-register btn-register-exit">CANCEL</button>
                    <button class="btn-register" type="submit">POST</button>
                </div>
            </form>
        </div>
    </div>
@endsection
