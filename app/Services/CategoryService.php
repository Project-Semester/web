<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryService
{
    public function findAll(): Collection
    {
        $data = Category::orderBy('name')->get();

        return $data;
    }

    public function findById(string $id): Model
    {
        $data = Category::with(['stories' => function ($query) {
            $query->orderBy('title');
        }])->firstWhere('id', $id);

        return $data;
    }
}
