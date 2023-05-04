<?php

namespace App\Services;
use App\Models\Story;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class LikeService.
 */
class LikeService
{
    public static function likeStory(Story $story): Collection
    {
        $like = $story->like();
        $userId = auth()->id();

        if ($like->get()->isEmpty()) {
            $like->attach($userId);

            return $like->get();
        }

        $like->detach($userId);

        return $like->get();
    }
}
