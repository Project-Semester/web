<?php

namespace App\Services;

use App\Models\Story;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class StoryService
{
    public static function findAllStories(?string $query): Collection
    {
        $stories = Story::search($query)->query(function ($builder) {
            $builder->with(['category', 'user', 'like', 'likes'])->withCount(['episodes', 'comments', 'likes']);
        })->orderBy('created_at', 'desc')->get();

        return $stories;
    }

    public static function findAllUserStories(?string $query): Collection
    {
        $stories = Story::search($query)->query(function ($builder) {
            $builder->with(['category', 'user', 'likes'])->withCount(['episodes', 'comments', 'likes']);
        })->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return $stories;
    }

    public static function findStoryById(Story $story): Story
    {
        $story->load([
            'user',
            'category',
            'like',
            'episodes' => function ($query) {
                $query->orderBy('title');
            },
            'comments' => function ($query) {
                $query->with([
                    'user',
                    'like', 
                    'replies' => function($query) {
                        $query->with(['like', 'user'])->withCount('likes');
                    }, 
                ])->withCount('likes');
            }
        ])->loadCount(['episodes', 'comments', 'likes']);

        return $story;
    }

    public static function addStory(array $request): Story
    {
        $story = Story::create([
            'title' => $request['title'],
            'synopsis' => $request['synopsis'],
            'user_id' => Auth::id(),
            'category_id' => $request['category_id'],
        ]);

        $story->load('category');

        return $story;
    }

    public static function changeStory(array $request, Story $story): Story
    {
        $story->update($request);

        $story->load(['user', 'category', 'episodes', 'comments'])->loadCount(['comments', 'likes']);

        return $story;
    }

    public static function deleteStory(Story $story): bool
    {
        return $story->delete();
    }
}
