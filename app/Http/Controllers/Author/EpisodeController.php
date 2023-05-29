<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Services\EpisodeService;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function create()
    {
        return view('author.episode.create');
    }

    public function show(Episode $episode)
    {
        try {
            $result = EpisodeService::findEpisodeById($episode);
        } catch (\Exception $error) {
            return redirect()->route('author.home');
        }

        return view('author.episode.show', [
            'episode' => $result,
        ]);
    }
}
