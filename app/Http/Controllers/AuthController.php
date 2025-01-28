<?php

namespace App\Http\Controllers;

use App\Services\LoginService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct(
        private readonly LoginService $service
    )
    {        
    }

    public function login(Request $request)
    {
        return $this->service->login($request);
    }

}
