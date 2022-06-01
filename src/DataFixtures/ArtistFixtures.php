<?php

namespace App\DataFixtures;

use App\Factory\ArtistFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArtistFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        ArtistFactory::createMany(30);
    }

}