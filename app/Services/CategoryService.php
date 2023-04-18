<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function findAll()
    {
        $data = Category::orderBy('name')->get();

        return $data;
    }

    public function findById(string $id)
    {
        $data = Category::with(['stories' => function ($query) {
            $query->orderBy('title');
        }])->firstWhere('id', $id);

        return $data;
    }
}
