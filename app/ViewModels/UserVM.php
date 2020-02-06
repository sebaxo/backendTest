<?php


namespace App\ViewModels;


class UserVM
{
       private $userName;
       private $password;

       public function __construct(string $userName, string $password)
       {
           $this->userName = $userName;
           $this->password = $password;
       }

        public function getUserName():string{
            return $this->userName;
        }
        public function getPassword():string{
            return $this->password;
        }
}
