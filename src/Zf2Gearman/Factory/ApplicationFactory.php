<?php
namespace Zf2Gearman\Factory;

use Sinergi\Gearman\Config;
use Sinergi\Gearman\Process;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zf2Gearman\Application;
use Zf2Gearman\Bootstrap;

/**
 * Class ModuleOptionsFactory
 *
 * @package HandMake\Option\Factory
 */
class ApplicationFactory implements FactoryInterface
{
    /**
     * @param  ServiceLocatorInterface $serviceLocator
     * @return Bootstrap
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Zf2Gearman\Config');

        $this->setConfig($config);

        $bootstrap = $serviceLocator->get('Zf2Gearman\Bootstrap');

        $application = new Application($this->getConfig(), $this->getProcess());

        $application->setBootstrapper($bootstrap);

        return $application;
    }


    /**
     * @return Process
     */
    public function getProcess()
    {
        if (null === $this->process) {
            $this->setProcess((new Process($this->getConfig())));
        }
        return $this->process;
    }

    /**
     * @param Process $process
     * @return $this
     */
    public function setProcess(Process $process)
    {
        if (null === $this->getConfig() && $process->getConfig() instanceof Config) {
            $this->setConfig($process->getConfig());
        }
        $this->process = $process;
        return $this;
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param Config $config
     * @return $this
     */
    public function setConfig(Config $config)
    {
        $this->config = $config;
        return $this;
    }
}