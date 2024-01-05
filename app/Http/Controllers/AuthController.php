<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Repositories\AuthRepositoryInterface;
use Auth;

class AuthController extends Controller
{
    //
    private $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register_form()
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
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra file ảnh hợp lệ
            ]);
            // Lưu avatar
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $avatarPath = $avatar->store('avatars', 'public'); // Lưu vào thư mục 'avatars' trong storage/app/public
                $userData['avatar'] = $avatarPath;
            } else {
                // Nếu người dùng không tải lên ảnh, sử dụng ảnh mặc định
                $userData['avatar'] = 'default-avatar.png'; // Thay đổi thành tên file ảnh mặc định thực tế
            }

            $user = User::create($userData);

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

        if (auth()->attempt($credentials)) {
            return redirect('/dashboard');
        } else {
            return redirect('/login');
        }
        // return ['status' => 'error', 'message' => 'Invalid credentials'];

        // Nếu đăng nhập thất bại, trả về thông điệp lỗi
        // return response()->json();
    }

    public function getAllUsers(Request $request, $role_name)
    {
        if ($role_name === 'user') {
            $role_id = 1;
        } else if ($role_name === 'instructor') {
            $role_id = 2;
        } else {
            abort(404);
        }

        $allUsers = $this->authRepository->getUsersByRole($role_id);

        $response = [
            'count' => count($allUsers),
            'data' => $allUsers,
        ];

        // return response()->json($response, 200);
        return view('userList', ['allUsers' => $allUsers, 'role_name' => $role_name]);
    }
    public function createUser(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|between:5,50',
                'email' => 'required|email|between:5,50',
                'password' => 'required|string|between:6,50',
                'phone_number' => 'required|string|max:10',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra file ảnh hợp lệ
                'role_id' => 'required',
            ]);
            // Lưu avatar
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $avatarPath = $avatar->store('avatars', 'public'); // Lưu vào thư mục 'avatars' trong storage/app/public
                $userData['avatar'] = $avatarPath;
            } else {
                // Nếu người dùng không tải lên ảnh, sử dụng ảnh mặc định
                $userData['avatar'] = 'default-avatar.png'; // Thay đổi thành tên file ảnh mặc định thực tế
            }

            $user = $this->authRepository->createUser($data);

            // Thêm thành công, bạn có thể thực hiện các hành động khác ở đây.
            return redirect('/login')->with('success', 'Add user successful');
        } catch (\Exception $e) {
            // Xử lý khi có lỗi, bạn có thể trả về thông báo lỗi hoặc thực hiện các hành động khác
            return redirect('/login')->with('error', 'Failed to add user. Please review the provided information and try again.');
        }
    }
    public function editUserByID(Request $request, int $id)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|between:5,50',
                'email' => 'required|email|between:5,50',
                'password' => 'required|string|between:6,50',
                'phone_number' => 'required|string|max:10',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra file ảnh hợp lệ
                'role_id' => 'required',
            ]);
            // Lưu avatar
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $avatarPath = $avatar->store('avatars', 'public'); // Lưu vào thư mục 'avatars' trong storage/app/public
                $userData['avatar'] = $avatarPath;
            } else {
                // Nếu người dùng không tải lên ảnh, sử dụng ảnh mặc định
                $userData['avatar'] = 'default-avatar.png'; // Thay đổi thành tên file ảnh mặc định thực tế
            }
            $user = $this->authRepository->editUserByID($id, $data);
            return redirect('/dashboard')->with('success', 'Update user successful');
        } catch (\Exception $e) {
            return redirect('/dashboard')->with('error', 'Failed to update user. Please review the provided information and try again.');
        }
    }
    public function editView(User $user)
    {
        return view('editUser', ['user' => $user]);
    }
    public function destroyUserByID(int $id)
    {
        try {
            $this->authRepository->destroyUserByID($id);
            return redirect('/dashboard')->with('success', 'Delete user successful');
        } catch (\Exception $e) {
            return redirect('/dashboard')->with('error', 'Failed to delete user.');
        }
    }
    public function login_form()
    {
        return view('/login');
    }

    public function dashboard(Request $request)
    {
        // if (auth()->check()) {
        //     $user = auth()->user();
        //     // dd($user);
        // } else {
        //     // Người dùng chưa đăng nhập
        //     return ['message' => 'fail'];
        // }
        // dd($request->user()->role_id);
        return view('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng

        // Xoá tất cả session của người dùng
        session()->flush();

        // Hoặc xoá một số session cụ thể nếu cần
        // session()->forget('key');

        return redirect('/'); // Chuyển hướng sau khi đăng xuất
    }
}
