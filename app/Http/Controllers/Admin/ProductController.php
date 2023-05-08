<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $repository;
    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->repository->paginate();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateProductFormRequest $request)
    {
        /*
        $category = Category::find($request->category_id);
        $product = $category->products()->create($request->all());
        */
        $product = $this->repository->create($request->all());
        return redirect()
            ->route('products.index')
            ->withSuccess('Produto Cadastrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$product = $this->repository->with('category')->where('id', $id)->first())
            return redirect()->back();
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!$product = $this->repository->find($id))
            return redirect()->back();
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateProductFormRequest $request, string $id)
    {
        $this->repository
            ->find($id)
            ->update($request->all());

        return redirect()
            ->route('products.index')
            ->withSuccess('Produto atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->repository->find($id)->delete();
        return redirect()
            ->route('products.index')
            ->withSuccess('Deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $products = $this->repository
            ->with(['category'])
            ->where(function ($query) use ($request) {
                if ($request->has('name')) {
                    $filter = $request->name;
                    $query->where(function ($querySub) use ($filter) {
                        $querySub->where('name', 'LIKE', "%{$filter}%")
                            ->orWhere('description', 'LIKE', "%{$filter}%");
                    });
                }

                if ($request->has('price')) {
                    $query->Where('price', $request->price);
                }

                if ($request->category) {
                    $query->orWhere('category_id', $request->category);
                }
            })
            ->paginate();
        return view('admin.products.index', compact('products', 'filters'));
    }
}
