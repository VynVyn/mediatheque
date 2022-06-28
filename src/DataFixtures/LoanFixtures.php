<?php

namespace App\DataFixtures;

use App\Factory\LoanFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class LoanFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        LoanFactory::createMany(30);
    }

    public static function getGroups(): array
    {
    return ['group2'];
    }

}