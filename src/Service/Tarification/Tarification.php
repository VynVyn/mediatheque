<?php

namespace App\Service\Tarification;

class Tarification
{
    private array $tarifications;

    public function __construct(iterable $tarifications)
    {
        $this->tarifications = $tarifications instanceof \Traversable ? iterator_to_array($tarifications) : $tarifications;

        // $tarificationTwo = $tarifications['tarification_two'];
    }

    public function getTarifications(): array
    {
        return $this->tarifications;
    }
} 