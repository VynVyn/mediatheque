<?php

namespace App\DataFixtures;

use App\Factory\CategorieArtistFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieArtistFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        CategorieArtistFactory::createMany(10);
    }

}