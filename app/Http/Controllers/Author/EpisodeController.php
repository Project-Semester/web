<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEpisodeRequest;
use App\Http\Requests\UpdateEpisodeRequest;
use App\Models\Episode;
use App\Models\Story;
use App\Services\EpisodeService;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function create(Story $story)
    {
        return view('author.episode.create', compact('story'));
    }

    public function store(StoreEpisodeRequest $request, Story $story)
    {
        $validated = $request->validated();

        try {
            $result = EpisodeService::addEpisode($validated, $story);
        } catch (\Exception $error) {
            return redirect()->route('author.story.show', $story->id);
        }

        if (! $result) return redirect()->route('author.story.show', $story->id);

        return redirect()->route('author.story.show', $story->id);
    }

    public function show(Episode $episode)
    {
        try {
            $result = EpisodeService::findEpisodeById($episode);
        } catch (\Exception $error) {
            return redirect()->route('author.story.show', $episode->story->id);
        }

        return view('author.episode.show', [
            'episode' => $result,
        ]);
    }

    public function edit(Episode $episode)
    {
        return view('author.episode.edit', compact('episode'));
    }

    public function update(UpdateEpisodeRequest $request, Episode $episode)
    {
        $validated = $request->validated();

        try {
            EpisodeService::changeEpisode($validated, $episode);
        } catch (\Exception $error) {
            return back()->with('failed', 'Cerita gagal diubah!');
        }

        return redirect()->route('author.episode.show', $episode->id);
    }

    public function destroy(Episode $episode)
    {
        $response = EpisodeService::deleteEpisode($episode);

        if (! $response) return back()->with('failed', 'Episode gagal dihapus!');

        return redirect()->route('author.story.show', $episode->story->id);
    }
}
