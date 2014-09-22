<?php
/**
 *
 */
namespace Zf2Gearman;

use Sinergi\Gearman\BootstrapInterface;
use Sinergi\Gearman\Application;
use Sinergi\Gearman\JobInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

/**
 * Class Bootstrap
 *
 * @package Zf2Gearman
 */
class Bootstrap implements BootstrapInterface, ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    /**
     * @var array
     */
    protected $workers = array();

    /**
     * @param array $workers
     */
    public function __construct(array $workers = array())
    {
        $this->workers = $workers;
    }

    /**
     * @param Application $application
     */
    public function run(Application $application)
    {
        foreach($this->workers as $name => $options) {
            $worker = $this->getServiceLocator()->get($name);

            if (!$worker instanceof JobInterface) {
                throw new \Exception("Error Bootstrapping German Manager, " . $name . " not an instance of JobInterface.");
            }

            $application->add($worker);
        }
    }
}