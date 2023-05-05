<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategoryFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('categories')
            ->orderBy('id', 'desc')
            ->paginate();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateCategoryFormRequest $request)
    {
        DB::table('categories')->insert([
            'title'       => $request->title,
            'url'         => $request->url,
            'description' => $request->description,
        ]);
        return redirect()
            ->route('categories.index')
            ->withSuccess("Cadastro realizado com sucesso");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        if (!$category)
            return redirect()->back();
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        if (!$category)
            return redirect()->back();
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateCategoryFormRequest $request, string $id)
    {
        DB::table('categories')
            ->where('id', $id)
            ->update([
                'title'       => $request->title,
                'url'         => $request->url,
                'description' => $request->description,
            ]);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('categories.index');
    }

    public function search(Request $request) {
        $data = $request->except('_token');
        if (isset($data['search'])) {
            $categories = DB::table('categories')
                ->where('title', $data['search'])
                ->orWhere('url', $data['search'])
                ->orWhere('description', 'LIKE', "%{$data['search']}%")
                ->paginate();
        } else {
            $categories = DB::table('categories')
                ->where(function ($query) use ($data) {
                    if (isset($data['title'])) {
                        $query->where('title', $data['title']);
                    }
                    if (isset($data['url'])) {
                        $query->orWhere('url', $data['url']);
                    }
                    if (isset($data['description'])) {
                        $query->orWhere('description', 'LIKE',  "%{$data['description']}%");
                    }
                })
                ->paginate();
        }
        return view('admin.categories.index', compact('categories', 'data'));
    }
}
