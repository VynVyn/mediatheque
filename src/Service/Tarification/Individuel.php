<?php 

namespace App\Service\Tarification;

use DateTime;
use App\Entity\User;

class Individuel implements TarificationInterface
{
    public static function getDefaultPriority(): int
    {
        return 3;
    }

    public function compute(User $user): int
    {
        $birthday = $user->getBirthday();
        $dateNow = new DateTime('NOW');
        $age = $dateNow->diff($birthday);
        $age = $age->y;

        if($age > 18)
        {
            return 15;
        }else{
            return 10;
        }


    }

}