<?php

namespace App\DataFixtures;

use App\Factory\UserFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class UserFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $admin = UserFactory::new()
        ->admin('ROLE_ADMIN')
        ->withLogin('admin@book.fr')
        ->withPassword('password')
        ->create()
        ;

        $this->addReference('admin' , $admin->object());


        $villagois = UserFactory::new()
        ->admin('ROLE_VILLAGOIS')
        ->withLogin('villagois@book.fr')
        ->withPassword('password')
        ->create()
        ;

        $this->addReference('villagois' , $villagois->object());

        $bibliothecaire = UserFactory::new()
        ->admin('ROLE_BIBLIOTECAIRE')
        ->withLogin('bibliothecaire@book.fr')
        ->withPassword('password')
        ->create()
        ;

        $this->addReference('bibliothecaire' , $bibliothecaire->object());

        $surveillant = UserFactory::new()
        ->admin('ROLE_SURVEILLANT')
        ->withLogin('surveillant@book.fr')
        ->withPassword('password')
        ->create()
        ;

        $this->addReference('surveillant' , $surveillant->object());

        UserFactory::createMany(2);
    }

    public static function getGroups(): array
    {
    return ['group1'];
    }
}