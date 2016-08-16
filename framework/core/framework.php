<?php 
	class Framework
	{
		public static function bootstrap()
		{
			self::init();
			self::parseURL();
		}

		private static function init()
		{
			define('DS', DIRECTORY_SEPARATOR);
			define('ROOT', getcwd() . DS);

			// path constants
			define('APP_PATH', ROOT . 'application' . DS);
			define('FRAMEWORK_PATH', ROOT . 'framework' . DS);
			define('PUBLIC_PATH', ROOT . 'public' . DS);

			define('CONFIG_PATH', APP_PATH . 'config' . DS);
			define('CONTROLLER_PATH', APP_PATH . 'controllers' . DS);
			define('MODEL_PATH', APP_PATH . 'models' . DS);
			define('VIEW_PATH', APP_PATH . 'views' . DS);

			define('CORE_PATH', FRAMEWORK_PATH . 'core' . DS);

			// load core classes
			require_once CORE_PATH . 'controller.php';

			// load config files
			require_once CONFIG_PATH . 'config.php';
			require_once CONFIG_PATH . 'routing.php';

			// start session
			session_start();
		}

		private static function parseURL()
		{
			if(!empty($_GET['url']))
			{
				return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
			}
			else
			{
				return [DEFAULT_CONTROLLER, DEFAULT_ACTION];
			}
		}
	}
?>