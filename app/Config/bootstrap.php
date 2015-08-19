<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
 *
 * PHP 5
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
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

// Setup a 'default' cache configuration for use in the application.
//Cache::config('default', array('engine' => 'File'));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'Model'                     => array('/path/to/models', '/next/path/to/models'),
 *     'Model/Behavior'            => array('/path/to/behaviors', '/next/path/to/behaviors'),
 *     'Model/Datasource'          => array('/path/to/datasources', '/next/path/to/datasources'),
 *     'Model/Datasource/Database' => array('/path/to/databases', '/next/path/to/database'),
 *     'Model/Datasource/Session'  => array('/path/to/sessions', '/next/path/to/sessions'),
 *     'Controller'                => array('/path/to/controllers', '/next/path/to/controllers'),
 *     'Controller/Component'      => array('/path/to/components', '/next/path/to/components'),
 *     'Controller/Component/Auth' => array('/path/to/auths', '/next/path/to/auths'),
 *     'Controller/Component/Acl'  => array('/path/to/acls', '/next/path/to/acls'),
 *     'View'                      => array('/path/to/views', '/next/path/to/views'),
 *     'View/Helper'               => array('/path/to/helpers', '/next/path/to/helpers'),
 *     'Console'                   => array('/path/to/consoles', '/next/path/to/consoles'),
 *     'Console/Command'           => array('/path/to/commands', '/next/path/to/commands'),
 *     'Console/Command/Task'      => array('/path/to/tasks', '/next/path/to/tasks'),
 *     'Lib'                       => array('/path/to/libs', '/next/path/to/libs'),
 *     'Locale'                    => array('/path/to/locales', '/next/path/to/locales'),
 *     'Vendor'                    => array('/path/to/vendors', '/next/path/to/vendors'),
 *     'Plugin'                    => array('/path/to/plugins', '/next/path/to/plugins'),
 * ));
 *
 */

/**
 * Custom Inflector rules, can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */

/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); //Loads a single plugin named DebugKit
 *
 */

/**
 * You can attach event listeners to the request lifecyle as Dispatcher Filter . By Default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', array(
 *		'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 *		'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 * 		array('callable' => $aFunction, 'on' => 'before', 'priority' => 9), // A valid PHP callback type to be called on beforeDispatch
 *		array('callable' => $anotherMethod, 'on' => 'after'), // A valid PHP callback type to be called on afterDispatch
 *
 * ));
 */
Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'FileLog',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'FileLog',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));

if($_SERVER['HTTP_HOST'] == "localhost") {
    $siteurl = "http://localhost/TaskBucksPro/";
}   else {
    $siteurl = "http://".$_SERVER['HTTP_HOST']."/TaskBucksPro/";
}

Configure::write('RESPONSE_SUCCESS','200');
Configure::write('RESPONSE_GENERAL_ERROR','400');
Configure::write('INPUT_MISSING_DESC','Input Parameter Missing');

define('SIGNUP_AMOUNT', '5.0');
define('TEST_EMAIL', 'rohiit.roxy@gmail.com');
define('TEST_FROM', 'rohit.attri@taskbucksapp.co.in');
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', 'admin@123');
define('LOGIN_TO_VIEW_DETAILS', 'Access Denied..! Please Login');
define('LOGIN_SUCCESS', 'Welcome Admin');
define('ALREADY_LOGIN', 'Warning! You are already Logged In');
define('LOGOUT_SUCCESSFULLY', 'You are Successfully Logged Out.');
			/* Campaign Constants */
define('CAMPAIGN_SAVED', 'Campaign Successfully Created.');
define('CAMPAIGN_NOT_SAVED', 'The campaign could not be saved. Please, try again.');
define('CAMPAIGN_UPDATED', 'Campaign Successfully Updated.');
define('CAMPAIGN_NOT_UPDATED', 'The campaign could not be Updated. Please, try again.');
define('CAMPAIGN_DELETED', 'Campaign deleted');
define('CAMPAIGN_NOT_DELETED', 'Campaign was not deleted');
define('CAMPAIGN_LIMIT', 5);

			/* Others */
define('LOGO_UPLOADED', 'Logo Successfully Changed.');
define('LOGO_NOT_UPLOADED', 'Logo not Uploaded. Please try again..!');
define('EMPTY_USERNAME', 'UserName Cannot be Empty.');
define('EMPTY_PASSWORD', 'You Must Enter A password.');
define('WRONG_USER_NAME_OR_PASSWORD', 'Invalid UserName or Password...!');
define("SITE_URL",$siteurl);
define("WEBROOT_URL",$siteurl."/app/webroot/");
define("DATA_NOT_SAVED","Data not Saved");
// define('UPLOAD_PATH',APP . 'webroot/Uploads');
define('UPLOAD_PATH',WWW_ROOT."Uploads/");

define('DEVICE_ID_NOT_UPDATED', 'Device Id not Updated');
define('DATA_NOT_SAVED_IN_CUSTOMER_HISTORY', 'Date not tranferred in Customer History');
define('DEVICE_ID_UPDATED', 'Device id Updated');
define('INVALID_INTEGET_VALUE', 'Invalid Integer Value');
define('TRY_AGAIN','Please try again');
define('PASSWORD_CHANGED','Password chnaged successfully');
