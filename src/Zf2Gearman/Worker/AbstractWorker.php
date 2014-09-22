<?php
/**
 *
 */

namespace Zf2Gearman\Worker;

/**
 * Class AbstractWorker
 *
 * @package Zf2Gearman
 */
class AbstractWorker implements WorkerInterface {

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @param \GearmanJob $job
     *
     * @return mixed|void
     */
    public function execute(\GearmanJob $job = null)
    {

    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
} 