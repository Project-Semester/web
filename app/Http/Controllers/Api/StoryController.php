<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoryStoreRequest;
use App\Http\Requests\StoryUpdateRequest;
use App\Services\StoryService;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    use HttpResponses;

    private $service;

    public function __construct(StoryService $storyService)
    {
        $this->service = $storyService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->search;

        try {
            $stories = $this->service->findAllStories($query);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }

        if ($stories == null) {
            $this->success([], "No Story yet");
        }

        return $this->success($stories, 'These all stories');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoryStoreRequest $request)
    {
        $validated = $request->validated();

        try {
            $story = $this->service->addStory($validated);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }

        return $this->success($story, 'A new story has been added', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $story = $this->service->findStoryById($id);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }

        if ($story == null) {
            return $this->error("Story not Found", 404);
        }

        return $this->success($story, 'This is the story');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoryUpdateRequest $request, string $id)
    {
        $validated = $request->validated();

        try {
            $story = $this->service->changeStory($validated, $id);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success($story, 'This is yout updated story');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->service->deleteStory($id);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), (int) $e->getCode());
        }

        return $this->success(null, 'Story was deleted successfully');
    }
}
