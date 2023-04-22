<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Services\StoryService;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    use HttpResponses;

    private $service;

    public function __construct(StoryService $storyService)
    {
        $this->service = $storyService;
    }

    public function index(Request $request)
    {
        if ($request->user()->cant('viewAny', Story::class)) {
            $this->error('Unauthorized', 403);
        }

        $query = $request->search;

        try {
            $stories = $this->service->findAllStories($query);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success($stories, 'There All Your Stories');
    }

    public function show(Story $story)
    {
        if (Auth::user()->cant('view', $story)) {
            return $this->error('Unauthorized', 403);
        }

        try {
            $result = $this->service->findStoryById($story);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success($result, 'This is your Story');
    }
}
