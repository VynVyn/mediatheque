<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;
use App\Entity\Document;

class CounterReadDocumentEvent extends Event
{

    public const NAME = 'document.read';


    public function __construct(private Document $doc)
    {
    }


    public function getTarget(): Document
    {
        return $this->doc;
    }
}