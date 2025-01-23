<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweets = $tweetService->getTweets();
        // Illuminate\Database\Eloquent\Collection
        // select * from `tweets` order by `created_at` desc
        // orderByはクエリビルダ
        // $tweets = Tweet::orderBy('created_at', 'desc')->get();

        // Illuminate\Database\Eloquent\Collection 
        // select * from `tweets`
        // $tweets = Tweet::all()->sortByDesc('created_at');

        // dd($tweets);
        return view('tweets.index')->with('tweets', $tweets);
    }
}
