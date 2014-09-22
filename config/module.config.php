<?php

return array(
    'console' => array(
        'router' => array(
            'routes' => array(
                'gearman-start' => array(
                    'options' => array(
                        'route'    => 'gearman-worker start [--verbose|-v] [name]',
                        'defaults' => array(
                            'controller' => 'Zf2Gearman\Controller\GearmanWorker',
                            'action'     => 'start',
                            'name'       => 'all'
                        )
                    )
                )
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Zf2Gearman\Controller\GearmanWorker' => 'Zf2Gearman\Controller\Factory\GearmanWorkerControllerFactory',
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Zf2Gearman\Application' => 'Zf2Gearman\Factory\ApplicationFactory',
            'Zf2Gearman\Bootstrap'   => 'Zf2Gearman\Factory\BootstrapFactory',
            'Zf2Gearman\Config'      => 'Zf2Gearman\Factory\ConfigFactory'
        )
    ),
);