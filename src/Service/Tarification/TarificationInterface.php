<?php

namespace App\Service\Tarification;

use App\Entity\User;

interface TarificationInterface
{
    public function compute(User $user): int;

}