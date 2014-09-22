<?php
/**
 *
 */
namespace Zf2Gearman\Controller;

use Sinergi\Gearman\Config;
use Sinergi\Gearman\Process;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Console\Request as ConsoleRequest;
use Zf2Gearman\Application;

/**
 * Class IndexController
 *
 * @package Zf2Gearman\Controller
 */
class GearmanWorkerController extends AbstractActionController
{
    /**
     * @var Application
     */
    protected $application;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var Process
     */
    protected $process;

    /**
     * @throws \RuntimeException
     */
    public function startAction()
    {
        $request = $this->getRequest();

        // Make sure that we are running in a console
        if (!$request instanceof ConsoleRequest){
            throw new \RuntimeException('You can only use this action from a console!');
        }

        $worker  = $request->getParam('name');

        $verbose = $request->getParam('verbose') || $request->getParam('v');

        if ($verbose) {
            echo 'Starting gearman worker(s): ' . $worker;
        }

        $process = $this->getProcess();

        if ($process->isRunning()) {
            echo 'Failed: Process is already runnning';
            return;
        }

        $this->getApplication()->run();
    }

    /**
     * @param \Zf2Gearman\Application $application
     */
    public function setApplication($application)
    {
        $this->application = $application;
    }

    /**
     * @return \Zf2Gearman\Application
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * @param \Sinergi\Gearman\Config $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * @return \Sinergi\Gearman\Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param \Sinergi\Gearman\Process $process
     */
    public function setProcess($process)
    {
        $this->process = $process;
    }

    /**
     * @return \Sinergi\Gearman\Process
     */
    public function getProcess()
    {
        return $this->process;
    }

}