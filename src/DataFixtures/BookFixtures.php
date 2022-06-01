<?php

namespace App\DataFixtures;

use App\Factory\BookFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class BookFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        BookFactory::createMany(30);
    }

    public static function getGroups(): array
    {
    return ['group2'];
    }

}