<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStoryRequest;
use App\Http\Requests\UpdateStoryRequest;
use App\Models\Story;
use App\Services\StoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        return view('author.story.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.story.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoryRequest $request)
    {
        $validated = $request->validated();
        $cover = $request->file('cover');

        try {
            $story = StoryService::addStory($validated, $cover);
        } catch (\Exception $error) {
            return back()->with('failed', 'Cerita gagal ditambah!');
        }

        if (! $story) {
            return back()->with('failed', 'Cerita gagal ditambah!');
        }

        return redirect()->route('author.story.show', $story->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        $result = StoryService::findStoryById($story);

        return view('author.story.show', [
            'story' => $result,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Story $story)
    {
        return view('author.story.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoryRequest $request, Story $story)
    {
        $validated = $request->validated();
        $cover = $request->file('cover');

        try {
            StoryService::changeStory($validated, $cover, $story);
        } catch (\Exception $error) {
            return back()->with('failed', 'Cerita gagal diubah!');
        }

        return redirect()->route('author.story.show', $story->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Story $story)
    {
        $response = StoryService::deleteStory($story);

        if (! $response) return back()->with('failed', 'Cerita gagal dihapus!');

        return redirect()->route('author.story.index');
    }
}
