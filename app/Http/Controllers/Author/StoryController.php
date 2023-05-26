<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Services\StoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
    public function index(): View | RedirectResponse
    {
        try {
            $stories = $this->service->findAllStories(null);
        } catch (\Exception $error) {
            return redirect()->route('bacaCerita');
        }

        if (! $stories) return redirect()->route('bacaCerita');

        return view('author.bacaCerita', compact('stories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stories = Story::findOrFail($id);
        $komentar = $stories->komentar;

        return view('bacaCerita', compact('stories', 'komentar'));
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
