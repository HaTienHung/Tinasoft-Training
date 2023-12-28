<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AuthRepositoryInterface;

class AuthController extends Controller
{
    //
    private $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function registerForm()
    {
        return view('/register');
    }

    public function register(Request $request)
    {
        try {
            $userData = $request->validate([
                'name' => 'required|string|between:5,50',
                'email' => 'required|email|between:5,50',
                'password' => 'required|string|between:6,50',
                'phone_number' => 'required|string|max:10',
            ]);

            $user = $this->authRepository->register($userData);

            return response()->json(['message' => 'Success'], 201);
            //return respones()->json($user,201);
        } catch (\Exception $e) {
            // Xử lý lỗi, bạn có thể log lỗi hoặc trả về thông báo lỗi cụ thể
            return response()->json(['message' => 'Fail', 'error' => $e->getMessage()], 400);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $result = $this->authRepository->login($credentials);

        return response()->json($result);
    }

    public function getAllUsers(Request $request)
    {
        $allUsers = $this->authRepository->getAllUsers();

        $response = [
            'count' => count($allUsers),
            'data' => $allUsers,
        ];

        // return response()->json($response, 200);
        return view('usersList', ['allUsers' => $allUsers]);
    }

    public function loginForm()
    {
        return view('/login');
    }
}
