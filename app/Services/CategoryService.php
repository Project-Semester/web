<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public static function findAll(?string $query): Collection
    {
        $categories = Category::search($query)->orderBy('name')->get();

        return $categories;
    }

    public static function findById(Category $category): Category
    {
        $category->load([
            'stories' => function ($query) {
                $query->orderBy('title');
            },
        ]);

        return $category;
    }

    public static function addCategory(array $request): Category
    {
        $category = Category::create($request);

        return $category;
    }

    public static function changeCategory(array $request, Category $category): Category
    {
        $category->updateOrFail($request);

        return $category;
    }

    public static function deleteCategory(Category $category): bool
    {
        return $category->deleteOrFail();
    }
}
