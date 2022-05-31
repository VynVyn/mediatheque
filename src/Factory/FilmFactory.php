<?php

namespace App\Factory;

use App\Entity\Film;
use App\Repository\FilmRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Film>
 *
 * @method static Film|Proxy createOne(array $attributes = [])
 * @method static Film[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Film|Proxy find(object|array|mixed $criteria)
 * @method static Film|Proxy findOrCreate(array $attributes)
 * @method static Film|Proxy first(string $sortedField = 'id')
 * @method static Film|Proxy last(string $sortedField = 'id')
 * @method static Film|Proxy random(array $attributes = [])
 * @method static Film|Proxy randomOrCreate(array $attributes = [])
 * @method static Film[]|Proxy[] all()
 * @method static Film[]|Proxy[] findBy(array $attributes)
 * @method static Film[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Film[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static FilmRepository|RepositoryProxy repository()
 * @method Film|Proxy create(array|callable $attributes = [])
 */
final class FilmFactory extends ModelFactory
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
            'title' => self::faker()->text(10),
            'time' => self::faker()->datetime(), 
            'releaseDate' => self::faker()->dateTime('now -6month'),
            'langues' => LangueFactory::randomRange(2, 4),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Film $film): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Film::class;
    }
}
