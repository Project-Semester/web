<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Services\EpisodeService;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function show(Episode $episode)
    {
        try {
            $result = EpisodeService::findEpisodeById($episode);
        } catch (\Exception $error) {
            return redirect()->route('admin.home');
        }

        return view('admin.episode.show', [
            'episode' => $result
        ]);
    }
}
