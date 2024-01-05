<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthRepository implements AuthRepositoryInterface
{
    // public function register(array $userData)
    // {
    //     return User::create($userData);
    // }

    // public function login(array $credentials)
    // {
    //     if (auth()->attempt($credentials)) {
    //         // Đăng nhập thành công, không cần tạo token
    //         // $user = auth()->user();
    //         // dd($user);
    //         return ['status' => 'success', 'message' => 'Login successful'];
    //         // return redirect('/dashboard');
    //     }
    //     return ['status' => 'error', 'message' => 'Invalid credentials'];
    // }

    public function getUsersByRole($role)
    {
        return User::where('role_id', $role)->get();
    }
    public function createUser($data)
    {
        return User::create($data);
    }
    public function editUserByID(int $id, array $data)
    {
        // Lấy người dùng cần sửa từ database
        $user = User::find($id);

        // Kiểm tra xem người dùng có tồn tại không
        if (!$user) {
            // Xử lý khi người dùng không tồn tại
            // Ví dụ: return một thông báo lỗi hoặc thực hiện một hành động khác
            return response()->json(['error' => 'User not found'], 404);
        }

        // Trả về người dùng sau khi đã được sửa
        return $user->update($data);
    }
    public function destroyUserByID(int $id)
    {
        $user = User::find($id);

        // Kiểm tra xem người dùng có tồn tại không
        if (!$user) {
            // Xử lý khi người dùng không tồn tại
            // Ví dụ: return một thông báo lỗi hoặc thực hiện một hành động khác
            return response()->json(['error' => 'User not found'], 404);
        }

        // Xoá người dùng
        return $user->delete($id);
    }
    // public function getAllUsers()
    // {
    //     return $this->getUsersByRole(1);
    // }

    // public function getAllInstructors()
    // {
    //     // Giả sử role_id cho instructor là 2
    //     return $this->getUsersByRole(2);
    // }

    // public function getAllAdmins()
    // {
    //     // Giả sử role_id cho admin là 3
    //     return $this->getUsersByRole(3);
    // }
}
