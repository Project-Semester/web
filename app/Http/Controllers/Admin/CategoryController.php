<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
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
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        try {
            $category = $this->service->addCategory($validated);
        } catch (\Exception $error) {
            return back()->with('failed', 'Kategori gagal ditambah!');
        }

        if (! $category) {
            return back()->with('failed', 'Kategori gagal ditambah!');
        }

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();

        try {
            $result = $this->service->changeCategory($validated, $category);
        } catch (\Exception $error) {
            return back()->with('failed', 'Kategori gagal diubah!');
        }

        if (! $result) {
            return back()->with('failed', 'Kategori gagal diubah!');
        }

        return redirect()->route('admin.category.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $result = $this->service->deleteCategory($category);
        } catch (\Exception $error) {
            return back()->with('failed', 'Kategori gagal dihapus!');
        }

        if (! $result) {
            return back()->with('failed', 'Kategori gagal dihapus!');
        }

        return redirect()->route('admin.category.index');
    }
}
