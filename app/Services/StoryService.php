<?php

namespace App\Services;

use App\Models\Story;
use Illuminate\Support\Facades\Auth;

class StoryService
{
    public function findAll()
    {
        $stories = Story::with(['category', 'user'])->withCount(['episodes', 'comments', 'likes'])->orderByDesc('created_at')->get();

        return $stories;
    }

    public function findById(string $id)
    {
        $story = Story::with(['user', 'category', 'episodes' => function ($query) {
            $query->orderBy('title');
        }, 'comments'])->withCount(['comments', 'likes'])->firstWhere('id', $id);

        return $story;
    }

    public function addStory(array $request)
    {
        $story = Story::create([
            'title' => $request['title'],
            'synopsis' => $request['synopsis'],
            'user_id' => Auth::id(),
            'category_id' => $request['category_id']
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
