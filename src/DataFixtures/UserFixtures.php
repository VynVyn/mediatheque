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

        UserFactory::createMany(2);
    }

    public static function getGroups(): array
    {
    return ['group1'];
    }
}