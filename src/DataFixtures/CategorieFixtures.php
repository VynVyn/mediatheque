<?php

namespace App\DataFixtures;

use App\Factory\CategorieFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class CategorieFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        CategorieFactory::createMany(20);
    }

    public static function getGroups(): array
    {
    return ['group1'];
    }
}