<?php

namespace App\Factory;

use App\Entity\Langue;
use App\Repository\LangueRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Langue>
 *
 * @method static Langue|Proxy createOne(array $attributes = [])
 * @method static Langue[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Langue|Proxy find(object|array|mixed $criteria)
 * @method static Langue|Proxy findOrCreate(array $attributes)
 * @method static Langue|Proxy first(string $sortedField = 'id')
 * @method static Langue|Proxy last(string $sortedField = 'id')
 * @method static Langue|Proxy random(array $attributes = [])
 * @method static Langue|Proxy randomOrCreate(array $attributes = [])
 * @method static Langue[]|Proxy[] all()
 * @method static Langue[]|Proxy[] findBy(array $attributes)
 * @method static Langue[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Langue[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static LangueRepository|RepositoryProxy repository()
 * @method Langue|Proxy create(array|callable $attributes = [])
 */
final class LangueFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

    }

    protected function getDefaults(): array
    {
        return [
            'name' => self::faker()->text(8),
        ];
    }

    protected function initialize(): self
    {
        return $this
        ;
    }

    protected static function getClass(): string
    {
        return Langue::class;
    }
}
