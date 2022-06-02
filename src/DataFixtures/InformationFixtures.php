<?php

namespace App\DataFixtures;

use App\Entity\Information;
use App\Factory\ArtistFactory;
use App\Factory\FilmFactory;
use App\Factory\InformationFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class InformationFixtures extends Fixture implements FixtureGroupInterface

{
    public function load(ObjectManager $manager): void
    {
        $infoBook = InformationFactory::new()
        ->artist()
        ->categorieArtist()
        ->book()
        ->createMany(10)
        ;

        $infofilm = InformationFactory::new()
        ->artist()
        ->categorieArtist()
        ->film()
        ->createMany(10)
        ;

    }

    public static function getGroups(): array
    {
    return ['group2'];
    }

}