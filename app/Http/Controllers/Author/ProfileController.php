<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Services\StoryService;
use App\Services\UserService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function index(): View
    {
        $stories = StoryService::findAllUserStories(null);

        return view('author.profile.index', compact('stories'));
    }

    public function update(UpdateUserRequest $request, Authenticatable $user): RedirectResponse
    {
        // dd($request->input());
        $validated = $request->validated();

        try {
            $result = UserService::changeUserProfile($validated, null, $user);
        } catch (\Exception $error) {
            return back()->with('failed', 'Profil gagal diubah!');
        }

        if (! $result) {
            return back()->with('failed', 'Kategori gagal diubah!');
        }

        return redirect()->route('admin.profile.index');
    }
}
