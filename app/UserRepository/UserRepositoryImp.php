<?php


namespace APP\UserRepository;


use App\Models\AutenticationUser;
use App\ViewModels\UserVM;

class UserRepositoryImp implements UserRepositoryInterface
{
    protected $model;

    public function __construct(AutenticationUser $autenticationUser)
    {
        $this->model = $autenticationUser;
    }

    public function getUserByName(string $user_name): UserVM
    {
        return $this->model->where('userName', $user_name)->first();
    }
}
