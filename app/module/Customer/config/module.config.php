<?php

namespace Customer;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
	'router' => [
		'routes' => [
			'home' => [
                'type'    => \Zend\Router\Http\Segment::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\CustomerController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
			
			'customer' => [
				'type' => \Zend\Router\Http\Segment::class,
				'options' => [
					'route' => '/customer[/:action[/:id]]',
					'constraints' => [
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id' => '[0-9]+',
					],
					'defaults' => [
						'controller' => Controller\CustomerController::class,
						'action' => 'index',  						
					],					
				],
			],
		],
	],
	
	'controllers' => [
		'factories' => [
			//Controller\CustomerController::class => InvokableFactory::class,
		],
	],
	
	'view_manager' => [
		'template_path_stack' => [
			'customer' => __DIR__ . '/../view',
		], 
	],
	
	'db' => [
		'driver' => 'Pdo_Mysql',
		'database' => 'db_loja',
		'username' => 'root',
		'password' => '',
		'hostname' => 'localhost'	
	],	
	
];

?>