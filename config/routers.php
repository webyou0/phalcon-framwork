<?php
$routers = [
    '/' => [
        'namespace' => DEFAULT_MODULE_NAMESPACE . '\\Controllers',
        'module' => DEFAULT_MODULE,
        'controller' => 'index',
        'action' => 'index'
    ],
    '/:controller' => [
        'namespace' => DEFAULT_MODULE_NAMESPACE . '\\Controllers',
        'module' => DEFAULT_MODULE,
        'controller' => 1,
        'action' => 'index'
    ],
    '/:controller/:action' => [
        'namespace' => DEFAULT_MODULE_NAMESPACE . '\\Controllers',
        'module' => DEFAULT_MODULE,
        'controller' => 1,
        'action' => 2
    ],
    '/:controller/:action/:params' => [
        'namespace' => DEFAULT_MODULE_NAMESPACE . '\\Controllers',
        'module' => DEFAULT_MODULE,
        'controller' => 1,
        'action' => 2,
        'params' => 3
    ]
];

foreach (MODULE_ALLOW_LIST as $v) {
    $_v=strtolower($v);
    $routers['/' . $v] = [
        'namespace' => APP_NAMESPACE . '\\' . $v . '\\Controllers',
        'module' => $v,
        'controller' => 'Index',
        'action' => 'index'
    ];
    $routers['/' . $_v]=$routers['/' . $v];
    $routers['/' . $v . '/:controller'] = [
        'namespace' => APP_NAMESPACE . '\\' . $v . '\\Controllers',
        'module' => $v,
        'controller' => 1,
        'action' => 'index'
    ];
    $routers['/' . $_v . '/:controller'] =$routers['/' . $v . '/:controller'] ;
    $routers['/' . $v . '/:controller/:action'] = [
        'namespace' => APP_NAMESPACE . '\\' . $v . '\\Controllers',
        'module' => $v,
        'controller' => 1,
        'action' => 2
    ];
    $routers['/' . $_v . '/:controller/:action']=$routers['/' . $v . '/:controller/:action'];
    $routers['/' . $v . '/:controller/:action/:params'] = [
        'namespace' => APP_NAMESPACE . '\\' . $v . '\\Controllers',
        'module' => $v,
        'controller' => 1,
        'action' => 2,
        'params' => 3
    ];
    $routers['/' . $_v . '/:controller/:action/:params']=$routers['/' . $v . '/:controller/:action/:params'];
}
return $routers;
