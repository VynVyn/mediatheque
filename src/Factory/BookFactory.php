<?php

namespace App\Factory;

use App\Entity\Book;
// use App\Factory\LangueFactory;
use App\Repository\BookRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Book>
 *
 * @method static Book|Proxy createOne(array $attributes = [])
 * @method static Book[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Book|Proxy find(object|array|mixed $criteria)
 * @method static Book|Proxy findOrCreate(array $attributes)
 * @method static Book|Proxy first(string $sortedField = 'id')
 * @method static Book|Proxy last(string $sortedField = 'id')
 * @method static Book|Proxy random(array $attributes = [])
 * @method static Book|Proxy randomOrCreate(array $attributes = [])
 * @method static Book[]|Proxy[] all()
 * @method static Book[]|Proxy[] findBy(array $attributes)
 * @method static Book[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Book[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static BookRepository|RepositoryProxy repository()
 * @method Book|Proxy create(array|callable $attributes = [])
 */
final class BookFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

    }

    protected function getDefaults(): array
    {
        return [
            'cote' => self::faker()->word(),
            'delicate' => self::faker()->boolean(),
            'title' => self::faker()->words(5, true),
            'numberPage' => self::faker()->randomNumber(3),
            'langue' => LangueFactory::random(),
            'categories' => CategorieFactory::randomRange(1,3),
        ];
    }

    protected function initialize(): self
    {
        return $this
        ;
    }

    protected static function getClass(): string
    {
        return Book::class;
    }
}
