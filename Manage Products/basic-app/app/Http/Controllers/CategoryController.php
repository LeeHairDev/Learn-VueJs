<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        $products = Category::orderBy('name')->get();
        return CategoryResource::collection($products);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    protected function validateRequest()
    {
        return  request()->validate([
            'name' => 'required|min:10|max:255',
        ]);
    }
    public function store()
    {
        $data = $this->validateRequest();

        $data = request()->all();

        $category = Category::create($data);

        return new CategoryResource($category);
    }

    public function update(Category $category)
    {
        $data = $this->validateRequest();

        $data = request()->all();

        $category->update($data);

        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->noContent();
    }
}