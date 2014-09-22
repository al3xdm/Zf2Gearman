<?php
namespace Zf2Gearman;

use Sinergi\Gearman\Application as GearmanApplication;
use Sinergi\Gearman\BootstrapInterface;
use Sinergi\Gearman\Exception\InvalidBootstrapClassException;

/**
 * Class Application
 *
 * @package Zf2Gearman
 */
class Application extends GearmanApplication
{
    /**
     * @var BootstrapInterface
     */
    protected $bootstrapper;

    static $instance;

    /**
     * @param bool $restart
     *
     * @throws InvalidBootstrapClassException
     */
    public function bootstrap($restart = false)
    {
        if ($this->getConfig()->getEnvVariables()) {
            $this->addEnvVariables();
        }

        if (!$this->getBootstrapper() instanceof BootstrapInterface) {
            throw new InvalidBootstrapClassException;
        }

        $this->getBootstrapper()->run($this);

        $this->isBootstraped = true;
    }

    /**
     * @param mixed $bootstrapper
     */
    public function setBootstrapper($bootstrapper)
    {
        $this->bootstrapper = $bootstrapper;
    }

    /**
     * @return mixed
     */
    public function getBootstrapper()
    {
        return $this->bootstrapper;
    }
}