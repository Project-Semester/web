<?php

namespace App\Services;

use App\Models\Story;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StoryService
{
    public function findAllStories(?string $query): Collection
    {
        $stories = Story::search($query)->query(function ($builder) {
            $builder->with(['category', 'user', 'likes'])->withCount(['episodes', 'comments', 'likes']);
        })->orderBy('created_at', 'desc')->get();

        return $stories;
    }

    public function findAllUserStories(?string $query): Collection
    {
        $stories = Story::search($query)->query(function ($builder) {
            $builder->with(['category', 'user', 'likes'])->withCount(['episodes', 'comments', 'likes']);
        })->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return $stories;
    }

    public function findStoryById(Story $story): Model
    {
        $story->load(['user', 'category', 'episodes' => function ($query) {
            $query->orderBy('title');
        }, 'comments.replies', 'likes'])->loadCount(['episodes', 'comments', 'likes']);

        return $story;
    }

    public function addStory(array $request): Model
    {
        $story = Story::create([
            'title' => $request['title'],
            'synopsis' => $request['synopsis'],
            'user_id' => Auth::id(),
            'category_id' => $request['category_id'],
        ]);

        return $story;
    }

    public function changeStory(array $request, Story $story): Model
    {
        $story->update($request);

        $story->with(['user', 'category', 'episodes', 'comments'])->withCount(['comments', 'likes']);

        return $story;
    }

    public function deleteStory(Story $story): bool
    {
        if ($story->delete()) {
            return true;
        }

        return false;
    }
}
