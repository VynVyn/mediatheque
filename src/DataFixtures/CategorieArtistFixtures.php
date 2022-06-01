<?php

namespace App\DataFixtures;

use App\Factory\CategorieArtistFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class CategorieArtistFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        CategorieArtistFactory::createMany(10);
    }

    public static function getGroups(): array
    {
    return ['group1'];
    }

}