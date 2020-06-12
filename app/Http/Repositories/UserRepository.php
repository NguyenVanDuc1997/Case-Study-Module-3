<?php


namespace App\Http\Repositories;


use App\User;

class UserRepository
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->all();
    }

    public function find($id)
    {
        return $this->user->findOrFail($id);
    }

    public function save($user) {
        $user->save();
    }

    public function searchUser($keyword)
    {
        $result = $this->user->where('name', 'LIKE','%'. $keyword . '%')
            ->orWhere('email', 'LIKE', '%' . $keyword . '%')->get();
        return $result;
    }
}

