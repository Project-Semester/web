<?php

namespace App\Services;

use App\Models\Episode;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EpisodeService
{
    public function findAllEpisode(?string $query, string $id): Collection
    {
        $episodes = Episode::search($query)->query(function ($builder) {
            $builder->with(['story', 'likes'])->withCount(['comments', 'likes']);
        })->where('story_id', $id)->orderBy('title')->get();

        return $episodes;
    }

    public function findEpisodeById(string $id): Model
    {
        $episode = Episode::with(['comments.replies', 'likes'])->withCount(['comments', 'likes'])->firstWhere('id', $id);

        return $episode;
    }

    public function addEpisode(array $request, string $id): Collection
    {
        $episode = Episode::create([
            'title' => $request['title'],
            'body' => $request['body'],
            'story_id' => $id,
        ]);

        return $episode;
    }

    public function changeEpisode(array $request, string $id): Model
    {
        $episode = Episode::where('id', $id)->update($request);

        $episode = Episode::with(['comments.replies', 'likes'])->withCount(['comments', 'likes'])->firstWhere('id', $id);

        return $episode;
    }

    public function deleteEpisode(string $id): bool
    {
        if (Episode::destroy($id)) {
            return true;
        }

        return false;
    }
}
