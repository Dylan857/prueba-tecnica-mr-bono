<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function __construct(
        private readonly UserService $service
    )
    {        
    }

    public function index()
    {

        $response = $this->service->index();
        return response()->json([
            'message' => !$response->isEmpty() ? 'List of users' : 'Users not found',
            'data' => $response
        ], !$response->isEmpty() ? 200 : 404);

    }

    public function search(int $id)
    {
        $response = $this->service->search($id);
        return response()->json([
            'message' => $response ? 'User found' : 'User not found',
            'data' => $response
        ], $response ? 200 : 404);
    }

    public function store(StoreUser $request)
    {
        $this->service->store($request->all());
        return response()->json([
            'message' => 'User created'
        ], 201);
    }

    public function update(int $id, UpdateUser $request)
    {
        $this->service->update($id, $request->all());
        return response()->json([
            'message' => 'User updated'
        ]);
    }
}
