<?php

namespace App\DataFixtures;

use App\Factory\FilmFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class FilmFixtures extends Fixture implements FixtureGroupInterface

{
    public function load(ObjectManager $manager): void
    {
        FilmFactory::createMany(30);
    }

    public static function getGroups(): array
    {
    return ['group2'];
    }

}