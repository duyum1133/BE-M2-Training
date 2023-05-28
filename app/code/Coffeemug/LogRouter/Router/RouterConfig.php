<?php
 
namespace Coffeemug\LogRouter\Router;
 
use Magento\Framework\App\Route\Config;
 
class RouterConfig extends Config
{
    public function getRoutes() {
        // Call the protected function from the parent class
        $routes = parent::_getRoutes();
        return $routes;
    }
}