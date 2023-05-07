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
            }
        ]);

        return $category;
    }
}
