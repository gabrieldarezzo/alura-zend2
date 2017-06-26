<?php
return array(
    'router' => array(
        'routes' => array(
            'application' => array(
                'type' => 'Segment'
                ,'options' => array(
                    'route' => '/[:controller[/:action]]'
                    ,'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-09_-]*'
                        ,'action' => '[a-zA-Z][a-zA-Z0-09_-]*'



                    )
                    ,'defaults' => array(
                        '__NAMESPACE__' => 'Estoque\Controller'
                        ,' controller' => 'Index'
                        ,'action' => 'index'
                    )
                )
            ),

        )
    )
    ,'controllers' => array(
        'invokables' => array(
            'Estoque\Controller\Index' => 'Estoque\Controller\IndexController'
        )
    )
    ,'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view/'
        )
    )

    ,'doctrine' => [
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
        ]
        /*
        ,
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
        */
    ],
     

);


