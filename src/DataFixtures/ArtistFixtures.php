<?php

namespace App\DataFixtures;

use App\Factory\ArtistFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class ArtistFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        ArtistFactory::createMany(30);
    }

    public static function getGroups(): array
    {
    return ['group1'];
    }

}