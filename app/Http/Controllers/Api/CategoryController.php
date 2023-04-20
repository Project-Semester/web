<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Traits\HttpResponses;

class CategoryController extends Controller
{
    use HttpResponses;

    private $service;

    public function __construct(CategoryService $categoryService)
    {
        $this->service = $categoryService;
    }

    public function index()
    {
        try {
            $categories = $this->service->findAll();
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), (int) $e->getCode());
        }

        return $this->success($categories, 'These all categories');
    }

    public function show(string $id)
    {
        try {
            $category = $this->service->findById($id);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), (int) $e->getCode());
        }

        return $this->success($category, 'This is your category and all the story it has');
    }
}
