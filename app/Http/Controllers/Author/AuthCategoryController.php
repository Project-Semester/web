<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Contracts\View\View;

class AuthCategoryController extends Controller
{
    private CategoryService $service;

    public function __construct(CategoryService $categoryService)
    {
        $this->service = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('author.kategori.index');
    }

    public function show(Category $category)
    {
        return view('author.kategori.kategorishow', compact('category'));
    }
}
