Magento mock

Hat trick to have Mage class mocked.

## Installation

Setup autoloading

```php
// Register Varien autoloader for Mage related stuff
include_once "Varien/Autoload.php";
include_once "core/Mage/Core/functions.php";

spl_autoload_register(array(Varien_Autoload::instance(), 'autoload'));

// Mock Mage instance
include_once "Mage.php";
include_once "MageMockInterface.php";
```

## Usage

```php

class CustomerTest extends PHPUnit_Framework_TestCase
{
    private $mage;

    public function setUp()
    {
        $this->mage = $this->prophesize("MageMockInterface");
        Mage::setMageInstance($this->mage->reveal());

        // Getting an helper ?
        $this->mage->helper('some-helper')->willReturn(...);
        
        // New Model ?
        $this->mage->getResourceSingleton("customer/customer", \Prophecy\Argument::cetera())->willReturn(
            $this->prophesize('Mage_Core_Model_Resource_Db_Abstract')->reveal()
        );
    }

    public function testSomething()
    {
        ...
    }
```