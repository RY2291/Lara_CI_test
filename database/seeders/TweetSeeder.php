<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Tweet;
use App\Models\Image;
use Intervention\Image\Facades\Image as ImageCanvas;

class TweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('tweets')->insert([
        //     'content' => Str::random(100),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        if (!Storage::exists('public/images')) {
            Storage::makeDirectory('public/images');
        }
        // ダミーデータを作成
        Tweet::factory()->count(10)->create()->each(function ($tweet) {
            for ($i = 0; $i < 4; $i++) {
                // ダミー画像を生成して保存
                $filename = 'dummy_' . uniqid() . '.jpg';
                $filepath = storage_path('app/public/images/' . $filename);

                // 画像を生成 (640x480, 背景: #ccc, テキスト: "Dummy Image")
                ImageCanvas::canvas(640, 480, '#ccc')
                    ->text('Dummy Image', 320, 240, function ($font) {
                        $font->file(null); // フォントを指定
                        $font->size(1);
                        $font->color('#000');
                        $font->align('center');
                        $font->valign('middle');
                    })
                    ->save($filepath);

                // images テーブルに保存
                $image = Image::create([
                    'name' =>  $filename,
                ]);
                $tweet->images()->attach($image->id);
            }
        });
    }
}
