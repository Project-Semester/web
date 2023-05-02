<?php

namespace App\Services;

use App\Models\Episode;
use App\Models\Story;
use Illuminate\Database\Eloquent\Collection;

class EpisodeService
{
    public static function findAllEpisode(?string $query, Story $story): Collection
    {
        $episodes = Episode::search($query)->query(function ($builder) {
            $builder->with(['story', 'likes'])->withCount(['comments', 'likes']);
        })->where('story_id', $story->id)->orderBy('title')->get();

        return $episodes;
    }

    public static function findEpisodeById(Episode $episode): Episode
    {
        $episode->load(['comments.replies', 'likes'])->loadCount(['comments', 'likes']);

        return $episode;
    }

    public static function addEpisode(array $request, Story $story): Episode
    {
        $episode = Episode::create([
            'title' => $request['title'],
            'body' => $request['body'],
            'story_id' => $story->id,
        ]);

        return $episode;
    }

    public static function changeEpisode(array $request, Episode $episode): Episode
    {
        $episode->update($request);

        $episode->load(['comments.replies', 'likes'])->loadCount(['comments', 'likes']);

        return $episode;
    }

    public static function deleteEpisode(Episode $episode): bool
    {
        if ($episode->delete()) {
            return true;
        }

        return false;
    }
}
