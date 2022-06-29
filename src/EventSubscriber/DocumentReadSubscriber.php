<?php

namespace App\EventSubscriber;

use phpDocumentor\Reflection\Types\ArrayKey;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Filesystem\Filesystem;

class DocumentReadSubscriber implements EventSubscriberInterface
{
    public function onDocumentRead($event): void
    {
        $doc = $event->getTarget();
        if(file_exists(__DIR__.'/../../counter.json')){
                $counter = file_get_contents(__DIR__.'/../../counter.json');
                $tableau = json_decode($counter, true);
        }else{
            $tableau = [];
        }

        $id = $doc->getId();

        if (array_key_exists($id, $tableau))
        {
            $tableau [$id] ++;
        }else{
            $tableau [$id] = 1;
        }

        $newTableau = json_encode($tableau);
        file_put_contents(__DIR__.'/../../counter.json', $newTableau);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'document.read' => 'onDocumentRead',
        ];
    }
}
