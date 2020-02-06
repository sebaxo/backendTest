<?php


namespace App\Domain;


use APP\UserRepository\UserRepositoryInterface;
use App\ViewModels\UserVM;

class AutenticationDomain implements AutenticationDomainInterface
{
    /**@var UserRepositoryInterface**/
    private $repository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function log(UserVM $userVM):string {
        $user = $this->repository->getUserByName($userVM->getUserName());
        if($user != null){

        }
    }
}
