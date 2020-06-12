<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getAllUser()
    {
        return $this->userRepo->getAll();
    }

    public function findById($id)
    {
        return $this->userRepo->find($id);
    }

    public function changePassword($user, $request)
    {
        $user->password = Hash::make($request->password);
        $this->userRepo->save($user);
    }

    public function update($user, $request)
    {
        $user->name = $request->name;
        $user->role = $request->role;
        $this->userRepo->save($user);
    }

    public function create($request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $this->userRepo->save($user);
    }

    public function searchByKeyword($request)
    {
        $keyword = $request->keyword;
        return $this->userRepo->searchUser($keyword);
    }

    public function delete($id)
    {

    }
}

