<?php

namespace App\Factory;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<User>
 *
 * @method static User|Proxy createOne(array $attributes = [])
 * @method static User[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static User|Proxy find(object|array|mixed $criteria)
 * @method static User|Proxy findOrCreate(array $attributes)
 * @method static User|Proxy first(string $sortedField = 'id')
 * @method static User|Proxy last(string $sortedField = 'id')
 * @method static User|Proxy random(array $attributes = [])
 * @method static User|Proxy randomOrCreate(array $attributes = [])
 * @method static User[]|Proxy[] all()
 * @method static User[]|Proxy[] findBy(array $attributes)
 * @method static User[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static User[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static UserRepository|RepositoryProxy repository()
 * @method User|Proxy create(array|callable $attributes = [])
 */
final class UserFactory extends ModelFactory
{
    public function __construct(private UserPasswordHasherInterface $PasswordHasher)
    {
        parent::__construct();

    }
    public function withLogin(?string $login = null): self
    {
        if(null === $login) {
            $login = self::faker()->unique()->email();
        }
        return $this->addState(['email'=> $login]);
    }

    public function withPassword(?string $password = null): self
    {
        if(null === $password) {
            $password = self::faker()->password();
        }
        return $this->addState(['password'=> $password]);
    }

    public function admin(string $role = null): self
    {
        return $this->addState(['roles'=> [$role]]);
    }

    protected function getDefaults(): array
    {
        return [
            'email' => self::faker()->email(),
            'roles' => self::faker()->shuffleArray(['ROLE_USER']),
            'password' => self::faker()->password(),
            'firstName' => self::faker()->firstName(),
            'lastName' => self::faker()->lastName(),
            'registrationDate' => self::faker()->dateTime(), // TODO add DATETIME ORM type manually
            'birthday' => self::faker()->dateTime(), // TODO add DATETIME ORM type manually
        ];
    }

    protected function initialize(): self
    {
        return $this
        ->afterInstantiate(function(User $user){
            $user->setPassword($this->PasswordHasher->hashPassword($user, $user->getPassword()));
        })
        ;
    }

    protected static function getClass(): string
    {
        return User::class;
    }
}
