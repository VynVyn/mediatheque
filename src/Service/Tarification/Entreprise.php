<?php 

namespace App\Service\Tarification;

use App\Entity\User;

class Entreprise implements TarificationInterface
{
    public static function getDefaultPriority(): int
    {
        return 50;
    }

    public function compute(User $user): int
    {
            $nbPersonnes = $user->getNbEntreprise();
            
            echo "$nbPersonnes - " ;
            if($nbPersonnes > 1000)
            {
                return 8;
            }else if ($nbPersonnes > 500)
            {
                return 10;
            }
            else if ($nbPersonnes > 200)
            {
                return 12;
            }else{
                return 15;
            }
    }
}