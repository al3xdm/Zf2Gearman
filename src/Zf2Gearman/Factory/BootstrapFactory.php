<?php
namespace Zf2Gearman\Factory;

use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zf2Gearman\Bootstrap;

/**
 * Class ModuleOptionsFactory
 *
 * @package HandMake\Option\Factory
 */
class BootstrapFactory implements FactoryInterface
{
    /**
     * @param  ServiceLocatorInterface $serviceLocator
     * @return Bootstrap
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config  = $serviceLocator->get('Config');

        if (!isset($config['gearman'])) {
            throw new ServiceNotCreatedException('No gearman config found');
        }

        $workers = array();

        if (isset($config['gearman']['workers']) && is_array($config['gearman']['workers'])) {
            $workers = $config['gearman']['workers'];
        }

        return new Bootstrap($workers);
    }
}