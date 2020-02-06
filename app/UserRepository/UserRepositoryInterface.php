<?php


namespace APP\UserRepository;



use App\ViewModels\UserVM;

interface UserRepositoryInterface
{
    public function getUserByName(string $user_name):UserVM;
}
