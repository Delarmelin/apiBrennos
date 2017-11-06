<?php
namespace brennos;

use brennos\V1\Rest\Evento\EventoEntity;
use brennos\V1\Rest\Evento\EventoMapper;
use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => [
                'EventoTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('postgres');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new EventoEntity());
                    return new TableGateway('evento', $dbAdapter, null, $resultSetPrototype);
                },
                'Epps\\V1\\Rest\\Evento\\EventoMapper' => function ($sm) {
                    $tableGateway = $sm->get('EventoTableGateway');
                    return new EventoMapper($tableGateway);
                }
            ]
        );
    }

    public function getAutoloaderConfig()
    {
        return [
            'ZF\Apigility\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }
}
