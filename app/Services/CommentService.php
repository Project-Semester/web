<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Episode;
use App\Models\Story;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CommentService.
 */
class CommentService
{
    public static function addStoryComment(array $request, Story $story): Model
    {
        $comment = $story->comments()->create([
            'body' => $request['body'],
            'user_id' => auth()->user()->id,
        ]);

        return $comment;
    }

    public static function addEpisodeComment(array $request, Episode $episode): Model
    {
        $comment = $episode->comments()->create([
            'body' => $request['body'],
            'user_id' => auth()->user()->id,
        ]);

        return $comment;
    }

    public static function addReplyComment(array $request, Comment $comment): Model
    {
        $reply = $comment->replies()->create([
            'body' => $request['body'],
            'user_id' => auth()->user()->id,
        ]);

        return $reply;
    }

    public static function changeComment(array $request, Comment $comment): Comment
    {
        $comment->update($request);

        return $comment;
    }

    public static function deleteComment(Comment $comment): bool
    {
        if ($comment->replies()->delete()) {
            $comment->delete();

            return true;
        }

        if ($comment->delete()) {
            return true;
        }

        return false;
    }
}
