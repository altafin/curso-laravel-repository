<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repository;
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->repository
            ->orderBy('id')
            ->paginate();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateUserRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = $this->repository->store($data);

        return redirect()
            ->route('users.index')
            ->withSuccess('Usuário Cadastrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$user = $this->repository->findWhereFirst('id', $id))
            return redirect()->back();

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!$user = $this->repository->findbyId($id))
            return redirect()->back();
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateUserRequest $request, string $id)
    {
        $data = $request->all();
        if ($request->password)
            $data['password'] = bcrypt($data['password']);
        else
            unset($data['password']);

        $this->repository->update($id, $data);

        return redirect()
            ->route('users.index')
            ->withSuccess('Usuário atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->repository->delete($id);
        return redirect()
            ->route('users.index')
            ->withSuccess('Deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $users = $this->repository->search($request);
        return view('admin.users.index', compact('users', 'filters'));
    }

}
