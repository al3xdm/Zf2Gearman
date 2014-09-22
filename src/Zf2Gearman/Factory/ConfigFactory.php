<?php
namespace Zf2Gearman\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Sinergi\Gearman\Config;

/**
 * Class ModuleOptionsFactory
 *
 * @package HandMake\Option\Factory
 */
class ConfigFactory implements FactoryInterface
{
    /**
     * @param  ServiceLocatorInterface $serviceLocator
     * @return Config
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $appConfig = $serviceLocator->get('Config');

        $servers = array();

        if (isset($appConfig['gearman']['options']['servers'])) {
            $servers = $appConfig['gearman']['options']['servers'];
        }

        $config = new Config([
            'servers' => $servers
        ]);


        return new $config;
    }
}