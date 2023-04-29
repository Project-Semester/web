<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function findAll(?string $query): Collection
    {
        $categories = Category::search($query)->orderBy('name')->get();

        return $categories;
    }

    public function findById(Category $category): Category
    {
        $category->load(['stories' => function ($query) {
            $query->orderBy('title');
        }]);

        return $category;
    }
}
