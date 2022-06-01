<?php

namespace App\Factory;

use App\Entity\Artist;
use App\Repository\ArtistRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Artist>
 *
 * @method static Artist|Proxy createOne(array $attributes = [])
 * @method static Artist[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Artist|Proxy find(object|array|mixed $criteria)
 * @method static Artist|Proxy findOrCreate(array $attributes)
 * @method static Artist|Proxy first(string $sortedField = 'id')
 * @method static Artist|Proxy last(string $sortedField = 'id')
 * @method static Artist|Proxy random(array $attributes = [])
 * @method static Artist|Proxy randomOrCreate(array $attributes = [])
 * @method static Artist[]|Proxy[] all()
 * @method static Artist[]|Proxy[] findBy(array $attributes)
 * @method static Artist[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Artist[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ArtistRepository|RepositoryProxy repository()
 * @method Artist|Proxy create(array|callable $attributes = [])
 */
final class ArtistFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'firstName' => self::faker()->firstName(),
            'lasteName' => self::faker()->lastName(),
            'birthday' => self::faker()->dateTime(), // TODO add DATETIME ORM type manually
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Artist $artist): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Artist::class;
    }
}
