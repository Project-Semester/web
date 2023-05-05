<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Episode;
use App\Models\Story;
use App\Services\LikeService;
use App\Traits\HttpResponses;
use Symfony\Component\HttpFoundation\JsonResponse;

class LikeController extends Controller
{
    use HttpResponses;

    private $service;

    public function __construct(LikeService $likeService)
    {
        $this->service = $likeService;
    }

    public function story(Story $story): JsonResponse
    {
        if (auth()->user()->cant('like', Story::class)) {
            return $this->error('Unauthorize', 403);
        };

        try {
            $like = $this->service->likeStory($story);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success($like, 'Like or Unlike Success');
    }

    public function episode(Episode $episode)
    {
        if (auth()->user()->cant('like', $episode)) {
            return $this->error('Unauthorize', 403);
        };
        
        try {
            $like = $this->service->likeEpisode($episode);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success($like, 'Like or Unlike Success');
    }

    public function comment(Comment $comment)
    {
        if (auth()->user()->cant('like', $comment)) {
            $this->error('Unauthorized', 403);
        }

        try {
            $like = $this->service->likeComment($comment);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success($like, 'Like or Unlike Success');
    }
}
