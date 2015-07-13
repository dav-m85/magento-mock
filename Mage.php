<?php

/**
 * Mock class for Mage.
 *
 * Because static behavior cannot be mocked easily, we inject the current class to the scope which is responsible
 * of redirecting all static Mage::... calls to a specialized instance.
 *
 * Usage:
 * public function setUp()
 * {
 *     $this->mage = $this->prophesize("MageMockInterface");
 *     Mage::setMageInstance($this->mage->reveal());
 *
 *     // play here with $this->mage by adding any promise you like
 *     $this->mage->getModel(Argument::any())->...
 * }
 */
class Mage
{
    /**
     * @var MageMockInterface instance
     */
    private static $mageInstance;

    /**
     * @return mixed
     */
    private static function getMageInstance()
    {
        return self::$mageInstance;
    }

    /**
     * @param mixed $mageInstance
     */
    public static function setMageInstance(MageMockInterface $mageInstance)
    {
        self::$mageInstance = $mageInstance;
    }

    /**
     * Magento edition constants
     */
    const EDITION_COMMUNITY    = 'Community';
    const EDITION_ENTERPRISE   = 'Enterprise';
    const EDITION_PROFESSIONAL = 'Professional';
    const EDITION_GO           = 'Go';

    /**
     * Gets the current Magento version string
     * @link http://www.magentocommerce.com/blog/new-community-edition-release-process/
     *
     * @return string
     */
    public static function getVersion()
    {
        return self::getMageInstance()->getVersion();
    }

    /**
     * Gets the detailed Magento version information
     * @link http://www.magentocommerce.com/blog/new-community-edition-release-process/
     *
     * @return array
     */
    public static function getVersionInfo()
    {
        return self::getMageInstance()->getVersionInfo();
    }

    /**
     * Get current Magento edition
     *
     * @static
     * @return string
     */
    public static function getEdition()
    {
        return self::getMageInstance()->getEdition();
    }

    /**
     * Set all my static data to defaults
     *
     */
    public static function reset()
    {
        return self::getMageInstance()->reset();
    }

    /**
     * Register a new variable
     *
     * @param string $key
     * @param mixed $value
     * @param bool $graceful
     * @throws Mage_Core_Exception
     */
    public static function register($key, $value, $graceful = false)
    {
        return self::getMageInstance()->register($key, $value, $graceful);
    }

    /**
     * Unregister a variable from register by key
     *
     * @param string $key
     */
    public static function unregister($key)
    {
        return self::getMageInstance()->unregister($key);
    }

    /**
     * Retrieve a value from registry by a key
     *
     * @param string $key
     * @return mixed
     */
    public static function registry($key)
    {
        return self::getMageInstance()->registry($key);
    }

    /**
     * Set application root absolute path
     *
     * @param string $appRoot
     * @throws Mage_Core_Exception
     */
    public static function setRoot($appRoot = '')
    {
        return self::getMageInstance()->setRoot($appRoot);
    }

    /**
     * Retrieve application root absolute path
     *
     * @return string
     */
    public static function getRoot()
    {
        return self::getMageInstance()->getRoot();
    }

    /**
     * Retrieve Events Collection
     *
     * @return Varien_Event_Collection $collection
     */
    public static function getEvents()
    {
        return self::getMageInstance()->getEvents();
    }

    /**
     * Varien Objects Cache
     *
     * @param string $key optional, if specified will load this key
     * @return Varien_Object_Cache
     */
    public static function objects($key = null)
    {
        return self::getMageInstance()->objects($key);
    }

    /**
     * Retrieve application root absolute path
     *
     * @param string $type
     * @return string
     */
    public static function getBaseDir($type = 'base')
    {
        return self::getMageInstance()->getBaseDir($type);
    }

    /**
     * Retrieve module absolute path by directory type
     *
     * @param string $type
     * @param string $moduleName
     * @return string
     */
    public static function getModuleDir($type, $moduleName)
    {
        return self::getMageInstance()->getModuleDir($type, $moduleName);
    }

    /**
     * Retrieve config value for store by path
     *
     * @param string $path
     * @param mixed $store
     * @return mixed
     */
    public static function getStoreConfig($path, $store = null)
    {
        return self::getMageInstance()->getStoreConfig($path, $store);
    }

    /**
     * Retrieve config flag for store by path
     *
     * @param string $path
     * @param mixed $store
     * @return bool
     */
    public static function getStoreConfigFlag($path, $store = null)
    {
        return self::getMageInstance()->getStoreConfigFlag($path, $store);
    }

    /**
     * Get base URL path by type
     *
     * @param string $type
     * @param null|bool $secure
     * @return string
     */
    public static function getBaseUrl($type/* = Mage_Core_Model_Store::URL_TYPE_LINK*/, $secure = null)
    {
        return self::getMageInstance()->getBaseUrl($type, $secure);
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public static function getUrl($route = '', $params = array())
    {
        return self::getMageInstance()->getUrl($route, $params);
    }

    /**
     * Get design package singleton
     *
     * @return Mage_Core_Model_Design_Package
     */
    public static function getDesign()
    {
        return self::getMageInstance()->getDesign();
    }

    /**
     * Retrieve a config instance
     *
     * @return Mage_Core_Model_Config
     */
    public static function getConfig()
    {
        return self::getMageInstance()->getConfig();
    }

    /**
     * Add observer to even object
     *
     * @param string $eventName
     * @param callback $callback
     * @param array $arguments
     * @param string $observerName
     */
    public static function addObserver($eventName, $callback, $data = array(), $observerName = '', $observerClass = '')
    {
        return self::getMageInstance()->addObserver($eventName, $callback, $data, $observerName, $observerClass);
    }

    /**
     * Dispatch event
     *
     * Calls all observer callbacks registered for this event
     * and multiple observers matching event name pattern
     *
     * @param string $name
     * @param array $data
     * @return Mage_Core_Model_App
     */
    public static function dispatchEvent($name, array $data = array())
    {
        return self::getMageInstance()->dispatchEvent($name, $data);
    }

    /**
     * Retrieve model object
     *
     * @link    Mage_Core_Model_Config::getModelInstance
     * @param   string $modelClass
     * @param   array|object $arguments
     * @return  Mage_Core_Model_Abstract|false
     */
    public static function getModel($modelClass = '', $arguments = array())
    {
        return self::getMageInstance()->getModel($modelClass, $arguments);
    }

    /**
     * Retrieve model object singleton
     *
     * @param   string $modelClass
     * @param   array $arguments
     * @return  Mage_Core_Model_Abstract
     */
    public static function getSingleton($modelClass='', array $arguments=array())
    {
        return self::getMageInstance()->getSingleton($modelClass, $arguments);
    }

    /**
     * Retrieve object of resource model
     *
     * @param   string $modelClass
     * @param   array $arguments
     * @return  Object
     */
    public static function getResourceModel($modelClass, $arguments = array())
    {
        return self::getMageInstance()->getResourceModel($modelClass, $arguments);
    }

    /**
     * Retrieve Controller instance by ClassName
     *
     * @param string $class
     * @param Mage_Core_Controller_Request_Http $request
     * @param Mage_Core_Controller_Response_Http $response
     * @param array $invokeArgs
     * @return Mage_Core_Controller_Front_Action
     */
    public static function getControllerInstance($class, $request, $response, array $invokeArgs = array())
    {
        return self::getMageInstance()->getControllerInstance($class, $request, $response, $invokeArgs);
    }

    /**
     * Retrieve resource vodel object singleton
     *
     * @param   string $modelClass
     * @param   array $arguments
     * @return  object
     */
    public static function getResourceSingleton($modelClass = '', array $arguments = array())
    {
        return self::getMageInstance()->getResourceSingleton($modelClass, $arguments);
    }

    /**
     * Deprecated, use self::helper()
     *
     * @param string $type
     * @return object
     */
    public static function getBlockSingleton($type)
    {
        return self::getMageInstance()->getBlockSingleton($type);
    }

    /**
     * Retrieve helper object
     *
     * @param string $name the helper name
     * @return Mage_Core_Helper_Abstract
     */
    public static function helper($name)
    {
        return self::getMageInstance()->helper($name);
    }

    /**
     * Retrieve resource helper object
     *
     * @param string $moduleName
     * @return Mage_Core_Model_Resource_Helper_Abstract
     */
    public static function getResourceHelper($moduleName)
    {
        return self::getMageInstance()->getResourceHelper($moduleName);
    }

    /**
     * Return new exception by module to be thrown
     *
     * @param string $module
     * @param string $message
     * @param integer $code
     * @return Mage_Core_Exception
     */
    public static function exception($module = 'Mage_Core', $message = '', $code = 0)
    {
        return self::getMageInstance()->exception($module, $message, $code);
    }

    /**
     * Throw Exception
     *
     * @param string $message
     * @param string $messageStorage
     * @throws Mage_Core_Exception
     */
    public static function throwException($message, $messageStorage = null)
    {
        return self::getMageInstance()->throwException($message, $messageStorage);
    }

    /**
     * Get initialized application object.
     *
     * @param string $code
     * @param string $type
     * @param string|array $options
     * @return Mage_Core_Model_App
     */
    public static function app($code = '', $type = 'store', $options = array())
    {
        return self::getMageInstance()->app($code, $type, $options);
    }

    /**
     * @static
     * @param string $code
     * @param string $type
     * @param array $options
     * @param string|array $modules
     */
    public static function init($code = '', $type = 'store', $options = array(), $modules = array())
    {
        return self::getMageInstance()->init($code, $type, $options, $modules);
    }

    /**
     * Front end main entry point
     *
     * @param string $code
     * @param string $type
     * @param string|array $options
     */
    public static function run($code = '', $type = 'store', $options = array())
    {
        return self::getMageInstance()->run($code, $type, $options);
    }

    /**
     * Retrieve application installation flag
     *
     * @param string|array $options
     * @return bool
     */
    public static function isInstalled($options = array())
    {
        return self::getMageInstance()->isInstalled($options);
    }

    /**
     * log facility (??)
     *
     * @param string $message
     * @param integer $level
     * @param string $file
     * @param bool $forceLog
     */
    public static function log($message, $level = null, $file = '', $forceLog = false)
    {
        return self::getMageInstance()->log($message, $level, $file, $forceLog);
    }

    /**
     * Write exception to log
     *
     * @param Exception $e
     */
    public static function logException(Exception $e)
    {
        return self::getMageInstance()->logException(Exception);
    }

    /**
     * Set enabled developer mode
     *
     * @param bool $mode
     * @return bool
     */
    public static function setIsDeveloperMode($mode)
    {
        return self::getMageInstance()->setIsDeveloperMode($mode);
    }

    /**
     * Retrieve enabled developer mode
     *
     * @return bool
     */
    public static function getIsDeveloperMode()
    {
        return self::getMageInstance()->getIsDeveloperMode();
    }

    /**
     * Display exception
     *
     * @param Exception $e
     */
    public static function printException(Exception $e, $extra = '')
    {
        return self::getMageInstance()->printException($e, $extra);
    }

    /**
     * Define system folder directory url by virtue of running script directory name
     * Try to find requested folder by shifting to domain root directory
     *
     * @param   string  $folder
     * @param   boolean $exitIfNot
     * @return  string
     */
    public static function getScriptSystemUrl($folder, $exitIfNot = false)
    {
        return self::getMageInstance()->getScriptSystemUrl($folder, $exitIfNot);
    }

    /**
     * Set is downloader flag
     *
     * @param bool $flag
     */
    public static function setIsDownloader($flag = true)
    {
        return self::getMageInstance()->setIsDownloader($flag);
    }

    public static function getFileVersion($url)
    {
        return self::getMageInstance()->getFileVersion($url);
    }

    public static function getFileVersionNet3($url)
    {
        return self::getMageInstance()->getFileVersionNet3($url);
    }
}
