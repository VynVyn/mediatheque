<?php

namespace App\DataFixtures;

use App\Factory\LangueFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LangueFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        LangueFactory::createMany(40);
    }

}