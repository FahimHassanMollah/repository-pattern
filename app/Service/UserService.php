<?php

namespace App\Service;

use App\Models\User;
use App\Repository\UserRepository;

class UserService
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index($data)
    {
        return $this->userRepository->index($data);
    }


    public function store($data)
    {
        $data['password'] = bcrypt($data['password']);
        if ($this->isEmailExist($data['email'])) {
            return 'Email already exist';
        }
        return $this->userRepository->insert($data);
    }

    public function update($data,$user)
    {
       return $this->userRepository->update($data,$user);
    }

    public function isEmailExist($email)
    {
        return User::where('email',$email)->first();
    }
}



