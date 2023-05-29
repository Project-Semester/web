<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStoryRequest;
use App\Models\Story;
use App\Services\StoryService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    private StoryService $service;

    public function __construct(StoryService $storyService)
    {
        $this->service = $storyService;
    }

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
            $stories = $this->service->addStory($validated, $cover);
        } catch (\Exception $error) {
            return back()->with('failed', 'Kategori gagal ditambah!');
        }

        if (! $stories) {
            return back()->with('failed', 'Kategori gagal ditambah!');
        }

        return redirect()->route('author.story.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
