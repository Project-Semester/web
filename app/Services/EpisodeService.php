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
            $builder->with(['story', 'like'])->withCount(['comments', 'likes']);
        })->where('story_id', $story->id)->orderBy('title')->get();

        return $episodes;
    }

    public static function findEpisodeById(Episode $episode): Episode
    {
        $episode->load([
            'like',
            'comments' => function ($query) {
                $query->with([
                    'replies' => function ($query) {
                        $query->with('like', 'user')->withCount('likes');
                    }, 'like', 'user',
                ])->withCount(['replies', 'likes']);
            },
        ])->loadCount(['comments', 'likes']);

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
        $episode->updateOrFail($request);

        $episode->load(['comments.replies', 'likes'])->loadCount(['comments', 'likes']);

        return $episode;
    }

    public static function deleteEpisode(Episode $episode): bool
    {
        return $episode->deleteOrFail();
    }
}
