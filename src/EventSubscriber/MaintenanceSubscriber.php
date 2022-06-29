<?php

namespace App\EventSubscriber;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Twig\Environment;

class MaintenanceSubscriber implements EventSubscriberInterface
{
    public function __construct(private bool $maintenance, private Environment $environment) 
    {
        
    }
    
    public static function getSubscribedEvents(): array
    {
        return [
            'kernel.request' => 'onKernelRequest',
        ];
    }
    
    public function onKernelRequest(RequestEvent $event): void
    {

        if($this->maintenance){
            $page = $this->environment->load('maintenance.html.twig');
            // Compilation 
            $page = $page->render();
            //sir variable a injecté
            //=> $page = $page->render(['id'=> $id]);
            $response = new Response($page);
            $event->setResponse($response);
        }

        // if($this->maintenance){
                // recupère le contenue html d'une page
        //     $page = file_get_contents(__DIR__.'/../../templates/maintenance.html.twig');
        //     $response = new Response($page);
        //     $event->setResponse($response);
        // }
    }
}
