<?php
namespace brennos\V1\Rest\Evento;

class EventoResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('Epps\V1\Rest\Evento\EventoMapper');
        return new EventoResource($mapper);
    }
}
