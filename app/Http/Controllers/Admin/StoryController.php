<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Services\StoryService;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        return view('admin.story.index');
    }

    public function show(Story $story)
    {
        $result = StoryService::findStoryById($story);
        
        return view('admin.story.show', [
            'story' => $result
        ]);
    }
}
