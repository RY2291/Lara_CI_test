<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    public function user(): object
    {
        return $this->belongsTo(User::class);
    }

    public function images(): object
    {
        return $this->belongsToMany(Image::class, 'tweet_images')
            ->using(TweetImage::class);
    }
}
