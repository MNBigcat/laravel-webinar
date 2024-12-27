<?php

namespace App\Http\Controllers\Crud;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Contracts\CrudInterface;
use App\Http\Requests\Users\UpdateRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::query()->get();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CrudInterface $crud): RedirectResponse
    {
        $crud->create($request->all());
        return redirect()->route('users.index')->with('success', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user, CrudInterface $crud): RedirectResponse
    {
        $crud->update($user, $request->validated());
        return redirect()->route('users.index')->with('success', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, CrudInterface $crud): RedirectResponse
    {
        $crud->delete($user);
        return redirect()->route('users.index')->with('success', 'success');
    }

}
