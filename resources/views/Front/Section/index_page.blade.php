@extends('Front.index')

@section('indexPage')

    <div class="shit-index-page">
        <div class="shit-index-page-left">
            <div class="shit-index-page-left-div">
                @if($index_page)
                    <a class="icon-btn-menu-left-index-page">New Discussion</a>
                @endif
                <ul>
                    @auth()
                        <li>
                            <a class="icon-btn-menu-left-index-page-li" href="{{route('channelView').'?menu=My Questions'}}">My Questions</a>
                        </li>
                        <li>
                            <a class="icon-btn-menu-left-index-page-li" href="{{route('channelView').'?menu=My Participation'}}">My Participation</a>
                        </li>
                        <li>
                            <a class="icon-btn-menu-left-index-page-li" href="{{route('channelView').'?menu=My Best Answers'}}">My Best Answers</a>
                        </li>
                        <li>
                            <a class="icon-btn-menu-left-index-page-li" href="{{route('channelView').'?menu=Following'}}">Following</a>
                        </li>
                    @endauth
                    <li>
                        <a class="icon-btn-menu-left-index-page-li" href="{{route('channelView').'?menu=Popular This Week'}}">Popular This Week</a>
                    </li>
                    <li>
                        <a class="icon-btn-menu-left-index-page-li" href="{{route('channelView').'?menu=Popular All Time'}}">Popular All Time</a>
                    </li>
                    <li>
                        <a class="icon-btn-menu-left-index-page-li" href="{{route('channelView').'?menu=Solved'}}">Solved</a>
                    </li>
                    <li>
                        <a class="icon-btn-menu-left-index-page-li" href="{{route('channelView').'?menu=Unsolved'}}">Unsolved</a>
                    </li>
                    <li>
                        <a class="icon-btn-menu-left-index-page-li" href="{{route('channelView').'?menu=No Replies Yet'}}">No Replies Yet</a>
                    </li>
                    <li>
                        <a class="icon-btn-menu-left-index-page-li" href="{{route('channelView').'?menu=Leaderboard'}}">Leaderboard</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="shit-index-page-right">
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
                    <select v-model="channel" id="select_channel_model" name="select_channel_model" class=" view-channel-index-page view-select-index-page tw-text-grey-darker tw-text-sm tw-bg-grey-panel tw-rounded-full tw-px-5 tw-cursor-pointer" style="width: 92px;">
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
            <div class="view-channel">
                <ul>
                    @if(!isset($ListChannelsSearch))
                        @foreach($ListChannels as $ListChannel)
                            <li v-if="channel == '' || channel == 'all'">
                                <a href="{{route('channelViewOne' , $ListChannel->slug)}}">
                                    <div class="view-channel-title">
                                        <h3>{{$ListChannel->name}}</h3>
                                        <div class="view-channel-title-view">
                                <span>
                                    <span>{{$ListChannel->comment}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="13" viewBox="0 0 19 13"
                                         class="view-channel-title-icon view-channel-title-icon1"><g fill="none"
                                                                                                     fill-rule="evenodd"><path
                                                d="M0-3h19v19H0z"></path> <path fill="#78909C"
                                                                                d="M9.5.562C5.542.562 2.161 3.025.792 6.5c1.37 3.475 4.75 5.937 8.708 5.937s7.339-2.462 8.708-5.937C16.838 3.025 13.458.562 9.5.562zm0 9.896A3.96 3.96 0 0 1 5.542 6.5 3.96 3.96 0 0 1 9.5 2.542 3.96 3.96 0 0 1 13.458 6.5 3.96 3.96 0 0 1 9.5 10.458zm0-6.333A2.372 2.372 0 0 0 7.125 6.5 2.372 2.372 0 0 0 9.5 8.875 2.372 2.372 0 0 0 11.875 6.5 2.372 2.372 0 0 0 9.5 4.125z"
                                                                                opacity=".5"></path></g></svg>
                                </span>
                                            <span>
                                    <span>{{$ListChannel->view}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="19" viewBox="0 0 15 10"
                                         class="tw-relative view-channel-title-icon view-channel-title-icon2"><path
                                            fill="#78909C" fill-rule="evenodd"
                                            d="M7.5 0C3.344 0 0 2.818 0 6.286c0 1.987 1.094 3.757 2.781 4.914l.117 2.35c.022.438.338.58.704.32l2.023-1.442c.594.144 1.219.18 1.875.18 4.156 0 7.5-2.817 7.5-6.285C15 2.854 11.656 0 7.5 0z"
                                            opacity=".5"></path></svg>
                                </span>
                                            <a href="?id=10" id="btn-view-model-channel"
                                               class="{{$ListChannel->model}}">{{$ListChannel->model}}</a>
                                        </div>
                                    </div>
                                    <p v-if="dis" class="view-channel-dis">{{$ListChannel->body}}</p>
                                    <p class="view-channel-dis-up">

                                        <a href="##">
                                            <b>
                                                {{$ListChannel->username}}
                                            </b>
                                        </a>
                                        <span>
                                    {{$ListChannel->created_at}}
                                </span>
                                    </p>
                                </a>
                            </li>
                            <li v-if="channel === <?php echo '\''.$ListChannel->model .'\''?>">
                                <a href="{{route('channelViewOne' , $ListChannel->slug)}}">
                                    <div class="view-channel-title">
                                        <h3>{{$ListChannel->name}}</h3>
                                        <div class="view-channel-title-view">
                                <span>
                                    <span>{{$ListChannel->comment}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="13" viewBox="0 0 19 13"
                                         class="view-channel-title-icon view-channel-title-icon1"><g fill="none"
                                                                                                     fill-rule="evenodd"><path
                                                d="M0-3h19v19H0z"></path> <path fill="#78909C"
                                                                                d="M9.5.562C5.542.562 2.161 3.025.792 6.5c1.37 3.475 4.75 5.937 8.708 5.937s7.339-2.462 8.708-5.937C16.838 3.025 13.458.562 9.5.562zm0 9.896A3.96 3.96 0 0 1 5.542 6.5 3.96 3.96 0 0 1 9.5 2.542 3.96 3.96 0 0 1 13.458 6.5 3.96 3.96 0 0 1 9.5 10.458zm0-6.333A2.372 2.372 0 0 0 7.125 6.5 2.372 2.372 0 0 0 9.5 8.875 2.372 2.372 0 0 0 11.875 6.5 2.372 2.372 0 0 0 9.5 4.125z"
                                                                                opacity=".5"></path></g></svg>
                                </span>
                                            <span>
                                    <span>{{$ListChannel->view}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="19" viewBox="0 0 15 10"
                                         class="tw-relative view-channel-title-icon view-channel-title-icon2"><path
                                            fill="#78909C" fill-rule="evenodd"
                                            d="M7.5 0C3.344 0 0 2.818 0 6.286c0 1.987 1.094 3.757 2.781 4.914l.117 2.35c.022.438.338.58.704.32l2.023-1.442c.594.144 1.219.18 1.875.18 4.156 0 7.5-2.817 7.5-6.285C15 2.854 11.656 0 7.5 0z"
                                            opacity=".5"></path></svg>
                                </span>
                                            <a href="?id=10" id="btn-view-model-channel"
                                               class="{{$ListChannel->model}}">{{$ListChannel->model}}</a>
                                        </div>
                                    </div>
                                    <p v-if="dis" class="view-channel-dis">{{$ListChannel->body}}</p>
                                    <p class="view-channel-dis-up">

                                        <a href="##">
                                            <b>
                                                {{$ListChannel->username}}
                                            </b>
                                        </a>
                                        <span>
                                    {{$ListChannel->created_at}}
                                </span>
                                    </p>
                                </a>
                            </li>
                        @endforeach
                    @endif
                        @if(isset($pipeline))
                                @foreach($pipeline as $ListChannel)
                                    <li v-if="channel == '' || channel == 'all'">
                                        <a href="{{route('channelViewOne' , $ListChannel->slug)}}">
                                            <div class="view-channel-title">
                                                <h3>{{$ListChannel->name}}</h3>
                                                <div class="view-channel-title-view">
                                <span>
                                    <span>{{$ListChannel->comment}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="13" viewBox="0 0 19 13"
                                         class="view-channel-title-icon view-channel-title-icon1"><g fill="none"
                                                                                                     fill-rule="evenodd"><path
                                                d="M0-3h19v19H0z"></path> <path fill="#78909C"
                                                                                d="M9.5.562C5.542.562 2.161 3.025.792 6.5c1.37 3.475 4.75 5.937 8.708 5.937s7.339-2.462 8.708-5.937C16.838 3.025 13.458.562 9.5.562zm0 9.896A3.96 3.96 0 0 1 5.542 6.5 3.96 3.96 0 0 1 9.5 2.542 3.96 3.96 0 0 1 13.458 6.5 3.96 3.96 0 0 1 9.5 10.458zm0-6.333A2.372 2.372 0 0 0 7.125 6.5 2.372 2.372 0 0 0 9.5 8.875 2.372 2.372 0 0 0 11.875 6.5 2.372 2.372 0 0 0 9.5 4.125z"
                                                                                opacity=".5"></path></g></svg>
                                </span>
                                                    <span>
                                    <span>{{$ListChannel->view}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="19" viewBox="0 0 15 10"
                                         class="tw-relative view-channel-title-icon view-channel-title-icon2"><path
                                            fill="#78909C" fill-rule="evenodd"
                                            d="M7.5 0C3.344 0 0 2.818 0 6.286c0 1.987 1.094 3.757 2.781 4.914l.117 2.35c.022.438.338.58.704.32l2.023-1.442c.594.144 1.219.18 1.875.18 4.156 0 7.5-2.817 7.5-6.285C15 2.854 11.656 0 7.5 0z"
                                            opacity=".5"></path></svg>
                                </span>
                                                    <a href="?id=10" id="btn-view-model-channel"
                                                       class="{{$ListChannel->model}}">{{$ListChannel->model}}</a>
                                                </div>
                                            </div>
                                            <p v-if="dis" class="view-channel-dis">{{$ListChannel->body}}</p>
                                            <p class="view-channel-dis-up">

                                                <a href="##">
                                                    <b>
                                                        {{$ListChannel->username}}
                                                    </b>
                                                </a>
                                                <span>
                                    {{$ListChannel->created_at}}
                                </span>
                                            </p>
                                        </a>
                                    </li>
                                    <li v-if="channel === <?php echo '\''.$ListChannel->model .'\''?>">
                                        <a href="{{route('channelViewOne' , $ListChannel->slug)}}">
                                            <div class="view-channel-title">
                                                <h3>{{$ListChannel->name}}</h3>
                                                <div class="view-channel-title-view">
                                <span>
                                    <span>{{$ListChannel->comment}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="13" viewBox="0 0 19 13"
                                         class="view-channel-title-icon view-channel-title-icon1"><g fill="none"
                                                                                                     fill-rule="evenodd"><path
                                                d="M0-3h19v19H0z"></path> <path fill="#78909C"
                                                                                d="M9.5.562C5.542.562 2.161 3.025.792 6.5c1.37 3.475 4.75 5.937 8.708 5.937s7.339-2.462 8.708-5.937C16.838 3.025 13.458.562 9.5.562zm0 9.896A3.96 3.96 0 0 1 5.542 6.5 3.96 3.96 0 0 1 9.5 2.542 3.96 3.96 0 0 1 13.458 6.5 3.96 3.96 0 0 1 9.5 10.458zm0-6.333A2.372 2.372 0 0 0 7.125 6.5 2.372 2.372 0 0 0 9.5 8.875 2.372 2.372 0 0 0 11.875 6.5 2.372 2.372 0 0 0 9.5 4.125z"
                                                                                opacity=".5"></path></g></svg>
                                </span>
                                                    <span>
                                    <span>{{$ListChannel->view}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="19" viewBox="0 0 15 10"
                                         class="tw-relative view-channel-title-icon view-channel-title-icon2"><path
                                            fill="#78909C" fill-rule="evenodd"
                                            d="M7.5 0C3.344 0 0 2.818 0 6.286c0 1.987 1.094 3.757 2.781 4.914l.117 2.35c.022.438.338.58.704.32l2.023-1.442c.594.144 1.219.18 1.875.18 4.156 0 7.5-2.817 7.5-6.285C15 2.854 11.656 0 7.5 0z"
                                            opacity=".5"></path></svg>
                                </span>
                                                    <a href="?id=10" id="btn-view-model-channel"
                                                       class="{{$ListChannel->model}}">{{$ListChannel->model}}</a>
                                                </div>
                                            </div>
                                            <p v-if="dis" class="view-channel-dis">{{$ListChannel->body}}</p>
                                            <p class="view-channel-dis-up">

                                                <a href="##">
                                                    <b>
                                                        {{$ListChannel->username}}
                                                    </b>
                                                </a>
                                                <span>
                                    {{$ListChannel->created_at}}
                                </span>
                                            </p>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                    @if(isset($ListChannelsSearch))
                        @foreach($ListChannelsSearch as $ListChannel)
                            <li v-if="channel == '' || channel == 'all'">
                                <a href="{{route('channelViewOne' , $ListChannel->slug)}}">
                                    <div class="view-channel-title">
                                        <h3>{{$ListChannel->name}}</h3>
                                        <div class="view-channel-title-view">
                                <span>
                                    <span>{{$ListChannel->comment}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="13" viewBox="0 0 19 13"
                                         class="view-channel-title-icon view-channel-title-icon1"><g fill="none"
                                                                                                     fill-rule="evenodd"><path
                                                d="M0-3h19v19H0z"></path> <path fill="#78909C"
                                                                                d="M9.5.562C5.542.562 2.161 3.025.792 6.5c1.37 3.475 4.75 5.937 8.708 5.937s7.339-2.462 8.708-5.937C16.838 3.025 13.458.562 9.5.562zm0 9.896A3.96 3.96 0 0 1 5.542 6.5 3.96 3.96 0 0 1 9.5 2.542 3.96 3.96 0 0 1 13.458 6.5 3.96 3.96 0 0 1 9.5 10.458zm0-6.333A2.372 2.372 0 0 0 7.125 6.5 2.372 2.372 0 0 0 9.5 8.875 2.372 2.372 0 0 0 11.875 6.5 2.372 2.372 0 0 0 9.5 4.125z"
                                                                                opacity=".5"></path></g></svg>
                                </span>
                                            <span>
                                    <span>{{$ListChannel->view}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="19" viewBox="0 0 15 10"
                                         class="tw-relative view-channel-title-icon view-channel-title-icon2"><path
                                            fill="#78909C" fill-rule="evenodd"
                                            d="M7.5 0C3.344 0 0 2.818 0 6.286c0 1.987 1.094 3.757 2.781 4.914l.117 2.35c.022.438.338.58.704.32l2.023-1.442c.594.144 1.219.18 1.875.18 4.156 0 7.5-2.817 7.5-6.285C15 2.854 11.656 0 7.5 0z"
                                            opacity=".5"></path></svg>
                                </span>
                                            <a href="?id=10" id="btn-view-model-channel"
                                               class="{{$ListChannel->model}}">{{$ListChannel->model}}</a>
                                        </div>
                                    </div>
                                    <p v-if="dis" class="view-channel-dis">{{$ListChannel->body}}</p>
                                    <p class="view-channel-dis-up">

                                        <a href="##">
                                            <b>
                                                {{$ListChannel->username}}
                                            </b>
                                        </a>
                                        <span>
                                    {{$ListChannel->created_at}}
                                </span>
                                    </p>
                                </a>
                            </li>
                            <li v-if="channel === <?php echo '\''.$ListChannel->model .'\''?>">
                                <a href="{{route('channelViewOne' , $ListChannel->slug)}}">
                                    <div class="view-channel-title">
                                        <h3>{{$ListChannel->name}}</h3>
                                        <div class="view-channel-title-view">
                                <span>
                                    <span>{{$ListChannel->comment}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="13" viewBox="0 0 19 13"
                                         class="view-channel-title-icon view-channel-title-icon1"><g fill="none"
                                                                                                     fill-rule="evenodd"><path
                                                d="M0-3h19v19H0z"></path> <path fill="#78909C"
                                                                                d="M9.5.562C5.542.562 2.161 3.025.792 6.5c1.37 3.475 4.75 5.937 8.708 5.937s7.339-2.462 8.708-5.937C16.838 3.025 13.458.562 9.5.562zm0 9.896A3.96 3.96 0 0 1 5.542 6.5 3.96 3.96 0 0 1 9.5 2.542 3.96 3.96 0 0 1 13.458 6.5 3.96 3.96 0 0 1 9.5 10.458zm0-6.333A2.372 2.372 0 0 0 7.125 6.5 2.372 2.372 0 0 0 9.5 8.875 2.372 2.372 0 0 0 11.875 6.5 2.372 2.372 0 0 0 9.5 4.125z"
                                                                                opacity=".5"></path></g></svg>
                                </span>
                                            <span>
                                    <span>{{$ListChannel->view}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="19" viewBox="0 0 15 10"
                                         class="tw-relative view-channel-title-icon view-channel-title-icon2"><path
                                            fill="#78909C" fill-rule="evenodd"
                                            d="M7.5 0C3.344 0 0 2.818 0 6.286c0 1.987 1.094 3.757 2.781 4.914l.117 2.35c.022.438.338.58.704.32l2.023-1.442c.594.144 1.219.18 1.875.18 4.156 0 7.5-2.817 7.5-6.285C15 2.854 11.656 0 7.5 0z"
                                            opacity=".5"></path></svg>
                                </span>
                                            <a href="?id=10" id="btn-view-model-channel"
                                               class="{{$ListChannel->model}}">{{$ListChannel->model}}</a>
                                        </div>
                                    </div>
                                    <p v-if="dis" class="view-channel-dis">{{$ListChannel->body}}</p>
                                    <p class="view-channel-dis-up">

                                        <a href="##">
                                            <b>
                                                {{$ListChannel->users->name}}
                                            </b>
                                        </a>
                                        <span>
                                    {{$ListChannel->created_at}}
                                </span>
                                    </p>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="form-new-channel">
            <form action="{{route('admin.new_channel_create')}}" method="post">
                @csrf
                    <input class="all-input-name-channel" type="text" name="name" placeholder="Type Name..." value="{{old('name')}}">
                @error('name')
                <div class="err">{{$message}}</div>
                @enderror
                    <select  name="model" class=" view-channel-index-page-model-channel tw-text-grey-darker tw-text-sm tw-bg-grey-panel tw-rounded-full tw-px-5 tw-cursor-pointer" style="width: 92px;">
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
                <div class="line"></div>
                    <textarea class="all-input-body-channel" type="text" name="body" placeholder="Type Text..."></textarea>
                @error('name')
                <div class="err">{{$message}}</div>
                @enderror
                <input type="text" name="answer_my" class="input-my-answer" placeholder="tour answer...">
                <div class="line" style="top: 20px"></div>
                <div class="end-object">
                    <button type="button" class="btn-register btn-register-exit">CANCEL</button>
                    <button class="btn-register" type="submit">POST</button>
                </div>
            </form>
        </div>
    </div>
@endsection
