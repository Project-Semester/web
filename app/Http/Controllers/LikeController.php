<?php

namespace App\Http\Controllers;

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
        try {
            $like = $this->service->likeStory($story);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success($like, "Like or Unlike Success");
    }
}
