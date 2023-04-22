<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\EpisodeService;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    use HttpResponses;

    private $service;

    public function __construct(EpisodeService $episodeService)
    {
        $this->service = $episodeService;
    }

    public function index(Request $request, string $id)
    {
        $query = $request->search;

        try {
            $episodes = $this->service->findAllEpisode($query, $id);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success($episodes, 'These all your episodes');
    }

    public function show(string $id)
    {
        try {
            $episode = $this->service->findEpisodeById($id);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success($episode, 'This is your episode');
    }
}
