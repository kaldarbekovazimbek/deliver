<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return new UserCollection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validData = $request->validated();

        $user = User::query()->create($validData);

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $userId): UserResource
    {

        $user = User::query()->find($userId)->first();
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, int $userId): UserResource
    {
        $validData = $request->validated();
        $user = User::query()->find($userId)->first();
        $user->update($validData);

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $userId)
    {
        $user = User::query()->find($userId);

        $user->delete();
    }
}
