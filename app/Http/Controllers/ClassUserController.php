<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\User;
use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;

class ClassUserController extends Controller
{
    //
    private $abstractRepository;

    public function __construct(RepositoryInterface $abstractRepository)
    {
        $this->abstractRepository = $abstractRepository;
    }
    public function index()
    {
        $users = User::all();
        $classes = Classes::all();

        return view('ClassUser.addClassUser', ['users' => $users, 'classes' => $classes]);
    }
    public function create(Request $request)
    {
        try {
            $userClassData = $request->validate([
                'user_id' => 'required',
                'class_id' => 'required',
            ]);

            $user = $this->abstractRepository->createClassUser($userClassData);
            // Thêm thành công, bạn có thể thực hiện các hành động khác ở đây.
            return redirect(url()->previous())->with('success', 'Add user successful');
        } catch (\Exception $e) {
            // Xử lý khi có lỗi, bạn có thể trả về thông báo lỗi hoặc thực hiện các hành động khác
            return redirect(url()->previous())->with('error', 'Failed to add users. You are already in this class or please review your information and try again.');
        }
    }
    public function removeClassUser(int $user_id, int $class_id)
    {
        try {
            $this->abstractRepository->removeClassUser($user_id, $class_id);
            return redirect(url()->previous())->with('success', 'Remove user successful');
        } catch (\Exception $e) {
            return redirect(url()->previous())->with('error', 'Failed to remove user.');
        }
    }
}
