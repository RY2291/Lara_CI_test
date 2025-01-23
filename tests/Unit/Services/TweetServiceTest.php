<?php

namespace Tests\Unit\Services;

use Tests\TestCase; // LaravelのTestCaseを利用
use App\Services\TweetService;
use Mockery;
use Illuminate\Support\Facades\DB;

class TweetServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     * @runInSeparateProcess
     * @return void
     */
    public function test_check_own_tweet(): void
    {
        // クエリログを有効化
        DB::enableQueryLog();

        // モックの定義
        $mock = Mockery::mock(('alias:App\Models\Tweet'));
        $mock->shouldReceive('where->first')->andReturn((object)[
            'id' => 1,
            'user_id' => 1,
        ]);

        // サービスのインスタンス化とメソッドの実行
        $tweetService = new TweetService;
        $result = $tweetService->checkOwnTweet(1, 1);
        $this->assertTrue($result);

        $result = $tweetService->checkOwnTweet(2, 1);
        $this->assertFalse($result);

        // クエリログの確認
        $queries = DB::getQueryLog();
        $this->assertEmpty($queries, 'DBクエリが実行されていません');
    }
}
