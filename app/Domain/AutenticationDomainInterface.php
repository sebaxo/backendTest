<?php


namespace App\Domain;


use App\ViewModels\UserVM;

interface AutenticationDomainInterface
{
    public function log(UserVM $userVM):string ;
}
