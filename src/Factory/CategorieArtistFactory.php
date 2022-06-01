<?php

namespace App\Factory;

use App\Entity\CategorieArtist;
use App\Repository\CategorieArtistRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<CategorieArtist>
 *
 * @method static CategorieArtist|Proxy createOne(array $attributes = [])
 * @method static CategorieArtist[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static CategorieArtist|Proxy find(object|array|mixed $criteria)
 * @method static CategorieArtist|Proxy findOrCreate(array $attributes)
 * @method static CategorieArtist|Proxy first(string $sortedField = 'id')
 * @method static CategorieArtist|Proxy last(string $sortedField = 'id')
 * @method static CategorieArtist|Proxy random(array $attributes = [])
 * @method static CategorieArtist|Proxy randomOrCreate(array $attributes = [])
 * @method static CategorieArtist[]|Proxy[] all()
 * @method static CategorieArtist[]|Proxy[] findBy(array $attributes)
 * @method static CategorieArtist[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static CategorieArtist[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static CategorieArtistRepository|RepositoryProxy repository()
 * @method CategorieArtist|Proxy create(array|callable $attributes = [])
 */
final class CategorieArtistFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

    }

    protected function getDefaults(): array
    {
        return [
            'name' => self::faker()->firstNameMale(),
        ];
    }

    protected function initialize(): self
    {
        return $this
        ;
    }

    protected static function getClass(): string
    {
        return CategorieArtist::class;
    }
}
