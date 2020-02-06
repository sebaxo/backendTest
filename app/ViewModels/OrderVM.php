<?php


namespace App\ViewModels;


class OrderVM
{
    private $id;
    private $priority;
    private $address;
    private $user;

    public function __construct(int $id, int $priority, string $address, string $user)
    {
        $this->id = $id;
        $this->priority = $priority;
        $this->address = $address;
        $this->user = $user;
    }

    public function getId():int {
        return $this->id;
    }

    public function getPriority():int {
        return $this->priority;
    }

    public function getAddress():int {
        return $this->address;
    }

    public function getUser():int {
        return $this->user;
    }
}
