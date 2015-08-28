<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(

            /**
             * For simplicity, we construct this table gateway in the service manager.
             * This could be factoried out to a separate class (even removing the SM entirely).
             */
            'EntriesTableGateway' => function($serviceManager) {

                $databaseAdapter = $serviceManager->get('Zend\Db\Adapter');
                $resultSet = new \Zend\Db\ResultSet\ResultSet();
                $resultSet->setArrayObjectPrototype(new \Application\Entity\Entry());

                $tableGateway = new \Zend\Db\TableGateway\TableGateway('entries', $databaseAdapter, null, $resultSet);
                return $tableGateway;
            },
            'DatabaseTableStorage' => function($serviceManager) {

                $storage = new \Application\Service\Storage\DatabaseTable($serviceManager->get('EntriesTableGateway'));
                return $storage;
            }
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Application\Controller\Index' => function($controllerManager) {

                // We have to get the *actual* SM here as this is currently the controller manager derivative.
                $serviceManager = $controllerManager->getServiceLocator();

                $storage = $serviceManager->get('DatabaseTableStorage');
                $entryService = new \Application\Service\EntryService($storage);

                $controller = new \Application\Controller\IndexController();
                $controller->setEntryService($entryService);

                return $controller;
            }
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
