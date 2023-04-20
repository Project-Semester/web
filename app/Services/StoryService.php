<?php

namespace App\Services;

use App\Models\Story;
use Illuminate\Support\Facades\Auth;

class StoryService
{
    public function findAllStories(?string $query)
    {
        $stories = Story::search($query)->query(function ($builder) {
            $builder->with(['category', 'user', 'likes'])->withCount(['episodes', 'comments', 'likes']);
        })->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return $stories;
    }

    public function findStoryById(string $id)
    {
        $story = Story::with(['user', 'category', 'episodes' => function ($query) {
            $query->orderBy('title');
        }, 'comments.replies', 'likes'])->withCount(['comments', 'likes'])->firstWhere('id', $id);

        return $story;
    }

    public function addStory(array $request)
    {
        $story = Story::create([
            'title' => $request['title'],
            'synopsis' => $request['synopsis'],
            'user_id' => Auth::id(),
            'category_id' => $request['category_id'],
        ]);

        return $story;
    }

    public function changeStory(array $request, string $id)
    {
        $story = Story::where('id', $id)->update($request);

        $story = Story::with(['user', 'category', 'episodes', 'comments'])->withCount(['comments', 'likes'])->firstWhere('id', $id);

        return $story;
    }

    public function deleteStory(string $id)
    {
        Story::destroy($id);
    }
}
