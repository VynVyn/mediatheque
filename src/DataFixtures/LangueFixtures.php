<?php

namespace App\DataFixtures;

use App\Factory\LangueFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class LangueFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        LangueFactory::createMany(40);
    }

    public static function getGroups(): array
    {
    return ['group1'];
    }
}