<?php

namespace App\Math;

use App\Repository\UserRepository;

class Calculator
{
    public function __construct(private UserRepository $userRepository){

    }
    /**
    * @dataProvider additionProvider
    */
    public function add(int $a,int $b): int
    {
        $users = $this->userRepository->findAll();
        dump($users);
        if(is_string($a) || is_string($b))
        {
            throw new \Exception("l'addition n'admet pas les chaine de caractère", 1);
            
        }
        return $a + $b;
    }
}