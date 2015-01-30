<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	/* Users */
	Router::connect('/', array('controller' => 'users', 'action' => 'index'));
	/* Polls */
	Router::connect('/new/', array('controller' => 'polls', 'action'=>'new_vote'));
	Router::connect('/new/choices', array('controller'=>'polls', 'action'=>'choices'));
	Router::connect('/new/register', array('controller'=>'polls', 'action'=>'register'));
	/* Votes */
	Router::connect('/votes/:link/', array('controller'=>'votes', 'action'=>'index'));
	Router::connect('/votes/:link/submited', array('controller'=>'votes', 'action'=>'submited'));
	Router::connect('/votes/list', array('controller'=>'votes', 'action'=>'list_votes'));
	/* Connect */
	Router::connect('/connect/index', array('controller'=>'connect', 'action'=>'index'));
	Router::connect('/disconnect', array('controller' => 'connect', 'action'=>'disconnect'));

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
