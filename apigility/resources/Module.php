<?php
namespace FlyingElephantService;

use Laminas\Db\Adapter\Adapter;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\ApiTools\Provider\ApiToolsProviderInterface;

class Module implements ApiToolsProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
	public function getServiceConfig()
	{
		return [
			'factories' => [
				'FlyingElephantService\Table' => function ($container) {
					$config = $container->get('config');
					$adapter = new Adapter($config['db']['adapters']['PropulsionAdapter']);
					return new TableGateway('propulsion_systems', $adapter);
				},
			],
		];
	}
    public function getAutoloaderConfig()
    {
        return [
            'Laminas\ApiTools\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }
}
