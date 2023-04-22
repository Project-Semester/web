<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodeStoreRequest;
use App\Http\Requests\EpisodeUpdateRequest;
use App\Services\EpisodeService;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorEpisodeController extends Controller
{
    use HttpResponses;

    private $service;

    public function __construct(EpisodeService $episodeService)
    {
        $this->service = $episodeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $id): JsonResponse
    {
        $query = $request->search;

        try {
            $stories = $this->service->findAllEpisode($query, $id);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 404);
        }

        return $this->success($stories, 'These All Your Episodes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EpisodeStoreRequest $request, string $id): JsonResponse
    {
        $validated = $request->validated();

        try {
            $episode = $this->service->addEpisode($validated, $id);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success($episode, 'A New Episode Created Successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $episode = $this->service->findEpisodeById($id);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        if ($episode == null) {
            return $this->error('Episode not Found', 404);
        }

        return $this->success($episode, 'This is your episode');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EpisodeUpdateRequest $request, string $id): JsonResponse
    {
        $validated = $request->validated();

        try {
            $episode = $this->service->changeEpisode($validated, $id);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success($episode, 'An Episode has been Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $response = $this->service->deleteEpisode($id);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        if (! $response) {
            return $this->error('Failed to delete episode');
        }

        return $this->success([], 'An Episode deleted successfully');
    }
}
