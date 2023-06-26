<?php

use Wfm\Router;


Router::add('^admin/?$', ['controller' => 'Main', 'action' => 'index', 'admin_prefix' => 'admin']);
Router::add('^admin/(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)?/?$', ['admin_prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action'=>'index']);
Router::add('^(parce)/(?P<slug>[0-9]+)?/?$', ['controller' => 'Parce', 'action'=> 'view']);
Router::add('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)?/?$');