<?php

namespace App\Services;

use App\Models\Story;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StoryService
{
    public static function findAllStories(?string $query): Collection
    {
        $stories = Story::search($query)->query(function ($builder) {
            $builder->with(['category', 'user', 'like'])->withCount(['episodes', 'comments', 'likes']);
        })->orderBy('created_at', 'desc')->get();

        return $stories;
    }

    public static function findAllUserStories(?string $query): Collection
    {
        $stories = Story::search($query)->query(function ($builder) {
            $builder->with(['category', 'like'])->withCount(['episodes', 'comments', 'likes']);
        })->where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();

        return $stories;
    }

    public static function findStoryById(Story $story): Story
    {
        $story->load([
            'category',
            'like',
            'episodes' => function ($query) {
                $query->orderBy('title');
            },
            'comments' => function ($query) {
                $query->with([
                    'user',
                    'like',
                    'replies' => function ($query) {
                        $query->with(['like', 'user'])->withCount(['likes']);
                    },
                ])->withCount(['replies', 'likes']);
            },
        ])->loadCount(['episodes', 'comments', 'likes']);

        return $story;
    }

    public static function addStory(array $request, ?UploadedFile $image): Story
    {
        if ($image) {
            $request['image'] = $image->store('image');
        }

        $story = Story::create([
            'title' => $request['title'],
            'synopsis' => $request['synopsis'],
            'image' => $request['image'],
            'user_id' => auth()->id(),
            'category_id' => $request['category_id'],
        ]);

        $story->load('category');

        return $story;
    }

    public static function changeStory(array $request, ?UploadedFile $image, Story $story): Story
    {
        if ($image) {
            if ($story->image) {
                Storage::move($story->image, $image);
            }

            $request['image'] = $image->store('image');
        }

        $story->updateOrFail($request);

        $story->load(['category', 'episodes', 'comments'])->loadCount(['comments', 'likes']);

        return $story;
    }

    public static function deleteStory(Story $story): bool
    {
        Storage::delete($story->image);

        return $story->deleteOrFail();
    }
}
