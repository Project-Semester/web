<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Models\Comment;
use App\Models\Episode;
use App\Models\Story;
use App\Services\CommentService;
use App\Traits\HttpResponses;
use Symfony\Component\HttpFoundation\JsonResponse;

class CommentController extends Controller
{
    use HttpResponses;

    private $service;

    public function __construct(CommentService $commentService)
    {
        $this->service = $commentService;
    }

    public function story(CommentStoreRequest $request, Story $story): JsonResponse
    {
        $validated = $request->validated();

        try {
            $comment = $this->service->addStoryComment($validated, $story);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success($comment, 'Comment Story success', 201);
    }

    public function episode(CommentStoreRequest $request, Episode $episode): JsonResponse
    {
        $validated = $request->validated();

        try {
            $comment = $this->service->addEpisodeComment($validated, $episode);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success($comment, 'Comment Episode Success', 201);
    }

    public function reply(CommentStoreRequest $request, Comment $comment): JsonResponse
    {
        $validated = $request->validated();

        try {
            $comment = $this->service->addReplyComment($validated, $comment);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success($comment, 'Reply Success', 201);
    }

    public function update(CommentUpdateRequest $request, Comment $comment): JsonResponse
    {
        $validated = $request->validated();

        try {
            $comment = $this->service->changeComment($validated, $comment);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success($comment, "Comment updated successfully");
    }

    public function destroy(Comment $comment): JsonResponse
    {
        try {
            $this->service->deleteComment($comment);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success([], "Comment deleted successfully");
    }
}
