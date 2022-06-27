<?php

namespace App\Factory;

use App\Entity\Information;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\RepositoryProxy;
use App\Repository\InformationRepository;

/**
 * @extends ModelFactory<Information>
 *
 * @method static Information|Proxy createOne(array $attributes = [])
 * @method static Information[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Information|Proxy find(object|array|mixed $criteria)
 * @method static Information|Proxy findOrCreate(array $attributes)
 * @method static Information|Proxy first(string $sortedField = 'id')
 * @method static Information|Proxy last(string $sortedField = 'id')
 * @method static Information|Proxy random(array $attributes = [])
 * @method static Information|Proxy randomOrCreate(array $attributes = [])
 * @method static Information[]|Proxy[] all()
 * @method static Information[]|Proxy[] findBy(array $attributes)
 * @method static Information[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Information[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static InformationRepository|RepositoryProxy repository()
 * @method Information|Proxy create(array|callable $attributes = [])
 */
final class InformationFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();
    }

    // public function artist(): self
    // {
    //     return $this->addState(['id_artist' => ArtistFactory::random()]);
    // }

    // public function categorieArtist(): self
    // {
    //     return $this->addState(['id_category_artist'=> CategorieArtistFactory::random()]);
    // }

    // public function book(): self
    // {
    //     return $this->addState(['id_document'=> BookFactory::random()]);
    // }

    // public function film(): self
    // {
    //     return $this->addState(['id_document'=> FilmFactory::random()]);
    // }

    protected function getDefaults(): array
    {
        return [
            'id_artist' => ArtistFactory::random(),
            'id_category_artist' => CategorieArtistFactory::random(),
            'id_document' => FilmFactory::random(),
        ];
    }

    protected function initialize(): self
    {
        return $this
        ;
    }

    protected static function getClass(): string
    {
        return Information::class;
    }
}
