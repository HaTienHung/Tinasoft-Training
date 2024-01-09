<?php

namespace App\Repositories;

use App\Models\Class_;
use App\Models\Classes;
use App\Models\ClassUser;
use App\Models\User;
use Storage;

class RepositoryAbstract implements RepositoryInterface
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
        if ($user->avatar && $user->avatar !== 'default-avatar.png') {
            Storage::delete('public/' . $user->avatar);
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
        if ($user->avatar && $user->avatar !== 'default-avatar.png') {
            // Xoá file ảnh nếu tồn tại
            Storage::delete('public/' . $user->avatar);
        }

        // Xoá người dùng
        return $user->delete($id);
    }
    //Handle class
    public function getAll()
    {
        return Classes::all();
    }
    public function destroyClassByID(int $id)
    {
        $class = Classes::find($id);
        if (!$class) {
            // Xử lý khi lớp không tồn tại
            // Ví dụ: return một thông báo lỗi hoặc thực hiện một hành động khác
            return response()->json(['error' => 'Class not found'], 404);
        }

        //Xoá lớp
        return $class->delete($id);
    }
    public function getClassInfo(int $id)
    {
        $class = Classes::find($id);
        if (!$class) {
            // Xử lý khi lớp không tồn tại
            // Ví dụ: return một thông báo lỗi hoặc thực hiện một hành động khác
            return response()->json(['error' => 'Class not found'], 404);
        }
        $enrolledUsers = $class->enrolledUsers()->get();
        return $enrolledUsers;
    }
    //Class User
    public function createClassUser(array $data)
    {
        return ClassUser::create($data);
    }
    public function removeClassUser(int $user_id, int $class_id)
    {
        $class = Classes::find($class_id);
        return $class->enrolledUsers()->wherePivot('class_id', $class_id)->detach($user_id);
    }
}
