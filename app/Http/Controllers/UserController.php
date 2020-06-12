<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getAll()
    {
        $users = $this->userService->getAllUser();
        return view('users.list', compact('users'));
    }

    public function create()
    {
        return view('users.add');
    }

    public function store(CreateUserRequest $request)
    {
        $this->userService->create($request);
        return redirect()->route('users.list');
    }

    public function delete($id)
    {
        $user = $this->userService->delete($id);
        return redirect()->route('users.list');
    }

    public function showFormChangePassword($id)
    {
        $user = $this->userService->findById($id);
        return view('users.change-password', compact('user'));
    }

    public function changePassword(Request $request, $id)
    {
        $user = $this->userService->findById($id);
        $this->userService->changePassword($user, $request);
        session()->flash('success', 'change password success!');
        return redirect()->route('users.list');
    }

    public function update($id)
    {
        $user = $this->userService->findById($id);
        return view('users.edit', compact('user'));

    }

    public function edit(Request $request, $id)
    {
        $user = $this->userService->findById($id);
        $this->userService->update($user, $request);
        session()->flash('success', 'change success!');
        return redirect()->route('users.list');

    }

    public function search(Request $request)
    {
        $users = $this->userService->searchByKeyword($request);
        return view('users.list', compact('users'));
    }

}
