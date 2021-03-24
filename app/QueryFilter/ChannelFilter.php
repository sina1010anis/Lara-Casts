<?php


namespace App\QueryFilter;


class ChannelFilter
{
    public function handle($request , \Closure $next)
    {
        if (!request()->has('menu')){
            return $next($request);
        }
        $bind = $next($request);
        if (request()->menu == 'My Questions' ){
            return $bind->where('username' , auth()->user()->name);
        }
        if (request()->menu == 'Popular This Week' ||request()->menu == 'Popular All Time'){
            return $bind->orderBy('view' , 'desc');
        }
        if (request()->menu == 'Solved'){
            return $bind->where('status' , 1);
        }
        if (request()->menu == 'No Replies Yet'){
            return $bind->where('comment' , 0);
        }
/*        if (request()->menu == 'Leaderboard'){
            return $bind->orderBy('comment' , 0);
        }*/
    }
}
