<?php
return [
    'router' => [
        'routes' => [
            'application' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/[:controller[/:action[/:id]]]',
                    'contraints' => [
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]*',
                    ],
                    'defaults' => [
                        '__NAMESPACE__' => 'Estoque\Controller',
                        'controller' => 'index',
                        'action' => 'index',
                    ],
                ],
            ],
            'produtos' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/produtos[/:page]',
                    'contraints' => [
                        'page' => '[0-9]*',
                    ],
                    'defaults' => [
                        '__NAMESPACE__' => 'Estoque\Controller',
                        'controller' => 'index',
                        'action' => 'index',
                        'page' => 1,
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'invokables' => [
            'Estoque\Controller\Index' => 'Estoque\Controller\IndexController',
            'Estoque\Controller\Usuario' => 'Estoque\Controller\UsuarioController',
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'service_manager' => [
        'factories' => [
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
        ],
    ],
    'translator' => [
        'locale' => 'pt_BR',
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => __DIR__ . '\..\language',
                'pattern' => '%s.mo',
            ],
        ],
    ],
    'view_helpers' => [
        'invokables' => [
            'FlashHelper' => 'Estoque\View\Helper\FlashHelper',
            'PaginationHelper' => 'Estoque\View\Helper\PaginationHelper',
        ],
    ],
    'doctrine' => [
        'driver' => [
            'application_entities' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Estoque/Entity'],
            ],

            'orm_default' => [
                'drivers' => [
                    'Estoque\Entity' => 'application_entities',
                ],
            ],
        ],
        'authentication' => [
            'orm_default' => [
                'object_manager' => 'Doctrine\ORM\EntityManager',
                'identity_class' => 'Estoque\Entity\Usuario',
                'identity_property' => 'email',
                'credential_property' => 'senha',
                'credentialCallable' => function ($user, $senha) {
                    return $user->getSenha() == md5($senha);
                },
            ],
        ],
    ],
];
