<?php

namespace App\Http\Controllers;

use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    //
    private $abstractRepository;

    public function __construct(RepositoryInterface $abstractRepository)
    {
        $this->abstractRepository = $abstractRepository;
    }
    public function getAll()
    {
        $classes = $this->abstractRepository->getAll();

        // dd($classes);

        return view('ClassUser.classList', ['classes' => $classes]);
    }
    public function destroyClassByID(int $id)
    {
        try {
            $this->abstractRepository->destroyClassByID($id);
            return redirect(url()->previous())->with('success', 'Delete user successful');
        } catch (\Exception $e) {
            return redirect(url()->previous())->with('error', 'Failed to delete user.');
        }
    }
    public function getClassInfo(int $id)
    {
        $enrolledUsers = $this->abstractRepository->getClassInfo($id);

        return view('ClassUser.classInfo', ['enrolledUsers' => $enrolledUsers, 'class_id' => $id]);
    }
}
