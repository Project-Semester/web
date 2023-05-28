<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Services\StoryService;
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
    public function create(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required',
            'synopsis' => 'required',
            'episode' => 'required',
            'category' => 'required',
            'isi_cerita' => 'required'
        ]);

        // Simpan artikel baru ke dalam database
        $story = new Story;
        $story->user_id = Auth::id(); // Mengambil id pengguna yang sedang terautentikasi
        $story->title = $request->input('title');
        $story->synopsis = $request->input('synopsis');
        $story->category = $request->input('category');
        $story->episodes = $request->input('episode');
        $story->isi_cerita = $request->input('isi_cerita');
        $story->tanggal = now(); // Menggunakan fungsi now() untuk mendapatkan tanggal dan waktu saat ini
        $story->save();

        // Redirect atau lakukan tindakan lainnya (sesuai kebutuhan aplikasi)
        return redirect()->route('author.tambahcerita');
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
    public function show(Story $story)
    {
        $result = StoryService::findStoryById($story);
        
        return view('author.story.show', [
            'story' => $result
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
