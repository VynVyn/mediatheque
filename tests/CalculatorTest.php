<?php

namespace App\Tests;

use App\Entity\User;
use App\Math\Calculator;
use PHPUnit\Framework\TestCase;
use App\Repository\UserRepository;

class CalculatorTest extends TestCase
{
    /**
    * @dataProvider donneeForTest
    */
    public function testAdd($x, $y, $z)
    {

        $repo = $this->createStub(UserRepository::class);
        $repo->method('findAll')
             ->willReturn([new User]);

        $calc = new Calculator($repo);
        $result =  $calc->add($x, $y);
        $this->assertEquals($z, $result,"La somme de {$x} et {$y} doit faire {$z}");

    }

    /**
    * @dataProvider donneeForTestString
    * @expectedException InvalidArgumentException
    */
    public function testStringAdd($x, $y, $z)
    {
        $this->expectException(\TypeError::class);

        $repo = $this->createStub(UserRepository::class);

        $calc = new Calculator($repo);
        $result =  $calc->add($x, $y);
        $this->assertEquals($z, $result,"La somme de {$x} et {$y} doit faire {$z}");

    }

    private function donneeForTest()
    {
        return [
            [30, 12, 42],
            [34, 8, 42],
            [20, 12, 32],
            [15, 45, 60],

        ];
    }

    private function donneeForTestString()
    {
        return [

            [18, 'toto', 50]

        ];
    }
}
