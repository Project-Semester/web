<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Episode;
use App\Models\Story;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class LikeService.
 */
class LikeService
{
    public static function likeStory(Story $story): Story
    {
        $like = $story->like();
        $userId = auth()->id();

        if ($like->count() > 0) {
            $like->detach($userId);
            
            $story->load('like')->loadCount('likes');
            
            return $story;
        }
        
        $like->attach($userId);

        $story->load('like')->loadCount('likes');

        return $story;
    }

    public static function likeEpisode(Episode $episode): Episode
    {
        $like = $episode->like();
        $userId = auth()->id();
        
        if ($like->count() > 0) {
            $like->detach($userId);
        
            $episode->load('like')->loadCount('likes');
            
            return $episode;
        }
        
        $like->attach($userId);
        
        $episode->load('like')->loadCount('likes');

        return $episode;
    }

    public function likeComment(Comment $comment): Comment
    {
        $like = $comment->like();
        $userId = auth()->id();

        if ($like->count() > 0) {
            $like->detach($userId);

            $comment->load('like')->loadCount('likes');

            return $comment;
        }

        $like->attach($userId);

        $comment->load('like')->loadCount('likes');

        return $comment;
    }
}
