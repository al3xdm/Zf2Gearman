<?php

namespace Zf2Gearman\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zf2Gearman\Controller\GearmanWorkerController;

/**
 * Class Create
 *
 * @category Find & Craft
 * @package HandMake\Controller\Factory
 * @subpackage Controller
 */
class GearmanWorkerControllerFactory implements FactoryInterface
{
    /**
     * Creates the Create controller
     *
     * @param  ServiceLocatorInterface $serviceLocator
     * @return GearmanWorkerController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();

        $controller = new GearmanWorkerController();

        $controller->setApplication($sm->get('Zf2Gearman\Application'));

        return $controller;
    }
}