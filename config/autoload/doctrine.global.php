<?php

return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host' => 'mysql.hostinger.com.br',
                    'port' => '3306',
                    'user' => 'u131945273_luizr',
                    'password' => 'luizr2016',
                    'dbname' => 'u131945273_luizr',
                )
            ),
        ),
        // now you define the entity manager configuration
        'entitymanager' => array(
            'orm_default' => array(
                'connection' => 'orm_default',
                'configuration' => 'orm_default'
            ),
            'configuration' => array(
                'orm_permissoes' => array(
                    'metadata_cache' => 'array',
                    'query_cache' => 'array',
                    'result_cache' => 'array',
                    'driver' => 'orm_alternative',
                    'generate_proxies' => true,
                    'proxy_dir' => 'data/DoctrineORMModule/Proxy',
                    'proxy_namespace' => 'DoctrineORMModule\Proxy',
                    'filters' => array()
                )
            ),
        ),
    )
);