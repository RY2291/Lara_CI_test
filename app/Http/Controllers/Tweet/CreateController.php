<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Services\TweetService;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request, TweetService $tweetService)
    {
        $tweetService->saveTweet(
            $request->user_id(),
            $request->tweet(),
            $request->images(),
        );

        return redirect()->route('tweet.index');
    }
}
