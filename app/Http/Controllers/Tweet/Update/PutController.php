<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, TweetService $tweetService)
    {
        $tweet = Tweet::where('id', $request->id())->firstOrFail();
        if (!$tweetService->checkOwnTweet($request->user()->id, $tweet->id)) {
            throw new AccessDeniedHttpException();
        }
        $tweet->content = $request->tweet();
        $tweet->save();

        return redirect()->route('tweet.update.index', ['tweetId' => $tweet->id])
            ->with('feedback.success', '編集が完了！');
    }
}
